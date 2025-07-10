<?php

namespace App\Filament\Admin\Resources\AssocFoundationResource\Pages;

use App\Filament\Admin\Resources\AssocFoundationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAssocFoundations extends ListRecords
{
    protected static string $resource = AssocFoundationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
