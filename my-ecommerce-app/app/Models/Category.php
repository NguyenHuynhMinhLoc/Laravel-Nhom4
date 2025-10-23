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
    public static function ThemDuLieu($bien){
         $ketqua = DB::table('category')->insert([
            'CategoryName' => $bien['dulieu'],
            'Status'=>1
        ]);
        return $ketqua;
    }
    public static function LoadDM(){
       $dulieu=category::select('CategoryID', 'CategoryName')
                   ->where('Status', 1)
                   ->get();
       return $dulieu;
    }
}
