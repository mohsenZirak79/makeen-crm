<?php

namespace App\Services\ImageService;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class ImageServiceProvider
{
    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    static public function storeImage(Model $model, UploadedFile|string $file)
    {
        if (static::canInteractWithMedia($model)) {
            switch (get_class($model)) {
                case User::class:
                {
                    $model->addMedia($file)
                        ->toMediaCollection('avatars');
                }
                case Transaction::class:
                {
                    $model->addMedia($file)
                        ->toMediaCollection('transaction');
                }
            }
        }
    }

    static protected function checkHasTrait(Model $model, string $trait): bool
    {
        return in_array($trait, class_uses_recursive(get_class($model)));
    }

    static protected function haveImplementedInterface(Model $model, string $interface): bool
    {
        return in_array($interface, class_implements(get_class($model)));
    }

    static protected function canInteractWithMedia(Model $model): bool
    {
        return static::checkHasTrait($model, InteractsWithMedia::class)
            and static::haveImplementedInterface($model, HasMedia::class);
    }
}