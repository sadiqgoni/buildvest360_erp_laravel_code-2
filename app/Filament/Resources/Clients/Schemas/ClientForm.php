<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('client_id')
                    ->required(),
                TextInput::make('full_name')
                    ->required(),
                TextInput::make('gender')
                    ->default(null),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('alternative_phone')
                    ->tel()
                    ->default(null),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('occupation')
                    ->default(null),
                TextInput::make('employer')
                    ->default(null),
                TextInput::make('job_title')
                    ->default(null),
                Textarea::make('office_address')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('monthly_income')
                    ->default(null),
                Textarea::make('residential_address')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('state')
                    ->default(null),
                TextInput::make('lga')
                    ->default(null),
                TextInput::make('ward')
                    ->default(null),
                Textarea::make('landmark')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('house_ownership')
                    ->default(null),
                TextInput::make('status')
                    ->required()
                    ->default('Active'),
            ]);
    }
}
