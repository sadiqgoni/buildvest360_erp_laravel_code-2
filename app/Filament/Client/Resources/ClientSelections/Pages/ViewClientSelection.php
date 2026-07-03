<?php

namespace App\Filament\Client\Resources\ClientSelections\Pages;

use App\Filament\Client\Resources\ClientSelections\ClientSelectionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewClientSelection extends ViewRecord
{
    protected static string $resource = ClientSelectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->visible(fn (): bool => in_array($this->record->status, ['pending', 'revision_requested'], true)),
        ];
    }
}
