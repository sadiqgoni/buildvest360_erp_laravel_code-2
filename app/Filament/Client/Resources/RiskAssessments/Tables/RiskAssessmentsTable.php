<?php

namespace App\Filament\Client\Resources\RiskAssessments\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RiskAssessmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('project.project_id')
                    ->label('Project Ref')
                    ->sortable(),
                TextColumn::make('risk_level')
                    ->badge(),
                TextColumn::make('recommendation')
                    ->badge(),
                TextColumn::make('assessed_at')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
