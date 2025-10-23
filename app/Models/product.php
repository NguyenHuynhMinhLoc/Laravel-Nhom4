<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="product";
    protected $colunm=[
        'ProductID',
        'Image',
        'ProductName',
        'ProductPrice',
        'PriceCoubon',
        'ProductStatus',
        'CategoryID'
    ];
}
