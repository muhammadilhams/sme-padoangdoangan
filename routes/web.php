<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('admin/login', function () {
//     return view('auth.loginAdmin');
// });

Route::get('/link', function (){
    Artisan::call('storage:link');
});

Route::get('/', [UserController::class, 'beranda'])->name('beranda');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('registerform');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('loginform');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.loginform');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::group(['middleware' => ['auth.check']], function () {
    // Route yang memerlukan autentikasi
    // Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}',[UserController::class, 'update'])->name('user.update');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
   // routes/web.php
    Route::get('/dashboard', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::post('/login', [UserController::class, 'login'])->name('login');

});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
     // New route for storing users
     Route::post('/admin/create', [AdminController::class, 'store'])->name('admin.user.store');
     Route::get('/admin/create', [AdminController::class, 'createForm'])->name('admin.user.createForm');
     Route::delete('/admin/{user}', [AdminController::class, 'destroy'])->name('admin.user.destroy');
     Route::get('/admin/{user}/edit', [AdminController::class, 'editForm'])->name('admin.user.editForm');
     Route::put('/admin/{user}', [AdminController::class, 'update'])->name('admin.user.update');
     Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

});

Route::get('/umkm/{id}/detail',[ProductController::class, 'showDetail'])->name('umkm.detail');
Route::get('/umkm/list',[ProductController::class, 'umkmList'])->name('umkm.list');
Route::get('/umkm/{userId}/produk/{productId}/detail', [ProductController::class, 'showProduct'])->name('product.detail');//jika melalui page detail produk
Route::get('/produk/list',[ProductController::class, 'productList'])->name('product.list');
Route::get('/products/{id}', [ProductController::class, 'productGuest'])->name('product.detail.guest'); //jika melalui page etalase produk



