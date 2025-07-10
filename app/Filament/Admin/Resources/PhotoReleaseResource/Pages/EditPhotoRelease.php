<?php

namespace App\Filament\Admin\Resources\PhotoReleaseResource\Pages;

use App\Filament\Admin\Resources\PhotoReleaseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPhotoRelease extends EditRecord
{
    protected static string $resource = PhotoReleaseResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
