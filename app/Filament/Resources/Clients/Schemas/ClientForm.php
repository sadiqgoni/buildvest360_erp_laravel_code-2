<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('client_id'),
                Section::make('Client Profile')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('full_name')
                                ->label('Client Name')
                                ->required(),
                            TextInput::make('email')
                                ->label('Email Address')
                                ->email()
                                ->required(),
                            TextInput::make('phone')
                                ->tel()
                                ->required(),
                            TextInput::make('occupation'),
                            Select::make('state')
                                ->options([
                                    'Lagos' => 'Lagos',
                                    'Abuja FCT' => 'Abuja FCT',
                                    'Rivers' => 'Rivers',
                                    'Ogun' => 'Ogun',
                                    'Oyo' => 'Oyo',
                                    'Delta' => 'Delta',
                                    'Anambra' => 'Anambra',
                                    'Kaduna' => 'Kaduna',
                                ])
                                ->searchable()
                                ->required(),
                            TextInput::make('lga')
                                ->label('LGA')
                                ->required(),
                            Select::make('status')
                                ->options([
                                    'Active' => 'Active',
                                    'Prospect' => 'Prospect',
                                    'Inactive' => 'Inactive',
                                ])
                                ->default('Active')
                                ->required(),
                        ]),
                        Textarea::make('residential_address')
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('landmark')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
