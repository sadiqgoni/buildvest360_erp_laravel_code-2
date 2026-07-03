<?php

namespace App\Filament\Client\Resources\Investments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class InvestmentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('project.project_id')
                    ->label('Project Ref'),
                TextEntry::make('estimated_cost')
                    ->money('NGN'),
                TextEntry::make('client_initial_contribution')
                    ->money('NGN'),
                TextEntry::make('contractor_investment')
                    ->money('NGN'),
                TextEntry::make('financing_mode'),
                TextEntry::make('client_proposed_profit_margin')
                    ->suffix('%')
                    ->placeholder('-'),
                TextEntry::make('admin_approved_profit_margin')
                    ->suffix('%')
                    ->placeholder('Awaiting company review'),
                TextEntry::make('profit_margin_status')
                    ->badge(),
                TextEntry::make('client_profit_reason')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('admin_profit_note')
                    ->placeholder('No admin note yet.')
                    ->columnSpanFull(),
                TextEntry::make('total_amount_payable')
                    ->money('NGN'),
                TextEntry::make('monthly_contribution')
                    ->money('NGN'),
                TextEntry::make('repayment_duration_months')
                    ->suffix(' months'),
                TextEntry::make('payment_day')
                    ->placeholder('-'),
                TextEntry::make('payment_method')
                    ->placeholder('-'),
                TextEntry::make('payment_plan_status')
                    ->badge(),
            ]);
    }
}
