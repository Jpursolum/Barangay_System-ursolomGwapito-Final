<?php

namespace App\Filament\Admin\Resources\BarangayProductResource\Pages;

use App\Filament\Admin\Resources\BarangayProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBarangayProduct extends EditRecord
{
    protected static string $resource = BarangayProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
