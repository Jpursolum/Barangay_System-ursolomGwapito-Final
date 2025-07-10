<?php

namespace App\Filament\Admin\Resources\AssocFoundationResource\Pages;

use App\Filament\Admin\Resources\AssocFoundationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAssocFoundation extends CreateRecord
{
    protected static string $resource = AssocFoundationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
