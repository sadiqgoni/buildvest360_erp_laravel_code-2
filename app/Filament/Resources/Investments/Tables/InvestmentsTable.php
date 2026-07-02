<?php

namespace App\Filament\Resources\Investments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
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
                TextColumn::make('project_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('estimated_cost')
                    ->money()
                    ->sortable(),
                TextColumn::make('client_initial_contribution')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('contractor_investment')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('client_proposed_profit_margin')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('admin_approved_profit_margin')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('profit_margin_status')
                    ->badge(),
                TextColumn::make('profit_amount')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('total_amount_payable')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('repayment_duration_months')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('monthly_contribution')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('payment_day')
                    ->searchable(),
                TextColumn::make('payment_method')
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
