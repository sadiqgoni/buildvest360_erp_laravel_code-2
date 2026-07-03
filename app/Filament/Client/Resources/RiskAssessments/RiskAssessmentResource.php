<?php

namespace App\Filament\Client\Resources\RiskAssessments;

use App\Filament\Client\Resources\RiskAssessments\Pages\ListRiskAssessments;
use App\Filament\Client\Resources\RiskAssessments\Pages\ViewRiskAssessment;
use App\Filament\Client\Resources\RiskAssessments\Schemas\RiskAssessmentInfolist;
use App\Filament\Client\Resources\RiskAssessments\Tables\RiskAssessmentsTable;
use App\Models\RiskAssessment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class RiskAssessmentResource extends Resource
{
    protected static ?string $model = RiskAssessment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShieldCheck;

    protected static ?string $navigationLabel = 'Risk Decisions';

    protected static string|\UnitEnum|null $navigationGroup = 'Finance & Approvals';

    protected static ?int $navigationSort = 2;

    public static function infolist(Schema $schema): Schema
    {
        return RiskAssessmentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RiskAssessmentsTable::configure($table);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('client_id', auth()->user()->client_id)
            ->where('client_visible', true);
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
            'index' => ListRiskAssessments::route('/'),
            'view' => ViewRiskAssessment::route('/{record}'),
        ];
    }
}
