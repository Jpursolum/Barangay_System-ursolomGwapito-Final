<?php

namespace App\Filament\Admin\Resources\ResolutionResource\Pages;

use App\Filament\Admin\Resources\ResolutionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateResolution extends CreateRecord
{
    protected static string $resource = ResolutionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
