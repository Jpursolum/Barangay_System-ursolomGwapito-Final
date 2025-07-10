<?php

namespace App\Filament\Admin\Resources\BHWResource\Pages;

use App\Filament\Admin\Resources\BHWResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBHW extends CreateRecord
{
    protected static string $resource = BHWResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
