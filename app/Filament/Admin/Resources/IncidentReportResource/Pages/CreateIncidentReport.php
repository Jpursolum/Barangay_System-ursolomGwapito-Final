<?php

namespace App\Filament\Admin\Resources\IncidentReportResource\Pages;

use App\Filament\Admin\Resources\IncidentReportResource;
use Filament\Resources\Pages\CreateRecord;

class CreateIncidentReport extends CreateRecord
{
    protected static string $resource = IncidentReportResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
