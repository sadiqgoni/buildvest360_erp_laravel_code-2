<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ClientInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('client_id'),
                TextEntry::make('full_name'),
                TextEntry::make('gender')
                    ->placeholder('-'),
                TextEntry::make('phone'),
                TextEntry::make('alternative_phone')
                    ->placeholder('-'),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-'),
                TextEntry::make('occupation')
                    ->placeholder('-'),
                TextEntry::make('employer')
                    ->placeholder('-'),
                TextEntry::make('job_title')
                    ->placeholder('-'),
                TextEntry::make('office_address')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('monthly_income')
                    ->placeholder('-'),
                TextEntry::make('residential_address')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('state')
                    ->placeholder('-'),
                TextEntry::make('lga')
                    ->placeholder('-'),
                TextEntry::make('ward')
                    ->placeholder('-'),
                TextEntry::make('landmark')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('house_ownership')
                    ->placeholder('-'),
                TextEntry::make('status'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
