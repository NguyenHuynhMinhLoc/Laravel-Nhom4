<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Category extends Model
{
    protected $table="Category";
    protected $colunm=[
        'CategoryID',
        'CategoryName',
        'Status'
    ];
    public static function CategoryADD($DATA){
         $result = DB::table('category')->insert([
            'CategoryName' => $DATA['DaTa'],
            'Status'=>1
        ]);
        return $result;
    }
    public static function GetCategories(){
       $result=category::select('CategoryID', 'CategoryName')
                   ->where('Status', 1)
                   ->get();
       return $result;
    }
}
