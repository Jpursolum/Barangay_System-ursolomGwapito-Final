<?php

namespace App\Filament\Admin\Resources\ResolutionResource\Pages;

use App\Filament\Admin\Resources\ResolutionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListResolutions extends ListRecords
{
    protected static string $resource = ResolutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
