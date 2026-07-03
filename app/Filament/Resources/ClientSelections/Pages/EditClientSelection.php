<?php

namespace App\Filament\Resources\ClientSelections\Pages;

use App\Filament\Resources\ClientSelections\ClientSelectionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditClientSelection extends EditRecord
{
    protected static string $resource = ClientSelectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
