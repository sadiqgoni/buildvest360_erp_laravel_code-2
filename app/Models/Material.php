<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Material extends Model
{
    use HasFactory;
    protected $fillable = ['project_id','material_name','supplier_responsibility','estimated_cost','delivery_status','required_date','remarks'];
    public function project(){ return $this->belongsTo(Project::class); }
}
