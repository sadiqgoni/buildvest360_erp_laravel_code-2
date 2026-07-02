<?php

namespace App\Filament\Resources\Materials\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MaterialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('project_id')
                    ->required()
                    ->numeric(),
                TextInput::make('material_name')
                    ->required(),
                Select::make('supplier_responsibility')
                    ->options([
            'Client Supplies' => 'Client supplies',
            'Contractor Supplies' => 'Contractor supplies',
            'Shared Supply' => 'Shared supply',
        ])
                    ->required(),
                TextInput::make('estimated_cost')
                    ->required()
                    ->numeric()
                    ->default(0.0)
                    ->prefix('$'),
                TextInput::make('delivery_status')
                    ->required()
                    ->default('Pending'),
                DatePicker::make('required_date'),
                Textarea::make('remarks')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
