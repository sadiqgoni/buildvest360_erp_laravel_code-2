<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('project_id')
                    ->relationship('project', 'project_id')
                    ->label('Project')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('amount_paid')
                    ->label('Amount Paid')
                    ->required()
                    ->numeric(),
                DatePicker::make('payment_date')
                    ->required(),
                Select::make('payment_method')
                    ->options([
                        'Bank Transfer' => 'Bank Transfer',
                        'Direct Debit' => 'Direct Debit',
                        'Cheque' => 'Cheque',
                        'POS' => 'POS',
                    ])
                    ->native(false)
                    ->required(),
                TextInput::make('reference_number')
                    ->default(null),
                Textarea::make('remarks')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
