<?php

namespace App\Filament\Client\Resources\Projects\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProjectInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('project_id')
                    ->label('Project Ref'),
                TextEntry::make('service_type'),
                TextEntry::make('project_origin'),
                TextEntry::make('project_address')
                    ->columnSpanFull(),
                TextEntry::make('building_type'),
                TextEntry::make('construction_stage'),
                TextEntry::make('current_progress_percent')
                    ->label('Current Progress')
                    ->suffix('%'),
                TextEntry::make('number_of_floors')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('number_of_bedrooms')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('finishing_works')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('client_objectives')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('approved_area_sqm')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('cost_per_sqm')
                    ->money('NGN')
                    ->placeholder('-'),
                TextEntry::make('estimated_completion_cost')
                    ->money('NGN')
                    ->placeholder('-'),
                TextEntry::make('project_status')
                    ->badge(),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
