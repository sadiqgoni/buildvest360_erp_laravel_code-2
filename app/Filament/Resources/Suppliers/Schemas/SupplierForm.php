<?php

namespace App\Filament\Resources\Suppliers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SupplierForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('supplier_name')
                    ->required(),
                TextInput::make('contact_person')
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                Select::make('category')
                    ->options([
                        'Cement & Concrete' => 'Cement & Concrete',
                        'Steel & Reinforcement' => 'Steel & Reinforcement',
                        'Electricals' => 'Electricals',
                        'Finishing Materials' => 'Finishing Materials',
                        'General Building Materials' => 'General Building Materials',
                    ])
                    ->required(),
                Textarea::make('address')
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        'Active' => 'Active',
                        'Blacklisted' => 'Blacklisted',
                        'Inactive' => 'Inactive',
                    ])
                    ->default('Active')
                    ->required(),
            ]);
    }
}
