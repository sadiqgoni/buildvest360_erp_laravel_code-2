<?php

namespace App\Filament\Resources\ProcurementItems\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProcurementItemForm
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
                Select::make('supplier_id')
                    ->relationship('supplier', 'supplier_name')
                    ->searchable()
                    ->preload(),
                TextInput::make('item_name')
                    ->required(),
                TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                TextInput::make('unit'),
                TextInput::make('unit_price')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->prefix('NGN'),
                TextInput::make('total_price')
                    ->numeric()
                    ->disabled()
                    ->dehydrated(false)
                    ->prefix('NGN'),
                Select::make('procurement_status')
                    ->options([
                        'Requested' => 'Requested',
                        'Approved' => 'Approved',
                        'Ordered' => 'Ordered',
                        'Delivered' => 'Delivered',
                    ])
                    ->default('Requested')
                    ->required(),
                Select::make('request_type')
                    ->options([
                        'Purchase Requisition' => 'Purchase Requisition',
                        'Purchase Order' => 'Purchase Order',
                    ])
                    ->default('Purchase Requisition')
                    ->required(),
                Textarea::make('remarks')
                    ->columnSpanFull(),
            ]);
    }
}
