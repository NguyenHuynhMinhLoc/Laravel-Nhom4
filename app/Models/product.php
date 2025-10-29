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
        'PriceCoupon',
        'ProductStatus',
        'CategoryID',
        'ImportDate'
    ];
    public static function ProductADD($DaTa,$image){
        $FileName = null; 
        if($image){
            $FileName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $FileName);
        }
        $result = DB::table('product')->insert([
            'Image' => $FileName,
            'ProductName' => $DaTa['ProductName'] ?? '',
            'ProductPrice' => $DaTa['ProductPrice'] ?? 0,
            'PriceCoupon' => $DaTa['PriceCoubon'] ?? 0,
            'ProductQuantity' => $DaTa['Quantity'] ?? 0,
            'ProductStatus' => $DaTa['ProductStatus'], 
            'CategoryID' => $DaTa['CategoryID'] ?? null,
            'ImportDate'=>today()
        ]);
        return $result;
    }
    public static function GetProducts(){
        $ProductList = Product::where('ProductStatus', 1)->paginate(8);
        return $ProductList;
    }
    public static function GetProductsCoupon(){
        $Coupon = DB::table('product')
                    ->where('PriceCoupon', '!=', 0)
                    ->get();
        return $Coupon;
    }
    public static function getNewestProducts() {
        $startDate = now()->subDays(2);
        $products = DB::table('product')
                    ->whereDate('ImportDate', '>=', $startDate)
                    ->orderBy('ImportDate', 'desc')
                    ->get();
        return $products;
    }
    //bên dưới chưa sữa
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
