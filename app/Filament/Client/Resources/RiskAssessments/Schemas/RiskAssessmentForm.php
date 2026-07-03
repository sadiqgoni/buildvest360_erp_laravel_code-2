<?php

namespace App\Filament\Client\Resources\RiskAssessments\Schemas;

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
                TextInput::make('project_id')
                    ->required()
                    ->numeric(),
                TextInput::make('client_id')
                    ->required()
                    ->numeric(),
                TextInput::make('affordability_score')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('project_readiness_score')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('equity_commitment_score')
                    ->required()
                    ->numeric()
                    ->default(0),
                Select::make('risk_level')
                    ->options(['low' => 'Low', 'medium' => 'Medium', 'high' => 'High'])
                    ->default('medium')
                    ->required(),
                Select::make('recommendation')
                    ->options(['approve' => 'Approve', 'review' => 'Review', 'reject' => 'Reject'])
                    ->default('review')
                    ->required(),
                Textarea::make('rationale')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('assessed_at')
                    ->required(),
                Toggle::make('client_visible')
                    ->required(),
            ]);
    }
}
