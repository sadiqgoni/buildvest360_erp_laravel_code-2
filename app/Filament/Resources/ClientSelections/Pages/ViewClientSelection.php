<?php

namespace App\Filament\Resources\ClientSelections\Pages;

use App\Filament\Resources\ClientSelections\ClientSelectionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewClientSelection extends ViewRecord
{
    protected static string $resource = ClientSelectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
