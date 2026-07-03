<?php

namespace App\Filament\Resources\ClientSelections\Schemas;

use Filament\Forms\Components\DatePicker;
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
                Select::make('project_id')
                    ->relationship('project', 'project_id')
                    ->label('Project')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('client_id')
                    ->relationship('client', 'full_name')
                    ->label('Client')
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
                    ->required(),
                TextInput::make('selected_option')
                    ->default(null),
                TextInput::make('budget_amount')
                    ->prefix('NGN')
                    ->numeric()
                    ->default(null),
                DatePicker::make('decision_deadline'),
                Textarea::make('client_notes')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('admin_notes')
                    ->default(null)
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                        'revision_requested' => 'Revision requested',
                    ])
                    ->default('pending')
                    ->required(),
            ]);
    }
}
