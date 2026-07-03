<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->unique()->constrained()->cascadeOnDelete();
            $table->decimal('estimated_cost', 15, 2);
            $table->decimal('client_initial_contribution', 15, 2);
            $table->decimal('contractor_investment', 15, 2);
            $table->decimal('client_proposed_profit_margin', 5, 2)->nullable();
            $table->text('client_profit_reason')->nullable();
            $table->decimal('admin_approved_profit_margin', 5, 2)->nullable();
            $table->text('admin_profit_note')->nullable();
            $table->enum('profit_margin_status', ['pending', 'approved', 'countered', 'rejected'])->default('pending');
            $table->decimal('profit_amount', 15, 2)->default(0);
            $table->decimal('total_amount_payable', 15, 2)->default(0);
            $table->integer('repayment_duration_months');
            $table->decimal('monthly_contribution', 15, 2)->default(0);
            $table->string('payment_day')->nullable();
            $table->string('payment_method')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};
