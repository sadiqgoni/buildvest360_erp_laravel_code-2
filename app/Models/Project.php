<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'client_id',
        'service_type',
        'project_origin',
        'project_address',
        'building_type',
        'construction_stage',
        'current_progress_percent',
        'number_of_floors',
        'number_of_bedrooms',
        'finishing_works',
        'client_objectives',
        'approved_area_sqm',
        'cost_per_sqm',
        'estimated_completion_cost',
        'project_status',
        'client_portal_visible',
    ];

    protected function casts(): array
    {
        return [
            'client_portal_visible' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Project $project): void {
            if (blank($project->project_id)) {
                $project->project_id = 'PRJ-' . now()->year . '-' . str_pad((string) (static::count() + 1), 4, '0', STR_PAD_LEFT);
            }
        });
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function measurement()
    {
        return $this->hasOne(Measurement::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function investment()
    {
        return $this->hasOne(Investment::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function procurementItems()
    {
        return $this->hasMany(ProcurementItem::class);
    }

    public function legalDocuments()
    {
        return $this->hasMany(LegalDocument::class);
    }

    public function updates()
    {
        return $this->hasMany(ProjectUpdate::class)->latest('update_date');
    }

    public function selections()
    {
        return $this->hasMany(ClientSelection::class);
    }

    public function riskAssessments()
    {
        return $this->hasMany(RiskAssessment::class)->latest('assessed_at');
    }
}
