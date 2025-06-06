<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    /** @use HasFactory<\Database\Factories\BatchFactory> */
    use HasFactory;
    protected $fillable = [
        'product_id',
        'batch_number',
        'expiration_date',
        'quantity',
    ];

    protected $dates = [
        'expiration_date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
