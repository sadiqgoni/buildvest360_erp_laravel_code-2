<?php

namespace App\Filament\Resources\ProcurementItems\Pages;

use App\Filament\Resources\ProcurementItems\ProcurementItemResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProcurementItem extends CreateRecord
{
    protected static string $resource = ProcurementItemResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
