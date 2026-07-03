<?php

namespace App\Filament\Resources\RiskAssessments\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RiskAssessmentsTable
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
                TextColumn::make('affordability_score')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('project_readiness_score')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('equity_commitment_score')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('risk_level')
                    ->badge(),
                TextColumn::make('recommendation')
                    ->badge(),
                TextColumn::make('assessed_at')
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
                Action::make('approveRisk')
                    ->label('Approve')
                    ->icon('heroicon-o-check-badge')
                    ->color('success')
                    ->visible(fn ($record): bool => $record->recommendation !== 'approve')
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update([
                        'recommendation' => 'approve',
                        'risk_level' => 'low',
                    ])),
                Action::make('sendToReview')
                    ->label('Review')
                    ->icon('heroicon-o-exclamation-circle')
                    ->color('warning')
                    ->visible(fn ($record): bool => $record->recommendation !== 'review')
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update([
                        'recommendation' => 'review',
                        'risk_level' => 'medium',
                    ])),
                Action::make('rejectRisk')
                    ->label('Reject')
                    ->icon('heroicon-o-no-symbol')
                    ->color('danger')
                    ->visible(fn ($record): bool => $record->recommendation !== 'reject')
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update([
                        'recommendation' => 'reject',
                        'risk_level' => 'high',
                    ])),
                Action::make('toggleClientView')
                    ->label(fn ($record): string => $record->client_visible ? 'Hide' : 'Show')
                    ->icon(fn ($record): string => $record->client_visible ? 'heroicon-o-eye-slash' : 'heroicon-o-eye')
                    ->color('info')
                    ->action(fn ($record) => $record->update([
                        'client_visible' => ! $record->client_visible,
                    ])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
