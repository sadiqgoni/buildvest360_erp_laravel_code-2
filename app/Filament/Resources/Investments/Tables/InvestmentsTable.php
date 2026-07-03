<?php

namespace App\Filament\Resources\Investments\Tables;

use Filament\Actions\Action;
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
                TextColumn::make('project.project_id')
                    ->label('Project Ref')
                    ->sortable(),
                TextColumn::make('project.client.full_name')
                    ->label('Client')
                    ->searchable(),
                TextColumn::make('estimated_cost')
                    ->money('NGN')
                    ->sortable(),
                TextColumn::make('client_initial_contribution')
                    ->money('NGN')
                    ->sortable(),
                TextColumn::make('contractor_investment')
                    ->money('NGN')
                    ->sortable(),
                TextColumn::make('financing_mode')
                    ->searchable(),
                TextColumn::make('profit_margin_status')
                    ->badge(),
                TextColumn::make('total_amount_payable')
                    ->money('NGN')
                    ->sortable(),
                TextColumn::make('monthly_contribution')
                    ->money('NGN')
                    ->sortable(),
                TextColumn::make('payment_plan_status')
                    ->badge(),
                TextColumn::make('created_at')
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
                Action::make('approvePlan')
                    ->label('Approve')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn ($record): bool => in_array($record->payment_plan_status, ['proposed', 'countered'], true))
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update([
                        'payment_plan_status' => 'approved',
                        'profit_margin_status' => 'approved',
                    ])),
                Action::make('counterPlan')
                    ->label('Counter')
                    ->icon('heroicon-o-arrow-path')
                    ->color('warning')
                    ->visible(fn ($record): bool => in_array($record->payment_plan_status, ['proposed', 'approved'], true))
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update([
                        'payment_plan_status' => 'countered',
                        'profit_margin_status' => 'countered',
                    ])),
                Action::make('rejectPlan')
                    ->label('Reject')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(fn ($record): bool => $record->payment_plan_status !== 'rejected')
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update([
                        'payment_plan_status' => 'rejected',
                        'profit_margin_status' => 'rejected',
                    ])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
