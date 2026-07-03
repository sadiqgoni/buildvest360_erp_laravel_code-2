<?php

namespace App\Filament\Widgets;

use App\Models\Client;
use App\Models\Investment;
use App\Models\LegalDocument;
use App\Models\Payment;
use App\Models\Project;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OperationsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalPayable = (float) Investment::sum('total_amount_payable');
        $totalPaid = (float) Payment::sum('amount_paid');
        $outstanding = $totalPayable - $totalPaid;
        $projectCount = Project::count();
        $activeProjectCount = Project::query()->whereIn('project_status', ['Registered', 'In Progress'])->count();

        return [
            Stat::make('Clients', (string) Client::count())
                ->description('Active relationships in the portfolio')
                ->descriptionIcon(Heroicon::OutlinedUserGroup)
                ->chart([1, 2, 2, 3, 3, 3, 3])
                ->color('primary'),
            Stat::make('Projects', (string) $projectCount)
                ->description("{$activeProjectCount} currently active or newly registered")
                ->descriptionIcon(Heroicon::OutlinedBuildingOffice2)
                ->chart([1, 1, 2, 2, 2, 3, 3])
                ->color('success'),
            Stat::make('Receivables', 'NGN ' . number_format($totalPayable, 2))
                ->description('Expected total repayment value')
                ->descriptionIcon(Heroicon::OutlinedBanknotes)
                ->chart([120, 140, 160, 175, 180, 190, 210])
                ->color('warning'),
            Stat::make('Collections', 'NGN ' . number_format($totalPaid, 2))
                ->description('Payments already received')
                ->descriptionIcon(Heroicon::OutlinedCreditCard)
                ->chart([10, 12, 15, 18, 22, 25, 30])
                ->color('success'),
            Stat::make('Outstanding', 'NGN ' . number_format($outstanding, 2))
                ->description('Amount still due from financed projects')
                ->descriptionIcon(Heroicon::OutlinedArrowTrendingUp)
                ->chart([210, 200, 198, 195, 190, 188, 180])
                ->color('danger'),
            Stat::make('Pending Legal', (string) LegalDocument::query()->whereNotIn('legal_status', ['Approved', 'Executed'])->count())
                ->description('Items waiting for legal closure')
                ->descriptionIcon(Heroicon::OutlinedDocumentText)
                ->chart([3, 3, 2, 2, 2, 1, 1])
                ->color('gray'),
        ];
    }
}
