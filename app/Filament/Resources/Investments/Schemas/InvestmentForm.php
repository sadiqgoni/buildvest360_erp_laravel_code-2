<?php

namespace App\Filament\Resources\Investments\Schemas;

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
                TextInput::make('project_id')
                    ->required()
                    ->numeric(),
                TextInput::make('estimated_cost')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('client_initial_contribution')
                    ->required()
                    ->numeric(),
                TextInput::make('contractor_investment')
                    ->required()
                    ->numeric(),
                TextInput::make('client_proposed_profit_margin')
                    ->numeric()
                    ->default(null),
                Textarea::make('client_profit_reason')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('admin_approved_profit_margin')
                    ->numeric()
                    ->default(null),
                Textarea::make('admin_profit_note')
                    ->default(null)
                    ->columnSpanFull(),
                Select::make('profit_margin_status')
                    ->options([
            'pending' => 'Pending',
            'approved' => 'Approved',
            'countered' => 'Countered',
            'rejected' => 'Rejected',
        ])
                    ->default('pending')
                    ->required(),
                TextInput::make('profit_amount')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('total_amount_payable')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('repayment_duration_months')
                    ->required()
                    ->numeric(),
                TextInput::make('monthly_contribution')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('payment_day')
                    ->default(null),
                TextInput::make('payment_method')
                    ->default(null),
            ]);
    }
}
