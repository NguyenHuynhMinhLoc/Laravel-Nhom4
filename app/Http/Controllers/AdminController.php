<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
        //Hàm để thêm danh mục mới
    public function ThemDanhMuc(Request $request){
        $dulieuObj = $request->all();
         $ketqua = DB::table('category')->insert([
            'CategoryName' => $dulieuObj['dulieu'],
            'Status'=>1
        ]);
        if($ketqua){
            return response()->json([
                'status' => true,
                'message' => 'Thêm danh mục thành công!',
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>"Thêm thất bại!"
            ]);
        }
    }

        //Hàm để load danh mục
    public function Load_DM(){
        return category::select('CategoryID', 'CategoryName')
                   ->where('Status', 1)
                   ->get();
    }

        public function ThemSanPham(Request $request){
        $dulieuObj = $request->all();        
        $tenFile = null; 
        $hinhAnh = $request->file('hinh');
        if($hinhAnh){
            $tenFile = time().'_'.$hinhAnh->getClientOriginalName();
            $hinhAnh->move(public_path('uploads'), $tenFile);
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

        if($ketqua){
            return response()->json([
                'status'=>true,
                'message'=>"Thêm sản phẩm thành công!"
            ]);
        } else {
            return response()->json([
                'status'=>false,
                'message'=>"Thêm sản phẩm thất bại"
            ]);
        }
    }

    public function dashboard()
    {
        if(!session("email") || !session("password"))
        {
            return redirect()->route("admin.login");
        }
        return view("admin.index");
    }

    public function buttons(){
        return view("admin.buttons");
    }

    public function flot(){
        return view("admin.flot");
    }

    public function forms(){
        $danhmuc = Category::select('CategoryID', 'CategoryName')
                ->where('Status', 1)
                ->get();

    $sanpham = Product::where('ProductStatus', 1)->paginate(8);

    return view("admin.forms", [
        "DanhMuc" => $danhmuc,
        "SanPham" => $sanpham
    ]);
    }

    public function grid(){
        return view("admin.grid");
    }

    public function icons(){
        return view("admin.icons");
    }

    public function showlogin(){
        return view("admin.login");
    }

    public function login(Request $request){
        $data = $request->only("email","password");

        if($data["email"] === 'adminN4@gmail.com' && $data['password'] === 'pas123')
        {
            $request->session()->put('admin_log_in', true);
            session(['email'=> $data['email'],'password'=> $data['password']]);
            return redirect()->route('admin.dashboard')->with('data', $data);
        }
        return redirect()->route('admin.login')->withErrors(['thongbaoloi' => 'Email hoặc mật khẩu không đúng']);
    }

    public function morris(){
        return view("admin.morris");
    }

    public function notifications(){
        return view("admin.notifications");
    }

    public function panels_wells(){
        return view("admin.panels-wells");
    }

    public function tables(){
        return view("admin.tables");
    }

    public function typography(){
        return view("admin.typography");
    }

    public function blank(){
        return view("admin.blank");
    }

    public function logout(Request $request)
    {
        // cái này sẽ xóa hết session
        $request->session()->flush();

        return redirect()->route('admin.login');
    }

}
