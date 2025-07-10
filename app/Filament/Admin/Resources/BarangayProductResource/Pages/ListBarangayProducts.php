<?php

namespace App\Filament\Admin\Resources\BarangayProductResource\Pages;

use App\Filament\Admin\Resources\BarangayProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBarangayProducts extends ListRecords
{
    protected static string $resource = BarangayProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
