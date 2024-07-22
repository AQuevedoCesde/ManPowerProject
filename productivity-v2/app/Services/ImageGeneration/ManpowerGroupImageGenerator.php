<?php

namespace App\Services\ImageGeneration;

use App\Models\MediaFile;
use Endroid\QrCode\QrCode;
use Illuminate\Support\Str;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ManpowerGroupImageGenerator implements ImageGenerator
{
    public function generateImage($vacancy, $template_image)
    {
        $set_image = $this->initializeImage($vacancy, $template_image);

        $img = $set_image['image'];
        $template = $set_image['template'];

        $this->drawCityAndState($img, $vacancy, $template);
        $descriptionHeight = $this->drawTexts($img, $vacancy, $template);
        $this->drawQrAndId($img, $vacancy, $template, $descriptionHeight);
        $this->addFooterText($img);


        return $this->saveAndReturnUrl($img);
    }

    private function drawQrAndId($img, $vacancy, $template, $descriptionHeight)
    {
        $regularFontFile = public_path('/fonts/Noto_Sans/NotoSans-Regular.ttf');
        $boldFontFile = public_path('/fonts/Noto_Sans/NotoSans-Bold.ttf');

        $firstColX = 180;
        $firstColY = 450 + $descriptionHeight + 5;
        $firstColWidth = 200;
        $firstColSize = 20;

        $this->drawCenteredText($img, "ID Vacante:", $firstColX, $firstColY, $firstColWidth, $firstColSize, $boldFontFile, '#ffffff');

        $this->drawCenteredText($img, $vacancy['erp_vacancy_id'], $firstColX, $firstColY + 30, $firstColWidth, $firstColSize, $boldFontFile, '#ffffff');

        $secondColX = 400;
        $secondColY = $firstColY;

        $writer = new PngWriter();
        $qrCode = QrCode::create($vacancy['link'])
            ->setEncoding(new Encoding('UTF-8'))
            ->setSize(100)
            ->setMargin(-1)
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        $result = $writer->write($qrCode);
        $img->insert($result->getString(), 'top-left', $secondColX, $secondColY - 18);
    }

    private function initializeImage($vacancy, $template)
    {
        if (!$template) {
            $media_file = MediaFile::where('category_id', $vacancy['category_id'])
                ->inRandomOrder()
                ->first();
        } else {
            $media_file = MediaFile::find($template);
        }

        if (!$media_file) throw new ModelNotFoundException('No hay imágenes asociadas a la categoría <strong>' . $vacancy['category']['name'] . '</strong>.');


        if (config('app.env') === 'local') {
            $image_path = Storage::disk('public')->url($media_file->path);
        } else {
            $image_path = Storage::disk('s3')->temporaryUrl($media_file->path, now()->addMinutes(2));
        }

        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ]);
        $imageData = file_get_contents($image_path, false, $context);

        return [
            'image' => Image::make($imageData),
            'template' => $media_file
        ];
    }

    private function drawCityAndState($img, $vacancy, $template)
    {
        $boldFontFile = public_path('/fonts/Noto_Sans/NotoSans-Bold.ttf');
        $this->drawShadowedText($img, $vacancy['city']['name'], 25, 140, 35, $boldFontFile, $template->color);
        $this->drawShadowedText($img, $vacancy['city']['state']['name'], 25, 180, 25, $boldFontFile, $template->color);
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

        $y = 460;
        $marginBetweenTexts = 15;

        $salary = ($vacancy['salary']) ? ' Salario: ' . $vacancy['salary'] : '';
        $description = isset($vacancy['result']) ? $vacancy['result'] . $salary : $vacancy['description'] . $salary;

        $texts = [
            "position" => $vacancy['position'],
            "description" => $description,
            // "salary" => $vacancy['salary'],
        ];

        foreach ($texts as $key => $text) {
            $fontSize = 19;
            $fontColor = '#ffffff';
            $currentFontFile = $fontFile;

            switch ($key) {
                case "position":
                    $fontSize = 32;
                    $currentFontFile = $boldFontFile;
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

                    $y += $this->getTextHeight($line, $fontSize, $boldFontFile) - 12;
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
                    $y += $this->getTextHeight($line, $fontSize, $currentFontFile) - 2;
                }
            }

            $y += $marginBetweenTexts;
        }

        return $y - 450;
    }

    private function drawCenteredText($img, $text, $x, $y, $maxWidth, $size, $fontFile, $color)
    {
        $lines = $this->wrapText($text, $size, $maxWidth, $fontFile);
        foreach ($lines as $line) {
            $textWidth = $this->getTextWidth($line, $size, $fontFile);
            $img->text($line, $x + ($maxWidth / 2) - ($textWidth / 2), $y, function ($font) use ($fontFile, $size, $color) {
                $font->file($fontFile);
                $font->size($size);
                $font->color($color);
                $font->valign('center');
            });
            $y += $this->getTextHeight($line, $size, $fontFile);
        }
    }

    private function addFooterText($img)
    {
        $footerText = "Escanea el código QR o ingresa a: www.manpowergroupcolombia.co\nOportunidades laborales - Perfiles Operativos y Tácticos e ingresa el ID en el buscador.";
        $fontFile = public_path('/fonts/Noto_Sans/NotoSans-Regular.ttf');
        $fontSize = 15;
        $y = $img->height() - 45;

        $lines = explode("\n", $footerText);
        foreach ($lines as $line) {

            $img->text($line, $img->width() / 2, $y, function ($font) use ($fontFile, $fontSize) {
                $font->file($fontFile);
                $font->size($fontSize);
                $font->color('#ffffff');
                $font->align('center');
                $font->valign('top');
            });

            $y += $fontSize;
        }
    }

    private function saveAndReturnUrl($img)
    {
        $fileName = time() . "_" . Str::random(10) . '.png';

        if (config('app.env') === 'local') {
            $path = 'vacancies/' . $fileName;
            Storage::disk('public')->put($path, (string) $img->encode());

            return array(
                'url' => Storage::disk('public')->url($path),
                'filename' => $fileName,
                'filepath' => $path,
            );
        } else {
            $path = 'productive-v2/vacancies/' . $fileName;
            Storage::disk('s3')->put($path, (string) $img->encode());

            return array(
                'url' => Storage::disk('s3')->temporaryUrl($path, now()->addHour()),
                'filename' => $fileName,
                'filepath' => $path,
            );
        }
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
