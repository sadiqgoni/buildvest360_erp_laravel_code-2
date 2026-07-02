<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProjectInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('project_id'),
                TextEntry::make('client_id')
                    ->numeric(),
                TextEntry::make('project_address')
                    ->columnSpanFull(),
                TextEntry::make('building_type'),
                TextEntry::make('construction_stage'),
                TextEntry::make('number_of_floors')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('number_of_bedrooms')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('finishing_works')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('approved_area_sqm')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('cost_per_sqm')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('estimated_completion_cost')
                    ->money()
                    ->placeholder('-'),
                TextEntry::make('project_status'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
