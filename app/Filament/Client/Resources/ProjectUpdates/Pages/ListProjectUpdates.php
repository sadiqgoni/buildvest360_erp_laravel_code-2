<?php

namespace App\Filament\Client\Resources\ProjectUpdates\Pages;

use App\Filament\Client\Resources\ProjectUpdates\ProjectUpdateResource;
use Filament\Resources\Pages\ListRecords;

class ListProjectUpdates extends ListRecords
{
    protected static string $resource = ProjectUpdateResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
