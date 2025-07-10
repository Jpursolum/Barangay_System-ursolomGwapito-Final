<?php

namespace App\Filament\Admin\Resources\BrgyCaptainCornerResource\Pages;

use App\Filament\Admin\Resources\BrgyCaptainCornerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBrgyCaptainCorners extends ListRecords
{
    protected static string $resource = BrgyCaptainCornerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
