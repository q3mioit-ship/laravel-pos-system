<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'stock',
        'cost_price',
        'sale_price',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}

