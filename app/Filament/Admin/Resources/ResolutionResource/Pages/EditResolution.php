<?php

namespace App\Filament\Admin\Resources\ResolutionResource\Pages;

use App\Filament\Admin\Resources\ResolutionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResolution extends EditRecord
{
    protected static string $resource = ResolutionResource::class;

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
