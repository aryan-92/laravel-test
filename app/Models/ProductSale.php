<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_qty',
        'product_unit_cost',
        'product_selling_price',
        'created_at',
        'updated_at',
    ];
}
