<?php

namespace App\Filament\Client\Resources\Projects;

use App\Filament\Client\Resources\Projects\Pages\ListProjects;
use App\Filament\Client\Resources\Projects\Pages\ViewProject;
use App\Filament\Client\Resources\Projects\Schemas\ProjectInfolist;
use App\Filament\Client\Resources\Projects\Tables\ProjectsTable;
use App\Models\Project;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?string $navigationLabel = 'My Projects';

    protected static string|\UnitEnum|null $navigationGroup = 'My Workspace';

    protected static ?int $navigationSort = 1;

    public static function infolist(Schema $schema): Schema
    {
        return ProjectInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProjectsTable::configure($table);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('client_id', auth()->user()->client_id)
            ->where('client_portal_visible', true);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProjects::route('/'),
            'view' => ViewProject::route('/{record}'),
        ];
    }
}
