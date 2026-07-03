<?php

namespace App\Filament\Resources\Investments\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class InvestmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Project Finance Setup')
                    ->schema([
                        Grid::make(2)->schema([
                            Select::make('project_id')
                                ->relationship('project', 'project_id')
                                ->label('Project')
                                ->searchable()
                                ->preload()
                                ->required(),
                            Select::make('financing_mode')
                                ->options([
                                    'Contractor Finance' => 'Contractor Finance',
                                    'Completion Finance' => 'Completion Finance',
                                    'Progressive Drawdown' => 'Progressive Drawdown',
                                    'Client Self-Funded' => 'Client Self-Funded',
                                ])
                                ->native(false)
                                ->required(),
                            TextInput::make('estimated_cost')
                                ->numeric()
                                ->prefix('NGN')
                                ->required(),
                            TextInput::make('client_initial_contribution')
                                ->label('Client Initial Contribution')
                                ->numeric()
                                ->prefix('NGN')
                                ->required(),
                            TextInput::make('contractor_investment')
                                ->numeric()
                                ->prefix('NGN')
                                ->required(),
                            TextInput::make('repayment_duration_months')
                                ->label('Repayment Duration (Months)')
                                ->numeric()
                                ->required(),
                            TextInput::make('payment_day')
                                ->placeholder('Example: 10th'),
                            Select::make('payment_method')
                                ->options([
                                    'Bank Transfer' => 'Bank Transfer',
                                    'Direct Debit' => 'Direct Debit',
                                    'Cheque' => 'Cheque',
                                    'POS' => 'POS',
                                ])
                                ->native(false),
                        ]),
                    ]),
                Section::make('Margin & Approval Decision')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('client_proposed_profit_margin')
                                ->label('Client Proposed Margin (%)')
                                ->numeric(),
                            TextInput::make('admin_approved_profit_margin')
                                ->label('Approved Margin (%)')
                                ->numeric(),
                            Select::make('profit_margin_status')
                                ->options([
                                    'pending' => 'Pending',
                                    'approved' => 'Approved',
                                    'countered' => 'Countered',
                                    'rejected' => 'Rejected',
                                ])
                                ->native(false)
                                ->default('pending')
                                ->required(),
                            Select::make('payment_plan_status')
                                ->options([
                                    'proposed' => 'Proposed',
                                    'approved' => 'Approved',
                                    'countered' => 'Countered',
                                    'rejected' => 'Rejected',
                                ])
                                ->native(false)
                                ->default('proposed')
                                ->required(),
                        ]),
                        Textarea::make('client_profit_reason')
                            ->label('Client Reason / Request')
                            ->columnSpanFull(),
                        Textarea::make('admin_profit_note')
                            ->label('Admin Decision Note')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
