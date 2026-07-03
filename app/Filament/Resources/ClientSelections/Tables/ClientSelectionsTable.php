<?php

namespace App\Filament\Resources\ClientSelections\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
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
                TextColumn::make('client.full_name')
                    ->label('Client')
                    ->searchable(),
                TextColumn::make('category')
                    ->searchable(),
                TextColumn::make('item_name')
                    ->searchable(),
                TextColumn::make('selected_option')
                    ->searchable(),
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
                EditAction::make(),
                Action::make('approveSelection')
                    ->label('Approve')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn ($record): bool => $record->status !== 'approved')
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update(['status' => 'approved'])),
                Action::make('requestRevision')
                    ->label('Request Revision')
                    ->icon('heroicon-o-pencil-square')
                    ->color('warning')
                    ->visible(fn ($record): bool => $record->status !== 'revision_requested')
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update(['status' => 'revision_requested'])),
                Action::make('rejectSelection')
                    ->label('Reject')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(fn ($record): bool => $record->status !== 'rejected')
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update(['status' => 'rejected'])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
