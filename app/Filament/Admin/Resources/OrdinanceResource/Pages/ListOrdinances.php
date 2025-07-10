<?php

namespace App\Filament\Admin\Resources\OrdinanceResource\Pages;

use App\Filament\Admin\Resources\OrdinanceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrdinances extends ListRecords
{
    protected static string $resource = OrdinanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
