<?php

namespace App\Filament\Resources\Investments;

use App\Filament\Resources\Investments\Pages\CreateInvestment;
use App\Filament\Resources\Investments\Pages\EditInvestment;
use App\Filament\Resources\Investments\Pages\ListInvestments;
use App\Filament\Resources\Investments\Pages\ViewInvestment;
use App\Filament\Resources\Investments\Schemas\InvestmentForm;
use App\Filament\Resources\Investments\Schemas\InvestmentInfolist;
use App\Filament\Resources\Investments\Tables\InvestmentsTable;
use App\Models\Investment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class InvestmentResource extends Resource
{
    protected static ?string $model = Investment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    protected static ?string $navigationLabel = 'Investments';

    protected static string|\UnitEnum|null $navigationGroup = 'Finance & Contracts';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return InvestmentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return InvestmentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InvestmentsTable::configure($table);
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
            'index' => ListInvestments::route('/'),
            'create' => CreateInvestment::route('/create'),
            'view' => ViewInvestment::route('/{record}'),
            'edit' => EditInvestment::route('/{record}/edit'),
        ];
    }
}
