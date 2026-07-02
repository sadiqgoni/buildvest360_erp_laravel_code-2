<?php

namespace App\Filament\Resources\ProcurementItems\Pages;

use App\Filament\Resources\ProcurementItems\ProcurementItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProcurementItems extends ListRecords
{
    protected static string $resource = ProcurementItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
