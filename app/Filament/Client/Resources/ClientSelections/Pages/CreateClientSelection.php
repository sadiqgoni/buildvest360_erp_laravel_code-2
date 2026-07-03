<?php

namespace App\Filament\Client\Resources\ClientSelections\Pages;

use App\Filament\Client\Resources\ClientSelections\ClientSelectionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateClientSelection extends CreateRecord
{
    protected static string $resource = ClientSelectionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['client_id'] = auth()->user()->client_id;
        $data['status'] = 'pending';

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
