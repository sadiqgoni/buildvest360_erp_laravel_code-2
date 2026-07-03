<?php

namespace App\Filament\Resources\ProcurementItems;

use App\Filament\Resources\ProcurementItems\Pages\CreateProcurementItem;
use App\Filament\Resources\ProcurementItems\Pages\EditProcurementItem;
use App\Filament\Resources\ProcurementItems\Pages\ListProcurementItems;
use App\Filament\Resources\ProcurementItems\Pages\ViewProcurementItem;
use App\Filament\Resources\ProcurementItems\Schemas\ProcurementItemForm;
use App\Filament\Resources\ProcurementItems\Schemas\ProcurementItemInfolist;
use App\Filament\Resources\ProcurementItems\Tables\ProcurementItemsTable;
use App\Models\ProcurementItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProcurementItemResource extends Resource
{
    protected static ?string $model = ProcurementItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShoppingCart;

    protected static ?string $navigationLabel = 'Procurement Items';

    protected static string|\UnitEnum|null $navigationGroup = 'Procurement';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return ProcurementItemForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProcurementItemInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProcurementItemsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProcurementItems::route('/'),
            'create' => CreateProcurementItem::route('/create'),
            'view' => ViewProcurementItem::route('/{record}'),
            'edit' => EditProcurementItem::route('/{record}/edit'),
        ];
    }
}
