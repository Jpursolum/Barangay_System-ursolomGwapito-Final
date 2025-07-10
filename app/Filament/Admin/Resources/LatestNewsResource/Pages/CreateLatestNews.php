<?php

namespace App\Filament\Admin\Resources\LatestNewsResource\Pages;

use App\Filament\Admin\Resources\LatestNewsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLatestNews extends CreateRecord
{
    protected static string $resource = LatestNewsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
