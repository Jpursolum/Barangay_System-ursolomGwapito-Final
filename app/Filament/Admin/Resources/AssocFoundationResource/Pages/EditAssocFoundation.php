<?php

namespace App\Filament\Admin\Resources\AssocFoundationResource\Pages;

use App\Filament\Admin\Resources\AssocFoundationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAssocFoundation extends EditRecord
{
    protected static string $resource = AssocFoundationResource::class;

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
