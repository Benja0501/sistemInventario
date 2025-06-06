<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    /** @use HasFactory<\Database\Factories\PurchaseOrderFactory> */
    use HasFactory;
    protected $fillable = [
        'order_number',
        'created_by_user_id',
        'supplier_id',
        'order_date',
        'expected_delivery_date',
        'total_amount',
        'status',
    ];

    protected $dates = [
        'order_date',
        'expected_delivery_date',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function items()
    {
        return $this->hasMany(PurchaseOrderItem::class);
    }

    public function receptions()
    {
        return $this->hasMany(Reception::class);
    }
}
