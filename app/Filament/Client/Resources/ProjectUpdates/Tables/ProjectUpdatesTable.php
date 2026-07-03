<?php

namespace App\Filament\Client\Resources\ProjectUpdates\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProjectUpdatesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('project.project_id')
                    ->label('Project Ref')
                    ->sortable(),
                TextColumn::make('title')
                    ->searchable()
                    ->wrap(),
                TextColumn::make('stage')
                    ->badge(),
                TextColumn::make('progress_percent')
                    ->label('Progress')
                    ->suffix('%')
                    ->sortable(),
                TextColumn::make('update_date')
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
