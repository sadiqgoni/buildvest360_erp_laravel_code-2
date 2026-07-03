<?php

namespace App\Filament\Resources\RiskAssessments\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RiskAssessmentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('project.project_id')
                    ->label('Project Ref'),
                TextEntry::make('client.full_name')
                    ->label('Client'),
                TextEntry::make('affordability_score')
                    ->suffix('/100'),
                TextEntry::make('project_readiness_score')
                    ->suffix('/100'),
                TextEntry::make('equity_commitment_score')
                    ->suffix('/100'),
                TextEntry::make('risk_level')
                    ->badge(),
                TextEntry::make('recommendation')
                    ->badge(),
                TextEntry::make('rationale')
                    ->columnSpanFull(),
                TextEntry::make('assessed_at')
                    ->date(),
                IconEntry::make('client_visible')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
