<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class LegalDocument extends Model
{
    use HasFactory;
    protected $fillable = ['project_id','document_type','document_title','document_body','legal_status','legal_officer','admin_approved','client_signed','legal_remarks'];
    public function project(){ return $this->belongsTo(Project::class); }
}
