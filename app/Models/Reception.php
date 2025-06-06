<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
    /** @use HasFactory<\Database\Factories\ReceptionFactory> */
    use HasFactory;
    protected $fillable = [
        'purchase_order_id',
        'received_by_user_id',
        'received_at',
        'status',
    ];

    protected $dates = [
        'received_at',
    ];

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'received_by_user_id');
    }

    public function items()
    {
        return $this->hasMany(ReceptionItem::class);
    }
}
