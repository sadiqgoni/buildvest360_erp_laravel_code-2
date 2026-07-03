<?php

namespace App\Filament\Client\Resources\ClientSelections\Tables;

use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ClientSelectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('project.project_id')
                    ->label('Project Ref')
                    ->sortable(),
                TextColumn::make('category')
                    ->searchable(),
                TextColumn::make('item_name')
                    ->searchable(),
                TextColumn::make('selected_option')
                    ->searchable()
                    ->wrap(),
                TextColumn::make('budget_amount')
                    ->money('NGN')
                    ->sortable(),
                TextColumn::make('decision_deadline')
                    ->date()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()
                    ->label('Revise')
                    ->visible(fn ($record): bool => in_array($record->status, ['pending', 'revision_requested'], true)),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
