<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class FinanceTrendChart extends ApexChartWidget
{
    protected static ?string $chartId = 'financeTrendChart';

    protected static ?string $heading = 'Finance Exposure by Project';

    protected static ?string $subheading = 'Compare project value, contractor capital, and collections received.';

    protected int | string | array $columnSpan = [
        'md' => 8,
        'xl' => 8,
    ];

    protected static ?int $sort = 2;

    protected static ?int $contentHeight = 340;

    protected function getOptions(): array
    {
        $projects = Project::query()
            ->with(['investment', 'payments'])
            ->orderByDesc('estimated_completion_cost')
            ->take(5)
            ->get();

        $labels = $projects->map(fn (Project $project) => $project->project_id)->all();
        $projectValues = $projects->map(fn (Project $project) => (float) $project->estimated_completion_cost)->all();
        $contractorExposure = $projects->map(fn (Project $project) => (float) optional($project->investment)->contractor_investment)->all();
        $collections = $projects->map(fn (Project $project) => (float) $project->payments->sum('amount_paid'))->all();

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 340,
                'stacked' => false,
                'toolbar' => [
                    'show' => false,
                ],
                'fontFamily' => 'inherit',
            ],
            'series' => [
                [
                    'name' => 'Project Value',
                    'data' => $projectValues,
                ],
                [
                    'name' => 'Contractor Exposure',
                    'data' => $contractorExposure,
                ],
                [
                    'name' => 'Collections',
                    'data' => $collections,
                ],
            ],
            'xaxis' => [
                'categories' => $labels,
                'labels' => [
                    'style' => [
                        'colors' => '#475569',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'colors' => '#475569',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'grid' => [
                'borderColor' => '#dbe4ea',
                'strokeDashArray' => 5,
            ],
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 6,
                    'columnWidth' => '48%',
                ],
            ],
            'dataLabels' => [
                'enabled' => false,
            ],
            'stroke' => [
                'show' => true,
                'width' => 0,
            ],
            'legend' => [
                'position' => 'top',
                'horizontalAlign' => 'left',
                'labels' => [
                    'colors' => '#334155',
                ],
            ],
            'colors' => ['#0f766e', '#f59e0b', '#1d4ed8'],
        ];
    }
}
