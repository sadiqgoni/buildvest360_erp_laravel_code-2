<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\OperationsOverview;
use App\Filament\Widgets\FinanceTrendChart;
use App\Filament\Widgets\ProjectStatusChart;
use App\Filament\Widgets\RecentProjects;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\Widget;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'Operations Dashboard';

    protected ?string $heading = 'Project Operations Command Center';

    protected ?string $subheading = 'Track project delivery, finance exposure, procurement flow, and portfolio performance at a glance.';

    protected string | \Filament\Support\Enums\Width | null $maxContentWidth = 'full';

    /**
     * @return array<class-string<Widget>>
     */
    public function getWidgets(): array
    {
        return [
            OperationsOverview::class,
            FinanceTrendChart::class,
            ProjectStatusChart::class,
            RecentProjects::class,
        ];
    }

    public function getColumns(): int | array
    {
        return [
            'md' => 12,
            'xl' => 12,
        ];
    }
}
