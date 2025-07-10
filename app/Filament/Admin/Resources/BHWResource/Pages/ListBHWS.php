<?php

namespace App\Filament\Admin\Resources\BHWResource\Pages;

use App\Filament\Admin\Resources\BHWResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBHWS extends ListRecords
{
    protected static string $resource = BHWResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
