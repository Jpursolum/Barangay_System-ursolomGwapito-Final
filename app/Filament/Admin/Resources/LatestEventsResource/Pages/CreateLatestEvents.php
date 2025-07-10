<?php

namespace App\Filament\Admin\Resources\LatestEventsResource\Pages;

use App\Filament\Admin\Resources\LatestEventsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLatestEvents extends CreateRecord
{
    protected static string $resource = LatestEventsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
