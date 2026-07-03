<?php

namespace App\Filament\Client\Resources\ClientSelections\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ClientSelectionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('project.project_id')
                    ->label('Project Ref'),
                TextEntry::make('category'),
                TextEntry::make('item_name'),
                TextEntry::make('selected_option')
                    ->placeholder('-'),
                TextEntry::make('budget_amount')
                    ->money('NGN')
                    ->placeholder('-'),
                TextEntry::make('decision_deadline')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('client_notes')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('admin_notes')
                    ->placeholder('No response from admin yet.')
                    ->columnSpanFull(),
                TextEntry::make('status')
                    ->badge(),
            ]);
    }
}
