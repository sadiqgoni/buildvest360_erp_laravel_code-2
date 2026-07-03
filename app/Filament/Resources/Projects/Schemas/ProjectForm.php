<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Client & Service Brief')
                    ->schema([
                        Grid::make(2)->schema([
                            Select::make('client_id')
                                ->relationship('client', 'full_name')
                                ->label('Client')
                                ->searchable()
                                ->preload()
                                ->required(),
                            Select::make('service_type')
                                ->options([
                                    'New Build' => 'New Build',
                                    'Completion Finance' => 'Completion Finance',
                                    'Design & Build' => 'Design & Build',
                                    'Renovation' => 'Renovation',
                                ])
                                ->native(false)
                                ->required(),
                            Select::make('project_origin')
                                ->options([
                                    'New Project' => 'New Project',
                                    'Partially Built' => 'Partially Built',
                                    'Inherited Site' => 'Inherited Site',
                                ])
                                ->native(false)
                                ->required(),
                            TextInput::make('building_type')
                                ->placeholder('Example: 5-Bedroom Duplex')
                                ->required(),
                            Select::make('project_status')
                                ->options([
                                    'Registered' => 'Registered',
                                    'In Progress' => 'In Progress',
                                    'Awaiting Client Decision' => 'Awaiting Client Decision',
                                    'On Hold' => 'On Hold',
                                    'Completed' => 'Completed',
                                ])
                                ->native(false)
                                ->default('Registered')
                                ->required(),
                            Toggle::make('client_portal_visible')
                                ->label('Visible in client portal')
                                ->default(true)
                                ->required(),
                        ]),
                    ]),
                Section::make('Site & Delivery Details')
                    ->schema([
                        Textarea::make('project_address')
                            ->required()
                            ->columnSpanFull(),
                        Grid::make(3)->schema([
                            Select::make('construction_stage')
                                ->options([
                                    'Planning' => 'Planning',
                                    'Foundation' => 'Foundation',
                                    'Blockwork' => 'Blockwork',
                                    'Roofing' => 'Roofing',
                                    'Mechanical & Electrical' => 'Mechanical & Electrical',
                                    'Finishing' => 'Finishing',
                                    'Snagging' => 'Snagging',
                                    'Completed' => 'Completed',
                                ])
                                ->native(false)
                                ->required(),
                            TextInput::make('current_progress_percent')
                                ->label('Current Progress (%)')
                                ->numeric()
                                ->minValue(0)
                                ->maxValue(100)
                                ->default(0)
                                ->required(),
                            TextInput::make('approved_area_sqm')
                                ->label('Approved Area (sqm)')
                                ->numeric(),
                            TextInput::make('number_of_floors')
                                ->numeric(),
                            TextInput::make('number_of_bedrooms')
                                ->numeric(),
                            TextInput::make('cost_per_sqm')
                                ->label('Cost per sqm')
                                ->numeric()
                                ->prefix('NGN'),
                            TextInput::make('estimated_completion_cost')
                                ->label('Estimated Completion Cost')
                                ->numeric()
                                ->prefix('NGN'),
                        ]),
                    ]),
                Section::make('Scope & Client Intent')
                    ->schema([
                        Textarea::make('finishing_works')
                            ->label('Finishing Works / Scope Notes')
                            ->columnSpanFull(),
                        Textarea::make('client_objectives')
                            ->label('Client Objectives')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
