<?php

namespace App\Filament\Resources\ProjectUpdates\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
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
                TextColumn::make('project.client.full_name')
                    ->label('Client')
                    ->searchable(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('stage')
                    ->badge(),
                TextColumn::make('progress_percent')
                    ->label('Progress')
                    ->suffix('%')
                    ->sortable(),
                TextColumn::make('update_date')
                    ->date()
                    ->sortable(),
                IconColumn::make('client_visible')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                Action::make('publishToClient')
                    ->label('Publish')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->visible(fn ($record): bool => ! $record->client_visible)
                    ->action(fn ($record) => $record->update(['client_visible' => true])),
                Action::make('hideFromClient')
                    ->label('Hide')
                    ->icon('heroicon-o-eye-slash')
                    ->color('gray')
                    ->visible(fn ($record): bool => $record->client_visible)
                    ->action(fn ($record) => $record->update(['client_visible' => false])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
