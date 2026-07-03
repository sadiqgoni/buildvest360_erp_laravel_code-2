<?php

namespace App\Filament\Client\Resources\Investments\Pages;

use App\Filament\Client\Resources\Investments\InvestmentResource;
use Filament\Resources\Pages\EditRecord;

class EditInvestment extends EditRecord
{
    protected static string $resource = InvestmentResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['payment_plan_status'] = 'proposed';
        $data['profit_margin_status'] = 'pending';

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
