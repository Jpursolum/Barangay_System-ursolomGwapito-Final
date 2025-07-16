<?php

namespace App\Filament\Admin\Resources\BrgyHeadOfFamilyResource\Pages;

use App\Filament\Admin\Resources\BrgyHeadOfFamilyResource;
use App\Filament\Admin\Resources\BrgyHeadOfFamilyResource\RelationManagers\FamilyMembersRelationManager;
use Filament\Resources\Pages\ViewRecord;

class ViewBrgyHeadOfFamily extends ViewRecord
{
    protected static string $resource = BrgyHeadOfFamilyResource::class;

    protected function getRelations(): array
    {
        return [
            FamilyMembersRelationManager::class,
        ];
    }

    protected function getActions(): array
    {
        return []; // No edit/delete on view
    }
}
