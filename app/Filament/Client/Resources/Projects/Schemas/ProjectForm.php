<?php

namespace App\Filament\Client\Resources\Projects\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
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
                TextInput::make('service_type')
                    ->required()
                    ->default('New Build'),
                TextInput::make('project_origin')
                    ->required()
                    ->default('New Project'),
                Textarea::make('project_address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('building_type')
                    ->required(),
                TextInput::make('construction_stage')
                    ->required(),
                TextInput::make('current_progress_percent')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('number_of_floors')
                    ->numeric()
                    ->default(null),
                TextInput::make('number_of_bedrooms')
                    ->numeric()
                    ->default(null),
                Textarea::make('finishing_works')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('client_objectives')
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
                Toggle::make('client_portal_visible')
                    ->required(),
            ]);
    }
}
