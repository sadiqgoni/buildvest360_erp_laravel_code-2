<?php

namespace App\Filament\Resources\ProcurementItems\Pages;

use App\Filament\Resources\ProcurementItems\ProcurementItemResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProcurementItem extends ViewRecord
{
    protected static string $resource = ProcurementItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
