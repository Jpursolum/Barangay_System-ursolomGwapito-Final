<?php

namespace App\Filament\Admin\Resources\OrdinanceResource\Pages;

use App\Filament\Admin\Resources\OrdinanceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrdinance extends EditRecord
{
    protected static string $resource = OrdinanceResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
