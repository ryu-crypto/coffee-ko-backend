<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'amount',
        'sale_date',
    ];

    // ✅ Relationship: each Sale belongs to one Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
