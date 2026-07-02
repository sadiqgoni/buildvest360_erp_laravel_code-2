<?php

namespace App\Filament\Resources\Measurements\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MeasurementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('project_id')
                    ->required()
                    ->numeric(),
                TextInput::make('client_ground_floor_sqm')
                    ->numeric()
                    ->default(null),
                TextInput::make('client_first_floor_sqm')
                    ->numeric()
                    ->default(null),
                TextInput::make('client_other_floor_sqm')
                    ->numeric()
                    ->default(null),
                TextInput::make('client_total_sqm')
                    ->numeric()
                    ->default(null),
                TextInput::make('engineer_ground_floor_sqm')
                    ->numeric()
                    ->default(null),
                TextInput::make('engineer_first_floor_sqm')
                    ->numeric()
                    ->default(null),
                TextInput::make('engineer_other_floor_sqm')
                    ->numeric()
                    ->default(null),
                TextInput::make('engineer_total_sqm')
                    ->numeric()
                    ->default(null),
                TextInput::make('measurement_difference_sqm')
                    ->numeric()
                    ->default(null),
                TextInput::make('measurement_difference_percent')
                    ->numeric()
                    ->default(null),
                TextInput::make('approved_area_sqm')
                    ->numeric()
                    ->default(null),
                TextInput::make('measurement_status')
                    ->required()
                    ->default('Client Submitted'),
                Textarea::make('engineer_remarks')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('admin_remarks')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
