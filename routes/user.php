<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Middleware\ValidateContact;
// USER
Route::get('/', [PageController::class, 'index']);
Route::get('/index', [PageController::class, 'index']);
Route::get('/home', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/checkout', [PageController::class, 'checkout']);
Route::get('/productdetail', [PageController::class, 'productdetail']);
Route::get('/products', [PageController::class, 'products']);
Route::get('/faqs', [PageController::class, 'faqs']);
Route::get('/shoppingcart', [PageController::class, 'shoppingcart']);

Route::get('/contact', [PageController::class, 'contact']);
Route::post('/contact', [PageController::class, 'postcontact'])->middleware(ValidateContact::class);
Route::get('/contact-confirm', [PageController::class,'contactconfirm'])->name('contact.confirm');

Route::get('/login_user', [PageController::class,'login_user']);


// Route::prefix('user')->group(function () {
//     Route::get('/', [PageController::class, 'index']);
//     Route::get('/index', [PageController::class, 'index']);
//     Route::get('/home', [PageController::class, 'index']);
//     Route::get('/about', [PageController::class, 'about']);
//     Route::get('/checkout', [PageController::class, 'checkout']);
//     Route::get('/productdetail', [PageController::class, 'productdetail']);
//     Route::get('/products', [PageController::class, 'products']);
//     Route::get('/faqs', [PageController::class, 'faqs']);
//     Route::get('/shoppingcart', [PageController::class, 'shoppingcart']);

//     Route::get('/contact', [PageController::class, 'contact']);

//     Route::post('/contact', [PageController::class, 'postcontact'])->middleware(ValidateContact::class);
//     Route::get('/contact-confirm', [PageController::class,'contactconfirm'])->name('contact.confirm');
// });