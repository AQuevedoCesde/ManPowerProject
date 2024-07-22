<?php

namespace App\Services\ImageGeneration;

class ManpowerGroupImageFactory implements ImageFactoryInterface
{
    public function createImageGenerator(): ImageGenerator
    {
        return new ManpowerGroupImageGenerator();
    }
}
