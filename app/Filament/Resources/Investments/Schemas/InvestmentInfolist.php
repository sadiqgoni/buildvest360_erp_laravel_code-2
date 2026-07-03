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
                TextEntry::make('project.project_id')
                    ->label('Project Ref'),
                TextEntry::make('project.client.full_name')
                    ->label('Client'),
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
                TextEntry::make('client_profit_reason')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('admin_approved_profit_margin')
                    ->suffix('%')
                    ->placeholder('-'),
                TextEntry::make('admin_profit_note')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('profit_margin_status')
                    ->badge(),
                TextEntry::make('profit_amount')
                    ->money('NGN'),
                TextEntry::make('total_amount_payable')
                    ->money('NGN'),
                TextEntry::make('repayment_duration_months')
                    ->label('Repayment Duration')
                    ->suffix(' months'),
                TextEntry::make('monthly_contribution')
                    ->money('NGN'),
                TextEntry::make('payment_day')
                    ->placeholder('-'),
                TextEntry::make('payment_method')
                    ->placeholder('-'),
                TextEntry::make('payment_plan_status')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
