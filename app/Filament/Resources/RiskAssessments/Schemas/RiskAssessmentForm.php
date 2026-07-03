<?php

namespace App\Filament\Resources\RiskAssessments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class RiskAssessmentForm
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
                TextInput::make('affordability_score')
                    ->suffix('/100')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('project_readiness_score')
                    ->suffix('/100')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('equity_commitment_score')
                    ->suffix('/100')
                    ->required()
                    ->numeric()
                    ->default(0),
                Select::make('risk_level')
                    ->options([
                        'low' => 'Low',
                        'medium' => 'Medium',
                        'high' => 'High',
                    ])
                    ->default('medium')
                    ->native(false)
                    ->required(),
                Select::make('recommendation')
                    ->options([
                        'approve' => 'Approve',
                        'review' => 'Review',
                        'reject' => 'Reject',
                    ])
                    ->default('review')
                    ->native(false)
                    ->required(),
                Textarea::make('rationale')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('assessed_at')
                    ->required(),
                Toggle::make('client_visible')
                    ->label('Show in client portal')
                    ->default(true)
                    ->required(),
            ]);
    }
}
