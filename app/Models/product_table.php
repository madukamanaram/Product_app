<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_table extends Model
{
    protected $table = 'product_table';
    protected $fillable = [
        'name',
        'price'
    ];


    // app/Models/Product.php

public function detail()
{
    return $this->hasOne(ProductDetail::class , 'product_id');
}



}
