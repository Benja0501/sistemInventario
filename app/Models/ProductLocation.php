<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLocation extends Model
{
    /** @use HasFactory<\Database\Factories\ProductLocationFactory> */
    use HasFactory;
    protected $table = 'product_location'; // si tu tabla se llama product_location
    protected $fillable = [
        'product_id',
        'location_id',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
