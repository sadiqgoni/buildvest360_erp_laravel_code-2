<?php

namespace App\Filament\Resources\Measurements\Schemas;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MeasurementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('project_id')
                    ->relationship('project', 'project_id')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('client_ground_floor_sqm')
                    ->numeric(),
                TextInput::make('client_first_floor_sqm')
                    ->numeric(),
                TextInput::make('client_other_floor_sqm')
                    ->numeric(),
                Placeholder::make('client_total_sqm')
                    ->content(fn ($record): string => $record ? number_format((float) $record->client_total_sqm, 2) . ' sqm' : 'Auto-calculated on save'),
                TextInput::make('engineer_ground_floor_sqm')
                    ->numeric(),
                TextInput::make('engineer_first_floor_sqm')
                    ->numeric(),
                TextInput::make('engineer_other_floor_sqm')
                    ->numeric(),
                Placeholder::make('engineer_total_sqm')
                    ->content(fn ($record): string => $record ? number_format((float) $record->engineer_total_sqm, 2) . ' sqm' : 'Auto-calculated on save'),
                Placeholder::make('measurement_difference_sqm')
                    ->content(fn ($record): string => $record ? number_format((float) $record->measurement_difference_sqm, 2) . ' sqm' : 'Auto-calculated on save'),
                Placeholder::make('measurement_difference_percent')
                    ->content(fn ($record): string => $record ? number_format((float) $record->measurement_difference_percent, 2) . '%' : 'Auto-calculated on save'),
                TextInput::make('approved_area_sqm')
                    ->numeric(),
                Select::make('measurement_status')
                    ->options([
                        'Client Submitted' => 'Client Submitted',
                        'Under Review' => 'Under Review',
                        'Verified' => 'Verified',
                        'Approved' => 'Approved',
                    ])
                    ->default('Client Submitted')
                    ->required(),
                Textarea::make('engineer_remarks')
                    ->columnSpanFull(),
                Textarea::make('admin_remarks')
                    ->columnSpanFull(),
            ]);
    }
}
