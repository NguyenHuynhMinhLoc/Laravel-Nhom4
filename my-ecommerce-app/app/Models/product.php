<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    public static function ProductADD($DaTa,$image){
        $FileName = null; 
        if($image){
            $FileName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $FileName);
        }
        $result = DB::table('product')->insert([
            'Image' => $FileName,
            'ProductName' => $DaTa['ten'] ?? '',
            'ProductPrice' => $DaTa['gia'] ?? 0,
            'PriceCoupon' => $DaTa['km'] ?? 0,
            'ProductQuantity' => $DaTa['sl'] ?? 0,
            'ProductStatus' => 1, 
            'CategoryID' => $DaTa['dm'] ?? null
        ]);
        return $result;
    }
    public static function GetProducts(){
        $ProductList = Product::where('ProductStatus', 1)->paginate(8);
        return $ProductList;
    }
    

    public static function XoaSanPham($dulieu){
       $ketqua= DB::table('product')
                  ->where('ProductID', $dulieu['id'])
                  ->update([
                    'ProductStatus' =>0
                  ]);
        return $ketqua;
    }
    public static function LaySP_TheoID($dulieu){
       $ketqua = DB::table('product')
                 ->where('ProductID', $dulieu['id'] )
                 ->first();
        return $ketqua;
    }
    
}
