<?php

namespace App\Filament\Client\Widgets;

use App\Models\Project;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class ClientProjectHealthChart extends ApexChartWidget
{
    protected static ?string $chartId = 'clientProjectHealthChart';

    protected static ?string $heading = 'Project Progress Snapshot';

    protected static ?string $subheading = 'See how far each visible project has moved and the current delivery stage.';

    protected int | string | array $columnSpan = [
        'md' => 12,
        'xl' => 12,
    ];

    protected static ?int $sort = 2;

    protected static ?int $contentHeight = 330;

    protected function getOptions(): array
    {
        $projects = Project::query()
            ->where('client_id', auth()->user()->client_id)
            ->where('client_portal_visible', true)
            ->orderByDesc('current_progress_percent')
            ->get();

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 330,
                'toolbar' => ['show' => false],
                'fontFamily' => 'inherit',
            ],
            'series' => [
                [
                    'name' => 'Progress %',
                    'data' => $projects->pluck('current_progress_percent')->map(fn ($value) => (int) $value)->all(),
                ],
            ],
            'xaxis' => [
                'categories' => $projects->pluck('project_id')->all(),
                'labels' => [
                    'style' => [
                        'colors' => '#475569',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'yaxis' => [
                'max' => 100,
                'labels' => [
                    'style' => [
                        'colors' => '#475569',
                    ],
                ],
            ],
            'plotOptions' => [
                'bar' => [
                    'horizontal' => true,
                    'borderRadius' => 8,
                ],
            ],
            'dataLabels' => [
                'enabled' => true,
            ],
            'colors' => ['#0f766e'],
            'grid' => [
                'borderColor' => '#dbe4ea',
                'strokeDashArray' => 4,
            ],
        ];
    }
}
