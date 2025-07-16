<?php

namespace App\Filament\Admin\Resources\BrgyHeadOfFamilyResource\Pages;

use App\Filament\Admin\Resources\BrgyHeadOfFamilyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBrgyHeadOfFamily extends EditRecord
{
    protected static string $resource = BrgyHeadOfFamilyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
