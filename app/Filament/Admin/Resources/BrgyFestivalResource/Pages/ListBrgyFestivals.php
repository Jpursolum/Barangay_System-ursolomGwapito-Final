<?php

namespace App\Filament\Admin\Resources\BrgyFestivalResource\Pages;

use App\Filament\Admin\Resources\BrgyFestivalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBrgyFestivals extends ListRecords
{
    protected static string $resource = BrgyFestivalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
