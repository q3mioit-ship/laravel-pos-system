<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'product_id',
        'quantity',
        'purchased_at',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}