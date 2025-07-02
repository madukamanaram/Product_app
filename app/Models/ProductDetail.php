<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table = 'product_details'; // name of your new table

    protected $fillable = [
        'product_id',
        'description',
        'quantity'
    ];

    public function product()
    {
        return $this->belongsTo(product_table::class, 'product_id');
    }
}

