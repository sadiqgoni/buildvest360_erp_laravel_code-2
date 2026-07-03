<?php

namespace App\Filament\Client\Resources\ClientSelections\Pages;

use App\Filament\Client\Resources\ClientSelections\ClientSelectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListClientSelections extends ListRecords
{
    protected static string $resource = ClientSelectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Submit Choice'),
        ];
    }
}
