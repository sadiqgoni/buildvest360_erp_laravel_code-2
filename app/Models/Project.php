<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['project_id','client_id','project_address','building_type','construction_stage','number_of_floors','number_of_bedrooms','finishing_works','approved_area_sqm','cost_per_sqm','estimated_completion_cost','project_status'];

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
}
