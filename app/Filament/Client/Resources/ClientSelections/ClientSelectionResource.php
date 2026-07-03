<?php

namespace App\Filament\Client\Resources\ClientSelections;

use App\Filament\Client\Resources\ClientSelections\Pages\CreateClientSelection;
use App\Filament\Client\Resources\ClientSelections\Pages\EditClientSelection;
use App\Filament\Client\Resources\ClientSelections\Pages\ListClientSelections;
use App\Filament\Client\Resources\ClientSelections\Pages\ViewClientSelection;
use App\Filament\Client\Resources\ClientSelections\Schemas\ClientSelectionForm;
use App\Filament\Client\Resources\ClientSelections\Schemas\ClientSelectionInfolist;
use App\Filament\Client\Resources\ClientSelections\Tables\ClientSelectionsTable;
use App\Models\ClientSelection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ClientSelectionResource extends Resource
{
    protected static ?string $model = ClientSelection::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSwatch;

    protected static ?string $navigationLabel = 'Finish Choices';

    protected static string|\UnitEnum|null $navigationGroup = 'My Workspace';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return ClientSelectionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ClientSelectionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClientSelectionsTable::configure($table);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('client_id', auth()->user()->client_id);
    }

    public static function canCreate(): bool
    {
        return true;
    }

    public static function canEdit($record): bool
    {
        return in_array($record->status, ['pending', 'revision_requested'], true);
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
            'index' => ListClientSelections::route('/'),
            'create' => CreateClientSelection::route('/create'),
            'view' => ViewClientSelection::route('/{record}'),
            'edit' => EditClientSelection::route('/{record}/edit'),
        ];
    }
}
