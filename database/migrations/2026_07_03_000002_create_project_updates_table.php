<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_updates', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('stage')->nullable();
            $table->unsignedTinyInteger('progress_percent')->default(0);
            $table->date('update_date');
            $table->text('summary');
            $table->text('next_steps')->nullable();
            $table->boolean('client_visible')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_updates');
    }
};
