<?php

namespace App\Filament\Client\Pages;

use App\Filament\Client\Widgets\ClientProjectHealthChart;
use App\Filament\Client\Widgets\ClientPortalOverview;
use App\Filament\Client\Widgets\MyRecentUpdates;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\Widget;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'My Project Portal';

    protected ?string $heading = 'Client Project Center';

    protected ?string $subheading = 'Monitor your building progress, review decisions, and track your current financing position.';

    protected string | \Filament\Support\Enums\Width | null $maxContentWidth = 'full';

    /**
     * @return array<class-string<Widget>>
     */
    public function getWidgets(): array
    {
        return [
            ClientPortalOverview::class,
            ClientProjectHealthChart::class,
            MyRecentUpdates::class,
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
