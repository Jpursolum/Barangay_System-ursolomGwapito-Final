<?php

namespace App\Filament\Admin\Resources\PhotoReleaseResource\Pages;

use App\Filament\Admin\Resources\PhotoReleaseResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePhotoRelease extends CreateRecord
{
    protected static string $resource = PhotoReleaseResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
