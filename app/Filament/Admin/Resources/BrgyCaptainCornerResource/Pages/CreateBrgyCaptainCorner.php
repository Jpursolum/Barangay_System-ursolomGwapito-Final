<?php

namespace App\Filament\Admin\Resources\BrgyCaptainCornerResource\Pages;

use App\Filament\Admin\Resources\BrgyCaptainCornerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBrgyCaptainCorner extends CreateRecord
{
    protected static string $resource = BrgyCaptainCornerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
