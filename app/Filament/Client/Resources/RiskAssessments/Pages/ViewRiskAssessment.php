<?php

namespace App\Filament\Client\Resources\RiskAssessments\Pages;

use App\Filament\Client\Resources\RiskAssessments\RiskAssessmentResource;
use Filament\Resources\Pages\ViewRecord;

class ViewRiskAssessment extends ViewRecord
{
    protected static string $resource = RiskAssessmentResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
