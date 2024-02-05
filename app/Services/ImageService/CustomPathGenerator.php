<?php

namespace App\Services\ImageService;

use App\Models\Factor;
use App\Models\Transaction;
use App\Models\User;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class CustomPathGenerator implements PathGenerator
{

    public function getPath(Media $media): string
    {
        switch ($media->model_type) {
            case Transaction::class:
            {
                return 'transaction'.DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR;
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
        switch ($media->model_type) {
            case Transaction::class:
            {
                return 'transaction'.DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR;
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

    public function getPathForResponsiveImages(Media $media): string
    {
        switch ($media->model_type) {
            case Transaction::class:
            {
                return 'transaction'.DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR;
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
}