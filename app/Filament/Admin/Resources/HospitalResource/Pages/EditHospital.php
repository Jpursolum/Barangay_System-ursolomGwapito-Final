<?php

namespace App\Filament\Admin\Resources\HospitalResource\Pages;

use App\Filament\Admin\Resources\HospitalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHospital extends EditRecord
{
    protected static string $resource = HospitalResource::class;

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
