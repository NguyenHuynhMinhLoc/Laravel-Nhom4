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
    public static function ThemSanPham($dulieu,$hinhanh){
        $tenFile = null; 
        if($hinhanh){
            $tenFile = time().'_'.$hinhanh->getClientOriginalName();
            $hinhanh->move(public_path('uploads'), $tenFile);
        }
        $ketqua = DB::table('product')->insert([
            'Image' => $tenFile,
            'ProductName' => $dulieuObj['ten'] ?? '',
            'ProductPrice' => $dulieuObj['gia'] ?? 0,
            'PriceCoupon' => $dulieuObj['km'] ?? 0,
            'ProductQuantity' => $dulieuObj['sl'] ?? 0,
            'ProductStatus' => 1, 
            'CategoryID' => $dulieuObj['dm'] ?? null
        ]);
        return $ketqua;
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
    public static function LaySP(){
        $sanpham = Product::where('ProductStatus', 1)->paginate(8);
        return $sanpham;
    }
}
