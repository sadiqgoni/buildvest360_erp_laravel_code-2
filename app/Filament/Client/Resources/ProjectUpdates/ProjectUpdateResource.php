<?php

namespace App\Filament\Client\Resources\ProjectUpdates;

use App\Filament\Client\Resources\ProjectUpdates\Pages\ListProjectUpdates;
use App\Filament\Client\Resources\ProjectUpdates\Pages\ViewProjectUpdate;
use App\Filament\Client\Resources\ProjectUpdates\Schemas\ProjectUpdateInfolist;
use App\Filament\Client\Resources\ProjectUpdates\Tables\ProjectUpdatesTable;
use App\Models\ProjectUpdate;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ProjectUpdateResource extends Resource
{
    protected static ?string $model = ProjectUpdate::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

    protected static ?string $navigationLabel = 'Construction Updates';

    protected static string|\UnitEnum|null $navigationGroup = 'My Workspace';

    protected static ?int $navigationSort = 2;

    public static function infolist(Schema $schema): Schema
    {
        return ProjectUpdateInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProjectUpdatesTable::configure($table);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('client_visible', true)
            ->whereHas('project', fn (Builder $query): Builder => $query->where('client_id', auth()->user()->client_id));
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
            'index' => ListProjectUpdates::route('/'),
            'view' => ViewProjectUpdate::route('/{record}'),
        ];
    }
}
