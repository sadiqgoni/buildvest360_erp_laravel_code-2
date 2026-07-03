<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PaymentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('project.project_id')
                    ->label('Project Ref'),
                TextEntry::make('project.client.full_name')
                    ->label('Client'),
                TextEntry::make('amount_paid')
                    ->money('NGN'),
                TextEntry::make('payment_date')
                    ->date(),
                TextEntry::make('payment_method'),
                TextEntry::make('reference_number')
                    ->placeholder('-'),
                TextEntry::make('remarks')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
