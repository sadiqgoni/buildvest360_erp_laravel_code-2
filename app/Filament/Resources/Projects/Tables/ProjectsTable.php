<?php

namespace App\Filament\Resources\Projects\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('project_id')
                    ->label('Project Ref')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('client.full_name')
                    ->label('Client')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('client.state')
                    ->label('State')
                    ->badge(),
                TextColumn::make('service_type')
                    ->searchable(),
                TextColumn::make('building_type')
                    ->searchable(),
                TextColumn::make('construction_stage')
                    ->badge(),
                TextColumn::make('current_progress_percent')
                    ->label('Progress')
                    ->suffix('%')
                    ->sortable(),
                TextColumn::make('estimated_completion_cost')
                    ->money('NGN')
                    ->sortable(),
                TextColumn::make('project_status')
                    ->badge(),
                IconColumn::make('client_portal_visible')
                    ->label('Portal')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('project_status')
                    ->options([
                        'Registered' => 'Registered',
                        'In Progress' => 'In Progress',
                        'Awaiting Client Decision' => 'Awaiting Client Decision',
                        'On Hold' => 'On Hold',
                        'Completed' => 'Completed',
                    ]),
                SelectFilter::make('service_type')
                    ->options([
                        'New Build' => 'New Build',
                        'Completion Finance' => 'Completion Finance',
                        'Design & Build' => 'Design & Build',
                        'Renovation' => 'Renovation',
                    ]),
                SelectFilter::make('project_origin')
                    ->options([
                        'New Project' => 'New Project',
                        'Partially Built' => 'Partially Built',
                        'Inherited Site' => 'Inherited Site',
                    ]),
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
