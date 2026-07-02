<?php

namespace App\Filament\Resources\Projects\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
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
                    ->searchable(),
                TextColumn::make('client_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('building_type')
                    ->searchable(),
                TextColumn::make('construction_stage')
                    ->searchable(),
                TextColumn::make('number_of_floors')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('number_of_bedrooms')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('approved_area_sqm')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('cost_per_sqm')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('estimated_completion_cost')
                    ->money()
                    ->sortable(),
                TextColumn::make('project_status')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
