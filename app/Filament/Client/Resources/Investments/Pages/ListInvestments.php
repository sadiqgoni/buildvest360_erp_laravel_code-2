<?php

namespace App\Filament\Client\Resources\Investments\Pages;

use App\Filament\Client\Resources\Investments\InvestmentResource;
use Filament\Resources\Pages\ListRecords;

class ListInvestments extends ListRecords
{
    protected static string $resource = InvestmentResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
