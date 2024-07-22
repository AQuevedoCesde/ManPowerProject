<?php

namespace App\Services;

use App\Services\ImageGeneration\ImageFactoryInterface;

class ImageService
{
    protected $imageFactory;

    public function __construct(ImageFactoryInterface $imageFactory)
    {
        $this->imageFactory = $imageFactory;
    }

    public function generateImage($params, $template = null)
    {
        $generator = $this->imageFactory->createImageGenerator();
        return $generator->generateImage($params, $template);
    }
}
