<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = ['project_id','estimated_cost','client_initial_contribution','contractor_investment','client_proposed_profit_margin','client_profit_reason','admin_approved_profit_margin','admin_profit_note','profit_margin_status','profit_amount','total_amount_payable','repayment_duration_months','monthly_contribution','payment_day','payment_method'];

    protected static function booted(): void
    {
        static::saving(function (Investment $investment): void {
            $margin = $investment->admin_approved_profit_margin ?? $investment->client_proposed_profit_margin ?? 0;
            $contractorInvestment = (float) $investment->contractor_investment;
            $profitAmount = $contractorInvestment * ((float) $margin / 100);
            $totalAmountPayable = $contractorInvestment + $profitAmount;
            $repaymentDuration = max((int) $investment->repayment_duration_months, 1);

            $investment->profit_margin_status = $investment->profit_margin_status ?: 'pending';
            $investment->profit_amount = $profitAmount;
            $investment->total_amount_payable = $totalAmountPayable;
            $investment->monthly_contribution = $totalAmountPayable / $repaymentDuration;
        });
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
