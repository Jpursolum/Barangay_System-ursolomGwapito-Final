<?php

namespace App\Filament\Admin\Resources\LatestNewsResource\Pages;

use App\Filament\Admin\Resources\LatestNewsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLatestNews extends EditRecord
{
    protected static string $resource = LatestNewsResource::class;

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
