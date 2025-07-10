<?php

namespace App\Filament\Admin\Resources\BrgyActivityResource\Pages;

use App\Filament\Admin\Resources\BrgyActivityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBrgyActivities extends ListRecords
{
    protected static string $resource = BrgyActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
