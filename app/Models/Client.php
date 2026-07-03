<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['client_id','full_name','gender','phone','alternative_phone','email','occupation','employer','job_title','office_address','monthly_income','residential_address','state','lga','ward','landmark','house_ownership','status'];

    protected static function booted(): void
    {
        static::creating(function (Client $client): void {
            if (blank($client->client_id)) {
                $client->client_id = 'CLI-' . now()->year . '-' . str_pad((string) (static::count() + 1), 4, '0', STR_PAD_LEFT);
            }
        });
    }

    public function portalUsers()
    {
        return $this->hasMany(User::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function selections()
    {
        return $this->hasMany(ClientSelection::class);
    }

    public function riskAssessments()
    {
        return $this->hasMany(RiskAssessment::class);
    }
}
