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
                TextColumn::make('project.project_id')
                    ->label('Project Ref')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('client_total_sqm')
                    ->label('Client Total')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('engineer_total_sqm')
                    ->label('Engineer Total')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('measurement_difference_sqm')
                    ->label('Difference')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('measurement_difference_percent')
                    ->label('Variance %')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('approved_area_sqm')
                    ->label('Approved Area')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('measurement_status')
                    ->badge()
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
