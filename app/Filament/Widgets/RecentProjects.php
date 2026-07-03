<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentProjects extends TableWidget
{
    protected static ?string $heading = 'Recent Project Activity';

    protected static ?int $sort = 4;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Project::query()->with('client')->latest())
            ->columns([
                TextColumn::make('project_id')
                    ->label('Project Ref')
                    ->searchable(),
                TextColumn::make('client.full_name')
                    ->label('Client')
                    ->searchable(),
                TextColumn::make('building_type'),
                TextColumn::make('estimated_completion_cost')
                    ->label('Project Value')
                    ->money('NGN')
                    ->sortable(),
                TextColumn::make('project_status')
                    ->badge(),
                TextColumn::make('created_at')
                    ->since(),
            ])
            ->recordActions([
                ViewAction::make()
                    ->url(fn (Project $record): string => route('filament.admin.resources.projects.view', $record)),
            ]);
    }
}
