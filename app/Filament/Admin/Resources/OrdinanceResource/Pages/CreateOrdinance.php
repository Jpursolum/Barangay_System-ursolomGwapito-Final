<?php

namespace App\Filament\Admin\Resources\OrdinanceResource\Pages;

use App\Filament\Admin\Resources\OrdinanceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrdinance extends CreateRecord
{
    protected static string $resource = OrdinanceResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
