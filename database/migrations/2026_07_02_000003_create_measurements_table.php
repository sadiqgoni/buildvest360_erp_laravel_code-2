<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->unique()->constrained()->cascadeOnDelete();
            $table->decimal('client_ground_floor_sqm', 12, 2)->nullable();
            $table->decimal('client_first_floor_sqm', 12, 2)->nullable();
            $table->decimal('client_other_floor_sqm', 12, 2)->nullable();
            $table->decimal('client_total_sqm', 12, 2)->nullable();
            $table->decimal('engineer_ground_floor_sqm', 12, 2)->nullable();
            $table->decimal('engineer_first_floor_sqm', 12, 2)->nullable();
            $table->decimal('engineer_other_floor_sqm', 12, 2)->nullable();
            $table->decimal('engineer_total_sqm', 12, 2)->nullable();
            $table->decimal('measurement_difference_sqm', 12, 2)->nullable();
            $table->decimal('measurement_difference_percent', 8, 2)->nullable();
            $table->decimal('approved_area_sqm', 12, 2)->nullable();
            $table->string('measurement_status')->default('Client Submitted');
            $table->text('engineer_remarks')->nullable();
            $table->text('admin_remarks')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('measurements');
    }
};
