<?php

namespace App\Services\ImageGeneration;

interface ImageFactoryInterface
{
    public function createImageGenerator(): ImageGenerator;
}
