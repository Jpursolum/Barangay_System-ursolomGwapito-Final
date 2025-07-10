<?php

namespace App\Filament\Admin\Resources\BrgyActivityResource\Pages;

use App\Filament\Admin\Resources\BrgyActivityResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBrgyActivity extends CreateRecord
{
    protected static string $resource = BrgyActivityResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
