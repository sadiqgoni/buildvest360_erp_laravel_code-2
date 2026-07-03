<?php

namespace App\Filament\Resources\ClientSelections\Pages;

use App\Filament\Resources\ClientSelections\ClientSelectionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateClientSelection extends CreateRecord
{
    protected static string $resource = ClientSelectionResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
