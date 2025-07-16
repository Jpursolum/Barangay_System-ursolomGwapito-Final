<?php

namespace App\Filament\Admin\Resources\BrgyHeadOfFamilyResource\Pages;

use App\Filament\Admin\Resources\BrgyHeadOfFamilyResource;
use Filament\Resources\Pages\ListRecords;

class ListBrgyHeadOfFamilies extends ListRecords
{
    protected static string $resource = BrgyHeadOfFamilyResource::class;

    protected function getHeaderActions(): array
    {
        return []; // removes the "+ New Barangay Head of the Family" button
    }
}
