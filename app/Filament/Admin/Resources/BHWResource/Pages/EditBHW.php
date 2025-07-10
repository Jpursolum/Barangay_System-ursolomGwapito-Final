<?php

namespace App\Filament\Admin\Resources\BHWResource\Pages;

use App\Filament\Admin\Resources\BHWResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBHW extends EditRecord
{
    protected static string $resource = BHWResource::class;

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
