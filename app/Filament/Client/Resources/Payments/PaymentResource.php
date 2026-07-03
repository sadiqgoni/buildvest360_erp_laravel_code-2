<?php

namespace App\Filament\Client\Resources\Payments;

use App\Filament\Client\Resources\Payments\Pages\ListPayments;
use App\Filament\Client\Resources\Payments\Pages\ViewPayment;
use App\Filament\Client\Resources\Payments\Schemas\PaymentInfolist;
use App\Filament\Client\Resources\Payments\Tables\PaymentsTable;
use App\Models\Payment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCreditCard;

    protected static ?string $navigationLabel = 'Payments Made';

    protected static string|\UnitEnum|null $navigationGroup = 'Finance & Approvals';

    protected static ?int $navigationSort = 1;

    public static function infolist(Schema $schema): Schema
    {
        return PaymentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PaymentsTable::configure($table);
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
            'index' => ListPayments::route('/'),
            'view' => ViewPayment::route('/{record}'),
        ];
    }
}
