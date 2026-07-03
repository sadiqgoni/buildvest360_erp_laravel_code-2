<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class ProjectStatusChart extends ApexChartWidget
{
    protected static ?string $chartId = 'projectStatusChart';

    protected static ?string $heading = 'Project Pipeline Mix';

    protected static ?string $subheading = 'Current portfolio spread by delivery stage.';

    protected int | string | array $columnSpan = [
        'md' => 4,
        'xl' => 4,
    ];

    protected static ?int $sort = 3;

    protected static ?int $contentHeight = 340;

    protected function getOptions(): array
    {
        $statuses = Project::query()
            ->selectRaw('project_status, COUNT(*) as aggregate')
            ->groupBy('project_status')
            ->orderBy('project_status')
            ->get();

        return [
            'chart' => [
                'type' => 'donut',
                'height' => 340,
                'fontFamily' => 'inherit',
            ],
            'series' => $statuses->pluck('aggregate')->map(fn ($value) => (int) $value)->all(),
            'labels' => $statuses->pluck('project_status')->all(),
            'colors' => ['#0f766e', '#1d4ed8', '#f59e0b', '#dc2626', '#7c3aed'],
            'legend' => [
                'position' => 'bottom',
                'labels' => [
                    'colors' => '#334155',
                ],
            ],
            'stroke' => [
                'colors' => ['#ffffff'],
            ],
            'plotOptions' => [
                'pie' => [
                    'donut' => [
                        'size' => '68%',
                    ],
                ],
            ],
            'dataLabels' => [
                'enabled' => false,
            ],
        ];
    }
}
