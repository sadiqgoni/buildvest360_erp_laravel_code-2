<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('project_id')
                    ->required(),
                TextInput::make('client_id')
                    ->required()
                    ->numeric(),
                Textarea::make('project_address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('building_type')
                    ->required(),
                TextInput::make('construction_stage')
                    ->required(),
                TextInput::make('number_of_floors')
                    ->numeric()
                    ->default(null),
                TextInput::make('number_of_bedrooms')
                    ->numeric()
                    ->default(null),
                Textarea::make('finishing_works')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('approved_area_sqm')
                    ->numeric()
                    ->default(null),
                TextInput::make('cost_per_sqm')
                    ->numeric()
                    ->default(null),
                TextInput::make('estimated_completion_cost')
                    ->numeric()
                    ->default(null)
                    ->prefix('$'),
                TextInput::make('project_status')
                    ->required()
                    ->default('Registered'),
            ]);
    }
}
