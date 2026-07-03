<?php

namespace App\Filament\Client\Resources\Payments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('project_id')
                    ->required()
                    ->numeric(),
                TextInput::make('amount_paid')
                    ->required()
                    ->numeric(),
                DatePicker::make('payment_date')
                    ->required(),
                TextInput::make('payment_method')
                    ->required(),
                TextInput::make('reference_number')
                    ->default(null),
                Textarea::make('remarks')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
