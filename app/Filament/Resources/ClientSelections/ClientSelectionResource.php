<?php

namespace App\Filament\Resources\ClientSelections;

use App\Filament\Resources\ClientSelections\Pages\CreateClientSelection;
use App\Filament\Resources\ClientSelections\Pages\EditClientSelection;
use App\Filament\Resources\ClientSelections\Pages\ListClientSelections;
use App\Filament\Resources\ClientSelections\Pages\ViewClientSelection;
use App\Filament\Resources\ClientSelections\Schemas\ClientSelectionForm;
use App\Filament\Resources\ClientSelections\Schemas\ClientSelectionInfolist;
use App\Filament\Resources\ClientSelections\Tables\ClientSelectionsTable;
use App\Models\ClientSelection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ClientSelectionResource extends Resource
{
    protected static ?string $model = ClientSelection::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSwatch;

    protected static ?string $navigationLabel = 'Client Selections';

    protected static string|\UnitEnum|null $navigationGroup = 'Project Delivery';

    protected static ?int $navigationSort = 4;

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

    public static function getRelations(): array
    {
        return [
            //
        ];
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
