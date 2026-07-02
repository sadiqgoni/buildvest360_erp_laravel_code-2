<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    use HasFactory;

    protected $fillable = ['project_id','client_ground_floor_sqm','client_first_floor_sqm','client_other_floor_sqm','client_total_sqm','engineer_ground_floor_sqm','engineer_first_floor_sqm','engineer_other_floor_sqm','engineer_total_sqm','measurement_difference_sqm','measurement_difference_percent','approved_area_sqm','measurement_status','engineer_remarks','admin_remarks'];

    protected static function booted(): void
    {
        static::saving(function (Measurement $measurement): void {
            $clientTotal = (float) $measurement->client_ground_floor_sqm
                + (float) $measurement->client_first_floor_sqm
                + (float) $measurement->client_other_floor_sqm;
            $engineerTotal = (float) $measurement->engineer_ground_floor_sqm
                + (float) $measurement->engineer_first_floor_sqm
                + (float) $measurement->engineer_other_floor_sqm;

            $measurement->client_total_sqm = $clientTotal;
            $measurement->engineer_total_sqm = $engineerTotal;
            $measurement->measurement_difference_sqm = $engineerTotal - $clientTotal;
            $measurement->measurement_difference_percent = $clientTotal > 0
                ? (($engineerTotal - $clientTotal) / $clientTotal) * 100
                : 0;
        });
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
