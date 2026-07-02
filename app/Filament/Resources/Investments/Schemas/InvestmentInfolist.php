<?php

namespace App\Filament\Resources\Investments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class InvestmentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('project_id')
                    ->numeric(),
                TextEntry::make('estimated_cost')
                    ->money(),
                TextEntry::make('client_initial_contribution')
                    ->numeric(),
                TextEntry::make('contractor_investment')
                    ->numeric(),
                TextEntry::make('client_proposed_profit_margin')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('client_profit_reason')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('admin_approved_profit_margin')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('admin_profit_note')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('profit_margin_status')
                    ->badge(),
                TextEntry::make('profit_amount')
                    ->numeric(),
                TextEntry::make('total_amount_payable')
                    ->numeric(),
                TextEntry::make('repayment_duration_months')
                    ->numeric(),
                TextEntry::make('monthly_contribution')
                    ->numeric(),
                TextEntry::make('payment_day')
                    ->placeholder('-'),
                TextEntry::make('payment_method')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
