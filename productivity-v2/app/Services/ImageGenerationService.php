<?php

namespace App\Services;

use App\Models\MediaFile;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ImageGenerationService
{
    public function generateImage($vacancy)
    {
        $set_image = $this->initializeImage($vacancy);

        $img = $set_image['image'];
        $template = $set_image['template'];

        $this->drawCityAndState($img, $vacancy, $template);
        $this->drawTexts($img, $vacancy, $template);

        return $this->saveAndReturnUrl($img);
    }

    private function initializeImage($vacancy)
    {
        $media_file = MediaFile::where('category_id', $vacancy['category_id'])
            ->inRandomOrder()
            ->first();

        if (!$media_file) throw new ModelNotFoundException('No hay imágenes asociadas a la categoría <strong>' . $vacancy['category']['name'] . '</strong>.');

        $image_path = public_path('storage/' . $media_file->path . '/' . $media_file->name);

        return [
            'image' => Image::make($image_path),
            'template' => $media_file
        ];
    }

    private function drawCityAndState($img, $vacancy, $template)
    {
        $boldFontFile = public_path('/fonts/Noto_Sans/NotoSans-Bold.ttf');
        $this->drawShadowedText($img, $vacancy['city']['name'], 25, 140, 45, $boldFontFile, $template->color);
        $this->drawShadowedText($img, $vacancy['city']['state']['name'], 25, 170, 25, $boldFontFile, $template->color);
    }

    private function drawShadowedText($img, $text, $x, $y, $size, $fontFile, $color)
    {
        $img->text($text, $x + 2, $y + 2, function ($font) use ($fontFile, $size, $color) {
            $font->file($fontFile);
            $font->size($size);
            $font->color($color);
        });

        $img->text($text, $x, $y, function ($font) use ($fontFile, $size) {
            $font->file($fontFile);
            $font->size($size);
            $font->color('#ffffff');
        });
    }

    private function drawTexts($img, $vacancy, $template)
    {
        $fontFile = public_path('/fonts/Noto_Sans/NotoSans-Regular.ttf');
        $boldFontFile = public_path('/fonts/Noto_Sans/NotoSans-Bold.ttf');

        $y = 500;
        $marginBetweenTexts = 15;

        $texts = [
            "position" => $vacancy['position'],
            "description" => $vacancy['result'],
            "salary" => $vacancy['salary'],
            "more_information" => $vacancy['more_information'],
            "recruiter_email" => $vacancy['recruiter_email'],
        ];

        foreach ($texts as $key => $text) {
            $fontSize = 18;
            $fontColor = '#ffffff';
            $currentFontFile = $fontFile;

            switch ($key) {
                case "position":
                    $fontSize = 25;
                    $currentFontFile = $boldFontFile;
                    break;
                case "recruiter_email":
                    $fontSize = 14;
                    break;
                case "salary":
                    $marginBetweenTexts = ($texts['more_information'] != "") ? 5 : 0;
                    break;
                case "more_information":
                    $marginBetweenTexts = 20;
                    break;
            }

            $lines = $this->wrapText($text, $fontSize, $img->width() - 100, $currentFontFile);

            if ($key == "position") {
                foreach ($lines as $line) {
                    $img->text($line, ($img->width() / 2) + 2, $y + 2, function ($font) use ($boldFontFile, $fontSize) {
                        $font->file($boldFontFile);
                        $font->size($fontSize);
                        $font->color('#282a32');
                        $font->align('center');
                        $font->valign('middle');
                    });

                    $img->text($line, $img->width() / 2, $y, function ($font) use ($boldFontFile, $fontSize, $fontColor) {
                        $font->file($boldFontFile);
                        $font->size($fontSize);
                        $font->color($fontColor);
                        $font->align('center');
                        $font->valign('middle');
                    });

                    $y += $this->getTextHeight($line, $fontSize, $boldFontFile) - 8;
                }
            } elseif ($key == "recruiter_email") {
                $fullTextWidth = max(array_map(function ($line) use ($fontSize, $currentFontFile) {
                    return $this->getTextWidth($line, $fontSize, $currentFontFile);
                }, $lines)) - 70;

                $fullTextHeight = ($this->getTextHeight("A", $fontSize, $currentFontFile) + 10) * count($lines) - 13;

                $x = ($img->width() - $fullTextWidth) / 2;
                $yStart = $y;

                $img->rectangle($x, $yStart - 15, $x + $fullTextWidth, $yStart + $fullTextHeight, function ($draw) use ($template) {
                    $draw->background($template->color);
                });

                foreach ($lines as $line) {
                    $img->text($line, $img->width() / 2, $y, function ($font) use ($currentFontFile, $fontSize, $fontColor) {
                        $font->file($currentFontFile);
                        $font->size($fontSize);
                        $font->color($fontColor);
                        $font->align('center');
                        $font->valign('middle');
                    });
                    $y += $this->getTextHeight($line, $fontSize, $currentFontFile) + 0;
                }
            } else {
                foreach ($lines as $line) {
                    $img->text($line, $img->width() / 2, $y, function ($font) use ($currentFontFile, $fontSize, $fontColor) {
                        $font->file($currentFontFile);
                        $font->size($fontSize);
                        $font->color($fontColor);
                        $font->align('center');
                        $font->valign('middle');
                    });
                    $y += $this->getTextHeight($line, $fontSize, $currentFontFile) - 6;
                }
            }

            $y += $marginBetweenTexts;
        }
    }

    private function saveAndReturnUrl($img)
    {
        $filename = time() . "_" . Str::random(10) . '.png';
        $path = 'vacancies/' . $filename;
        Storage::disk('public')->put($path, (string) $img->encode());

        return array(
            'url' => Storage::disk('public')->url($path),
            'filename' => $filename,
        );
    }

    private function wrapText($text, $size, $maxWidth, $fontFile)
    {
        $words = explode(' ', $text);
        $lines = [];
        $line = "";

        foreach ($words as $word) {
            $testLine = $line ? $line . ' ' . $word : $word;
            $box = imagettfbbox($size, 0, $fontFile, $testLine);

            if ($box[2] > ($maxWidth * 1.4)) {
                $lines[] = $line;
                $line = $word;
            } else {
                $line = $testLine;
            }
        }
        $lines[] = $line;
        return $lines;
    }

    private function getTextHeight($text, $size, $fontFile)
    {
        $box = imagettfbbox($size, 0, $fontFile, $text);
        return abs($box[7] - $box[1]);
    }

    private function getTextWidth($text, $size, $fontFile)
    {
        $box = imagettfbbox($size, 0, $fontFile, $text);
        return $box[2] - $box[0];
    }
}
