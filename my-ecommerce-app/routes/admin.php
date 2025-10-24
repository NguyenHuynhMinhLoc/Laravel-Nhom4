<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\ValidateAdminLogin;

// phần này sẽ kiểm tra trạng thái đăng nhập

Route::middleware([CheckLogin::class])->group(function(){
    Route::get('/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/buttons', [AdminController::class,'buttons']);
    Route::get('/flot', [AdminController::class,'flot']);
    Route::get('/forms', [AdminController::class,'forms']);
    Route::get('/grid', [AdminController::class,'grid']);
    Route::get('/icons', [AdminController::class,'icons']);
    Route::get('/morris', [AdminController::class,'morris']);
    Route::get('/notifications', [AdminController::class,'notifications']);
    Route::get('/panels-wells', [AdminController::class,'panels_wells']);
    Route::get('/tables', [AdminController::class,'tables']);
    Route::get('/typography', [AdminController::class,'typography']);
    Route::get('/blank', [AdminController::class,'blank']);
    
});

// phần này ktra đăng nhập đầu vào của admin
Route::get('/login', [AdminController::class,'showlogin'])->name('admin.login');
Route::post('/login', [AdminController::class,'login'])->middleware(ValidateAdminLogin::class);

Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
// Route::prefix('admin')->group(function () {
//     Route::get('/admin', [AdminController::class,'dashboard']);
//     Route::get('/buttons', [AdminController::class,'buttons']);
//     Route::get('/flot', [AdminController::class,'flot']);
//     Route::get('/forms', [AdminController::class,'forms']);
//     Route::get('/grid', [AdminController::class,'grid']);
//     Route::get('/icons', [AdminController::class,'icons']);
//     Route::get('/login', [AdminController::class,'login']);
//     Route::get('/morris', [AdminController::class,'morris']);
//     Route::get('/notifications', [AdminController::class,'notifications']);
//     Route::get('/panels-wells', [AdminController::class,'panels_wells']);
//     Route::get('/tables', [AdminController::class,'tables']);
//     Route::get('/typography', [AdminController::class,'typography']);
// });

//Định nghĩa router post
Route::post('/category/add', [AdminController::class, 'CategoryADD']);
Route::post('/category/load', [AdminController::class, 'CategoryLoad']);
Route::post('/product/add', [AdminController::class, 'ProductADD']);
Route::post('/product/remove', [AdminController::class, 'XoaSanPham']);
