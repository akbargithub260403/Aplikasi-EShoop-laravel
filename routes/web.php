<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/',function (){
    //     return view('dashboard.home');
// });


Auth::routes();
Route::get('/', [App\Http\Controllers\ProductsController::class, 'index']);

// link kalau belum login
Route::get('/Account/E-Shoop',[AccountController::class , 'login_account']);
Route::get('/Account/E-Shoop/Checkout',[AccountController::class , 'login_account']);
Route::get('/Account/E-Shoop/Cart',[AccountController::class , 'login_account']);


// route untuk yang memiliki role user
Route::group(['middleware' => ['auth','CheckRole:user']],function(){
    
    Route::get('/AllProducts',[ProductsController::class , 'index_user'])->name('AllProducts');
    Route::get('/Products/E-Shooper/{produk}/Detail',[ProductsController::class , 'show'])->name('DetailProduk');
    Route::get('/AddCart/Products/{produk_id}/E-Shooper/{user_id}/{nama_barang}',[CartController::class , 'store'])->name('tambahkeCart');
    Route::get('/Account/E-Shoop/Cart/{user}',[CartController::class , 'index'])->name('dataCart');
    Route::get('/E-Shoop/{type}/Cart/{user_id}/{produk_id} ',[CartController::class , 'quantity'])->name('tambahAtauKurangQuantity');
    Route::get('/E-Shoop/Delete/{cart}/Cart ',[CartController::class , 'destroy'])->name('hapusCart');
    
    Route::get('/E-Shoop/Checkout/{cart}/Cart ',[CartController::class , 'checkout'])->name('checkout');

    Route::post('/E-Shoop/Pembayaran/{produk_id}/{nama_pemesan}',[PembayaranController::class , 'pembayaran'])->name('pembayaran');

    Route::get('/Account/E-Shoop/Checkout/{user}',[PembayaranController::class , 'checkout'])->name('checkoutpembayaran');

    Route::delete('/Checkout/Produk/{pembayaran}/Cancel',[PembayaranController::class , 'destroy'])->name('hapusCheckout');

    Route::post('/Account/{name}/Products/{nama_produk}/Review',[ReviewController::class, 'store'])->name('TambahReview');
});

// Route untuk yang memiliki role admin dan user
Route::group(['middleware' => ['auth','CheckRole:admin']],function(){

    Route::get('/Products/E-Shoop/Admin',[ProductsController::class , 'index_admin'])->name('DataProdukAdmin');
    Route::get('/AddProducts/E-Shoop/Admin',[ProductsController::class , 'create'])->name('TambahProdukAdmin');
    Route::post('/AddProducts/E-Shoop/Admin/Progress',[ProductsController::class , 'store'])->name('TambahProdukAdminProgress');
    Route::get('/Products/E-Shoop/Admin/{produk}/Admin',[ProductsController::class , 'edit'])->name('UpdateProduk');
    Route::patch('/UpdateProducts/E-Shoop/{produk}/Admin/Progress',[ProductsController::class , 'update'])->name('UpdateProdukProgress');
    Route::delete('/Products/E-Shoop/Admin/{produk}/{nama_produk}/Delete',[ProductsController::class , 'destroy'])->name('DeleteProduk');
    
    Route::get('/AddCategory/E-Shoop/Admin',[CategoryController::class , 'create'])->name('TambahCategory');
    Route::post('/AddCategory/E-Shoop/Admin/Progress',[CategoryController::class , 'store'])->name('TambahCategoryProgress');
    Route::get('/Category/E-Shoop/Admin',[CategoryController::class , 'index'])->name('DataCategory');
    Route::delete('/Category/E-Shoop/Admin/{kategori}/{nama_kategori}/Delete',[CategoryController::class , 'destroy'])->name('DeleteProduk');
    Route::get('/Category/E-Shoop/Admin/{kategori}/Admin',[CategoryController::class , 'edit'])->name('updateKategori');
    Route::patch('/UpdateCategory/E-Shoop/{kategori}/Admin/Progress',[CategoryController::class , 'update'])->name('UpdateCategory');

    Route::get('/Checkout/E-Shoop/Admin',[PembayaranController::class , 'datacheckout'])->name('dataCheckout');
    Route::get('DetailCheckout/{pembayaran}/E-Shoop/Admin',[PembayaranController::class , 'detailcheckout'])->name('detailcheckout');
    Route::patch('/Checkout/UpdateStatus/{id_pembayaran}/Admin',[PembayaranController::class , 'updatestatus'])->name('UpdateStatusPemesanan');
    
});


// Route untuk yang memiliki role admin dan user
Route::group(['middleware' => ['auth','CheckRole:user,admin']],function(){

    // route setelah login
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
});

    

