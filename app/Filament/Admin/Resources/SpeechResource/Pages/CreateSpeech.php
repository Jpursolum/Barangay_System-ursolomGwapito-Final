<?php

namespace App\Filament\Admin\Resources\SpeechResource\Pages;

use App\Filament\Admin\Resources\SpeechResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSpeech extends CreateRecord
{
    protected static string $resource = SpeechResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
