<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementItem extends Model
{
    use HasFactory;

    protected $fillable = ['project_id','supplier_id','item_name','quantity','unit','unit_price','total_price','procurement_status','request_type','remarks'];

    protected static function booted(): void
    {
        static::saving(function (ProcurementItem $item): void {
            $item->total_price = (float) $item->quantity * (float) $item->unit_price;
        });
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
