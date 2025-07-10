<?php

namespace App\Filament\Admin\Resources\PhotoReleaseResource\Pages;

use App\Filament\Admin\Resources\PhotoReleaseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPhotoReleases extends ListRecords
{
    protected static string $resource = PhotoReleaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
