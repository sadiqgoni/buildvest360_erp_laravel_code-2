<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('risk_assessments', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('affordability_score')->default(0);
            $table->unsignedTinyInteger('project_readiness_score')->default(0);
            $table->unsignedTinyInteger('equity_commitment_score')->default(0);
            $table->enum('risk_level', ['low', 'medium', 'high'])->default('medium');
            $table->enum('recommendation', ['approve', 'review', 'reject'])->default('review');
            $table->text('rationale');
            $table->date('assessed_at');
            $table->boolean('client_visible')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('risk_assessments');
    }
};
