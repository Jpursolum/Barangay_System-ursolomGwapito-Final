<?php

namespace App\Filament\Admin\Resources\BrangayOfficialsResource\Pages;

use App\Filament\Admin\Resources\BrangayOfficialsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBrangayOfficials extends EditRecord
{
    protected static string $resource = BrangayOfficialsResource::class;

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
