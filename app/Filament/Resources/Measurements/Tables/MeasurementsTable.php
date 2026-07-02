<?php

namespace App\Filament\Resources\Measurements\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MeasurementsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('project_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('client_ground_floor_sqm')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('client_first_floor_sqm')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('client_other_floor_sqm')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('client_total_sqm')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('engineer_ground_floor_sqm')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('engineer_first_floor_sqm')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('engineer_other_floor_sqm')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('engineer_total_sqm')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('measurement_difference_sqm')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('measurement_difference_percent')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('approved_area_sqm')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('measurement_status')
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
