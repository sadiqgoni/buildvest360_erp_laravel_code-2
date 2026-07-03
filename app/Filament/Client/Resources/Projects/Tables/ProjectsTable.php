<?php

namespace App\Filament\Client\Resources\Projects\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('project_id')
                    ->label('Project Ref')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('service_type'),
                TextColumn::make('building_type')
                    ->searchable(),
                TextColumn::make('construction_stage')
                    ->badge(),
                TextColumn::make('current_progress_percent')
                    ->label('Progress')
                    ->suffix('%')
                    ->sortable(),
                TextColumn::make('estimated_completion_cost')
                    ->money('NGN')
                    ->sortable(),
                TextColumn::make('project_status')
                    ->badge(),
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
