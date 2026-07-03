<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->string('role')->default('admin')->after('email');
            $table->foreignId('client_id')->nullable()->after('role')->constrained()->nullOnDelete();
        });

        Schema::table('projects', function (Blueprint $table): void {
            $table->string('service_type')->default('New Build')->after('client_id');
            $table->string('project_origin')->default('New Project')->after('service_type');
            $table->unsignedTinyInteger('current_progress_percent')->default(0)->after('construction_stage');
            $table->text('client_objectives')->nullable()->after('finishing_works');
            $table->boolean('client_portal_visible')->default(true)->after('project_status');
        });

        Schema::table('investments', function (Blueprint $table): void {
            $table->string('financing_mode')->default('Contractor Finance')->after('contractor_investment');
            $table->string('payment_plan_status')->default('proposed')->after('payment_method');
        });
    }

    public function down(): void
    {
        Schema::table('investments', function (Blueprint $table): void {
            $table->dropColumn(['financing_mode', 'payment_plan_status']);
        });

        Schema::table('projects', function (Blueprint $table): void {
            $table->dropColumn([
                'service_type',
                'project_origin',
                'current_progress_percent',
                'client_objectives',
                'client_portal_visible',
            ]);
        });

        Schema::table('users', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('client_id');
            $table->dropColumn('role');
        });
    }
};
