<?php

namespace App\Filament\Client\Resources\ProjectUpdates\Schemas;

use Filament\Forms\Components\DatePicker;
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
                TextInput::make('project_id')
                    ->required()
                    ->numeric(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('stage')
                    ->default(null),
                TextInput::make('progress_percent')
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
                    ->required(),
            ]);
    }
}
