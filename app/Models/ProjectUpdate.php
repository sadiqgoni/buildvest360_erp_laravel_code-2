<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectUpdate extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title',
        'stage',
        'progress_percent',
        'update_date',
        'summary',
        'next_steps',
        'client_visible',
    ];

    protected function casts(): array
    {
        return [
            'update_date' => 'date',
            'client_visible' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saved(function (ProjectUpdate $update): void {
            $update->project()->update([
                'construction_stage' => $update->stage ?: $update->project->construction_stage,
                'current_progress_percent' => $update->progress_percent,
            ]);
        });
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
