<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'type',
        'purchase_product_id',
        'free_product_id',
        'purchase_quantity',
        'free_quantity',
        'lower_limit',
        'upper_limit',
    ];

    // Relationships with the Product model
    public function purchaseProduct()
    {
        return $this->belongsTo(Product::class, 'purchase_product_id');
    }

    public function freeProduct()
    {
        return $this->belongsTo(Product::class, 'free_product_id');
    }
}
