<?php

namespace App\Filament\Client\Widgets;

use App\Models\ProjectUpdate;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class MyRecentUpdates extends TableWidget
{
    protected static ?string $heading = 'Latest Construction Updates';

    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = [
        'md' => 12,
        'xl' => 12,
    ];

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => ProjectUpdate::query()
                ->where('client_visible', true)
                ->whereHas('project', fn (Builder $query): Builder => $query->where('client_id', auth()->user()->client_id))
                ->latest('update_date'))
            ->columns([
                TextColumn::make('project.project_id')
                    ->label('Project')
                    ->searchable(),
                TextColumn::make('title')
                    ->searchable()
                    ->wrap(),
                TextColumn::make('progress_percent')
                    ->label('Progress')
                    ->suffix('%'),
                TextColumn::make('update_date')
                    ->date(),
            ])
            ->recordActions([
                ViewAction::make()
                    ->url(fn (ProjectUpdate $record): string => route('filament.client.resources.project-updates.view', $record)),
            ]);
    }
}
