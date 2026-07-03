<?php

namespace App\Filament\Resources\RiskAssessments\Pages;

use App\Filament\Resources\RiskAssessments\RiskAssessmentResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRiskAssessment extends EditRecord
{
    protected static string $resource = RiskAssessmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
