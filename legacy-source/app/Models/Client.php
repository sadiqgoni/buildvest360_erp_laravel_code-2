<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Client extends Model
{
    use HasFactory;
    protected $fillable = ['client_id','full_name','gender','phone','alternative_phone','email','occupation','employer','job_title','office_address','monthly_income','residential_address','state','lga','ward','landmark','house_ownership','status'];
    public function projects(){ return $this->hasMany(Project::class); }
}
