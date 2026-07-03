<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiskAssessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'client_id',
        'affordability_score',
        'project_readiness_score',
        'equity_commitment_score',
        'risk_level',
        'recommendation',
        'rationale',
        'assessed_at',
        'client_visible',
    ];

    protected function casts(): array
    {
        return [
            'assessed_at' => 'date',
            'client_visible' => 'boolean',
        ];
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
