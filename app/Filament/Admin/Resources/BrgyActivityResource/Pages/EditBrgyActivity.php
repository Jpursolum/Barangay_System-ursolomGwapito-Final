<?php

namespace App\Filament\Admin\Resources\BrgyActivityResource\Pages;

use App\Filament\Admin\Resources\BrgyActivityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBrgyActivity extends EditRecord
{
    protected static string $resource = BrgyActivityResource::class;

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
