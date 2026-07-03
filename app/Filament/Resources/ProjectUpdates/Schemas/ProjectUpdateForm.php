<?php

namespace App\Filament\Resources\ProjectUpdates\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProjectUpdateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('project_id')
                    ->relationship('project', 'project_id')
                    ->label('Project')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('title')
                    ->required(),
                Select::make('stage')
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
                    ->native(false),
                TextInput::make('progress_percent')
                    ->label('Progress (%)')
                    ->required()
                    ->numeric()
                    ->default(0),
                DatePicker::make('update_date')
                    ->required(),
                Textarea::make('summary')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('next_steps')
                    ->default(null)
                    ->columnSpanFull(),
                Toggle::make('client_visible')
                    ->label('Show in client portal')
                    ->default(true)
                    ->required(),
            ]);
    }
}
