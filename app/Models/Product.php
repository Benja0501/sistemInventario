<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $fillable = [
        'sku',
        'name',
        'description',
        'unit_price',
        'min_stock',
        'current_stock',
        'unit_of_measure',
        'category_id',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function purchaseOrderItems()
    {
        return $this->hasMany(PurchaseOrderItem::class);
    }

    public function receptionItems()
    {
        return $this->hasMany(ReceptionItem::class);
    }

    public function productLocations()
    {
        return $this->hasMany(ProductLocation::class);
    }

    public function discrepancies()
    {
        return $this->hasMany(Discrepancy::class);
    }

    public function batches()
    {
        return $this->hasMany(Batch::class);
    }
}
