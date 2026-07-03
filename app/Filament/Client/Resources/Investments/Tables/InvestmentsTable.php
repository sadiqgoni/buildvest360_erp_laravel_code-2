<?php

namespace App\Filament\Client\Resources\Investments\Tables;

use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InvestmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('project.project_id')
                    ->label('Project Ref')
                    ->sortable(),
                TextColumn::make('financing_mode'),
                TextColumn::make('client_initial_contribution')
                    ->money('NGN')
                    ->sortable(),
                TextColumn::make('total_amount_payable')
                    ->money('NGN')
                    ->sortable(),
                TextColumn::make('monthly_contribution')
                    ->money('NGN')
                    ->sortable(),
                TextColumn::make('payment_plan_status')
                    ->badge(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()
                    ->label('Update Preference')
                    ->visible(fn ($record): bool => in_array($record->payment_plan_status, ['proposed', 'countered'], true)),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
