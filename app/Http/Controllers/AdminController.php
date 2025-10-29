<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateProducts;
use App\Http\Requests\ValidateCatories;
class AdminController extends Controller
{
    //Hàm để thêm danh mục mới
    public function CategoryADD(ValidateCatories $request){
        $ObjData = $request->validated();
        $result=category::CategoryADD($ObjData);
         if ($result) {
            return response()->json([
                'status' => true,
                'message' => 'Thêm danh mục thành công!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Thêm thất bại!'
            ]);
        } 
    }
     //Hàm để load danh mục
    public function CategoryLoad(){
        return category::GetCategories();
    }
    // Thêm sản phẩm vào database
     public function ProductADD(ValidateProducts $request){
        $ObjData = $request->validated();        
        $Image = $request->file('Image');
        $result = product::ProductADD($ObjData,$Image);
         if($result){
            return response()->json([
                'status'=>true,
                'message'=>"Thêm sản phẩm thành công!"
            ]);
        } else {
            return response()->json([
                'status'=>false,
                'message'=>"Thêm sản phẩm thất bại",
                'from'=>2
            ]);
        }
    }
    //Hàm xóa sản phẩm (Không xóa khỏi database, chỉ chuyển status=0)
    public function XoaSanPham(Request $request)
    {
         $dulieuObj = $request->all();
         $ketqua=product::XoaSanPham($dulieuObj);
         if($ketqua){
            return response()->json([
                'status'=>true,
                'message'=>"Đã xóa thành công sản phẩm"
            ]);
         }else{
            return response()->json([
                'satus'=>false,
                'message'=>"Xóa thất bại!"
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
        return view("admin.forms", [
            "Categories" => category::GetCategories(),
            "Products" => product::GetProducts()
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

