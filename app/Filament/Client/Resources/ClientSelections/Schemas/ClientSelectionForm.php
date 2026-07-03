<?php

namespace App\Filament\Client\Resources\ClientSelections\Schemas;

use App\Models\Project;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ClientSelectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('client_id')
                    ->default(fn (): ?int => auth()->user()?->client_id),
                Hidden::make('status')
                    ->default('pending'),
                Select::make('project_id')
                    ->label('Project')
                    ->options(fn () => Project::query()
                        ->where('client_id', auth()->user()->client_id)
                        ->where('client_portal_visible', true)
                        ->pluck('project_id', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('category')
                    ->options([
                        'Floor Finishes' => 'Floor Finishes',
                        'Kitchen' => 'Kitchen',
                        'Electrical Fittings' => 'Electrical Fittings',
                        'Sanitary Wares' => 'Sanitary Wares',
                        'Windows & Doors' => 'Windows & Doors',
                        'External Works' => 'External Works',
                    ])
                    ->native(false)
                    ->required(),
                TextInput::make('item_name')
                    ->label('Item / Area')
                    ->required(),
                TextInput::make('selected_option')
                    ->label('Selected Option')
                    ->placeholder('Example: Spanish tiles, matte black fittings'),
                TextInput::make('budget_amount')
                    ->label('Preferred Budget')
                    ->prefix('NGN')
                    ->numeric(),
                DatePicker::make('decision_deadline')
                    ->label('Needed By'),
                Textarea::make('client_notes')
                    ->label('My Notes')
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }
}
