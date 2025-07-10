<?php

namespace App\Filament\Admin\Resources\IncidentReportResource\Pages;

use App\Filament\Admin\Resources\IncidentReportResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIncidentReport extends EditRecord
{
    protected static string $resource = IncidentReportResource::class;

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
