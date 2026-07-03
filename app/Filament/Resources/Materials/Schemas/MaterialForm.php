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
                Select::make('project_id')
                    ->relationship('project', 'project_id')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('material_name')
                    ->required(),
                Select::make('supplier_responsibility')
                    ->options([
                        'Client Supplies' => 'Client Supplies',
                        'Contractor Supplies' => 'Contractor Supplies',
                        'Shared Supply' => 'Shared Supply',
                    ])
                    ->required(),
                TextInput::make('estimated_cost')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->prefix('NGN'),
                Select::make('delivery_status')
                    ->options([
                        'Pending' => 'Pending',
                        'Scheduled' => 'Scheduled',
                        'Delivered' => 'Delivered',
                    ])
                    ->default('Pending')
                    ->required(),
                DatePicker::make('required_date'),
                Textarea::make('remarks')
                    ->columnSpanFull(),
            ]);
    }
}
