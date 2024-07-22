<?php

namespace App\Services\ImageGeneration;

interface ImageGenerator
{
    public function generateImage($params, $template);
}
