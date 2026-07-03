<?php

namespace App\Filament\Client\Widgets;

use App\Models\ClientSelection;
use App\Models\Payment;
use App\Models\Project;
use App\Models\RiskAssessment;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ClientPortalOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $clientId = auth()->user()->client_id;
        $projects = Project::query()->where('client_id', $clientId)->get();
        $projectIds = $projects->pluck('id');
        $paymentsReceived = Payment::query()->whereIn('project_id', $projectIds)->sum('amount_paid');
        $pendingSelections = ClientSelection::query()->where('client_id', $clientId)->where('status', 'pending')->count();
        $latestRisk = RiskAssessment::query()->where('client_id', $clientId)->latest('assessed_at')->first();
        $averageProgress = round((float) $projects->avg('current_progress_percent'));

        return [
            Stat::make('My Projects', (string) $projects->count())
                ->description('Projects currently visible in your portal')
                ->descriptionIcon(Heroicon::OutlinedBuildingOffice2)
                ->color('primary'),
            Stat::make('Average Progress', $averageProgress . '%')
                ->description('Overall build completion across active projects')
                ->descriptionIcon(Heroicon::OutlinedArrowTrendingUp)
                ->chart([10, 20, 35, 45, 60, 72, $averageProgress])
                ->color('success'),
            Stat::make('Payments Recorded', 'NGN ' . number_format((float) $paymentsReceived, 2))
                ->description('Payments already acknowledged by the company')
                ->descriptionIcon(Heroicon::OutlinedCreditCard)
                ->color('warning'),
            Stat::make('Pending Selections', (string) $pendingSelections)
                ->description('Choices still waiting for your or admin decision')
                ->descriptionIcon(Heroicon::OutlinedSwatch)
                ->color('gray'),
            Stat::make('Latest Risk View', $latestRisk?->recommendation ? strtoupper($latestRisk->recommendation) : 'N/A')
                ->description('Most recent contractor finance decision')
                ->descriptionIcon(Heroicon::OutlinedShieldCheck)
                ->color(match ($latestRisk?->recommendation) {
                    'approve' => 'success',
                    'reject' => 'danger',
                    default => 'warning',
                }),
        ];
    }
}
