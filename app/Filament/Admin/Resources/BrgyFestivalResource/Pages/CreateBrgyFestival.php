<?php

namespace App\Filament\Admin\Resources\BrgyFestivalResource\Pages;

use App\Filament\Admin\Resources\BrgyFestivalResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBrgyFestival extends CreateRecord
{
    protected static string $resource = BrgyFestivalResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
