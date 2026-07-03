<?php

namespace App\Filament\Client\Resources\Investments\Pages;

use App\Filament\Client\Resources\Investments\InvestmentResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewInvestment extends ViewRecord
{
    protected static string $resource = InvestmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->visible(fn (): bool => in_array($this->record->payment_plan_status, ['proposed', 'countered'], true)),
        ];
    }
}
