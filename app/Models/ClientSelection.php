<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientSelection extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'client_id',
        'category',
        'item_name',
        'selected_option',
        'budget_amount',
        'decision_deadline',
        'client_notes',
        'admin_notes',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'decision_deadline' => 'date',
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
