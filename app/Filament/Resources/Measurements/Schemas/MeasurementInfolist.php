<?php

namespace App\Filament\Resources\Measurements\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MeasurementInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('project_id')
                    ->numeric(),
                TextEntry::make('client_ground_floor_sqm')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('client_first_floor_sqm')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('client_other_floor_sqm')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('client_total_sqm')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('engineer_ground_floor_sqm')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('engineer_first_floor_sqm')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('engineer_other_floor_sqm')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('engineer_total_sqm')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('measurement_difference_sqm')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('measurement_difference_percent')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('approved_area_sqm')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('measurement_status'),
                TextEntry::make('engineer_remarks')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('admin_remarks')
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
