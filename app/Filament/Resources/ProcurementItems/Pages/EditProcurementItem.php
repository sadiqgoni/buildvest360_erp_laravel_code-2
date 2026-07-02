<?php

namespace App\Filament\Resources\ProcurementItems\Pages;

use App\Filament\Resources\ProcurementItems\ProcurementItemResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditProcurementItem extends EditRecord
{
    protected static string $resource = ProcurementItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
