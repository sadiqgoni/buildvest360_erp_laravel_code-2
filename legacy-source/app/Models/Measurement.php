<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Measurement extends Model
{
    use HasFactory;
    protected $fillable = ['project_id','client_ground_floor_sqm','client_first_floor_sqm','client_other_floor_sqm','client_total_sqm','engineer_ground_floor_sqm','engineer_first_floor_sqm','engineer_other_floor_sqm','engineer_total_sqm','measurement_difference_sqm','measurement_difference_percent','approved_area_sqm','measurement_status','engineer_remarks','admin_remarks'];
    public function project(){ return $this->belongsTo(Project::class); }
}
