<?php

namespace App\Filament\Admin\Resources\BrangayOfficialsResource\Pages;

use App\Filament\Admin\Resources\BrangayOfficialsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBrangayOfficials extends CreateRecord
{
    // Specifies the resource associated with this page
    protected static string $resource = BrangayOfficialsResource::class;

    // Redirect user to the index page after creating a new record
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');  // Redirects to the 'index' route
    }
}
