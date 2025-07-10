<?php

namespace App\Filament\Admin\Resources\SpeechResource\Pages;

use App\Filament\Admin\Resources\SpeechResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpeech extends EditRecord
{
    protected static string $resource = SpeechResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
