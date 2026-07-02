<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['project_id','amount_paid','payment_date','payment_method','reference_number','remarks'];
    public function project(){ return $this->belongsTo(Project::class); }
}
