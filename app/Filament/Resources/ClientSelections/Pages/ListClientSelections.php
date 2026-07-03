<?php

namespace App\Filament\Resources\ClientSelections\Pages;

use App\Filament\Resources\ClientSelections\ClientSelectionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListClientSelections extends ListRecords
{
    protected static string $resource = ClientSelectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
