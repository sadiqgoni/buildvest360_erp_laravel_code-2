<?php

namespace App\Filament\Client\Resources\Investments;

use App\Filament\Client\Resources\Investments\Pages\EditInvestment;
use App\Filament\Client\Resources\Investments\Pages\ListInvestments;
use App\Filament\Client\Resources\Investments\Pages\ViewInvestment;
use App\Filament\Client\Resources\Investments\Schemas\InvestmentForm;
use App\Filament\Client\Resources\Investments\Schemas\InvestmentInfolist;
use App\Filament\Client\Resources\Investments\Tables\InvestmentsTable;
use App\Models\Investment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class InvestmentResource extends Resource
{
    protected static ?string $model = Investment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    protected static ?string $navigationLabel = 'Finance Preferences';

    protected static string|\UnitEnum|null $navigationGroup = 'Finance & Approvals';

    protected static ?int $navigationSort = 3;

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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereHas('project', fn (Builder $query): Builder => $query->where('client_id', auth()->user()->client_id));
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return in_array($record->payment_plan_status, ['proposed', 'countered'], true);
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
            'index' => ListInvestments::route('/'),
            'view' => ViewInvestment::route('/{record}'),
            'edit' => EditInvestment::route('/{record}/edit'),
        ];
    }
}
