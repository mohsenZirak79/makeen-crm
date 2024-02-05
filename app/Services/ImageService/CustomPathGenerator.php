<?php

namespace App\Services\ImageService;

use App\Models\Factor;
use App\Models\User;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class CustomPathGenerator implements PathGenerator
{

    public function getPath(Media $media): string
    {
        switch ($media->model_type) {
            case Factor::class:
            {
                return 'factor'.DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR;
            }
            case User::class:
            {
                return 'user'.DIRECTORY_SEPARATOR.'avatar'.DIRECTORY_SEPARATOR;
            }
            default:
            {
                return 'unknown'.DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR;
            }
        }
    }

    public function getPathForConversions(Media $media): string
    {
        // TODO: Implement getPathForConversions() method.
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        // TODO: Implement getPathForResponsiveImages() method.
    }
}