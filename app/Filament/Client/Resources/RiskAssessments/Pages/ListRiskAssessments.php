<?php

namespace App\Filament\Client\Resources\RiskAssessments\Pages;

use App\Filament\Client\Resources\RiskAssessments\RiskAssessmentResource;
use Filament\Resources\Pages\ListRecords;

class ListRiskAssessments extends ListRecords
{
    protected static string $resource = RiskAssessmentResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
