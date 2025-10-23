<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="Category";
    protected $colunm=[
        'CategoryID',
        'CategoryName',
        'Status'
    ];
}
