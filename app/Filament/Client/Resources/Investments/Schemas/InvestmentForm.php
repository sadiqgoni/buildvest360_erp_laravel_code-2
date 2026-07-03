<?php

namespace App\Filament\Client\Resources\Investments\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class InvestmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('financing_mode')
                    ->options([
                        'Contractor Finance' => 'Contractor Finance',
                        'Completion Finance' => 'Completion Finance',
                        'Progressive Drawdown' => 'Progressive Drawdown',
                        'Client Self-Funded' => 'Client Self-Funded',
                    ])
                    ->native(false)
                    ->required(),
                TextInput::make('client_initial_contribution')
                    ->label('My Contribution')
                    ->numeric()
                    ->prefix('NGN')
                    ->required(),
                TextInput::make('client_proposed_profit_margin')
                    ->label('Preferred Profit Margin (%)')
                    ->numeric(),
                TextInput::make('repayment_duration_months')
                    ->label('Preferred Repayment Duration (Months)')
                    ->numeric()
                    ->required(),
                TextInput::make('payment_day')
                    ->placeholder('Example: 15th'),
                Select::make('payment_method')
                    ->options([
                        'Bank Transfer' => 'Bank Transfer',
                        'Direct Debit' => 'Direct Debit',
                        'Cheque' => 'Cheque',
                        'POS' => 'POS',
                    ])
                    ->native(false),
                Textarea::make('client_profit_reason')
                    ->label('Reason / Request')
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }
}
