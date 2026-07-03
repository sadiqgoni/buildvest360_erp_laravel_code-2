<?php

namespace App\Filament\Client\Resources\ProjectUpdates\Pages;

use App\Filament\Client\Resources\ProjectUpdates\ProjectUpdateResource;
use Filament\Resources\Pages\ViewRecord;

class ViewProjectUpdate extends ViewRecord
{
    protected static string $resource = ProjectUpdateResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
