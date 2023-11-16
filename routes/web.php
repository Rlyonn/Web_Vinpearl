<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\CthdController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\LoaiNhanVienController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\SoCaController;
use App\Http\Controllers\DichVuController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\LoaiDichVuController;
use App\Http\Controllers\VeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

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
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('index');
    Route::resource('cthd', CthdController::class);
    Route::resource('khach_hangs', KhachHangController::class);
    Route::resource('loai_nhan_viens', LoaiNhanVienController::class);
    Route::resource('nhan_viens', NhanVienController::class);
    Route::resource('so_cas', SoCaController::class);
    Route::resource('loai_dich_vus', LoaiDichVuController::class);
    Route::resource('dich_vus', DichVuController::class);
    Route::resource('ves', VeController::class);
    Route::get('nhan-viens/export', [NhanVienController::class, 'export'])->name('nhan_viens.export');
    Route::get('loai-nhan-viens/export', [LoaiNhanVienController::class, 'export'])->name('loai_nhan_viens.export');
    Route::get('khach-hangs/export', [KhachHangController::class, 'export'])->name('khach_hangs.export');
    Route::get('loai-dich-vus/export', [LoaiDichVuController::class, 'export'])->name('loai_dich_vus.export');
    Route::get('dich-vus/export', [DichVuController::class, 'export'])->name('dich_vus.export');
    Route::get('vess/export', [VeController::class, 'export'])->name('ves.export');
});
Route::get('/', [DichVuController::class, 'homeIndex'])->name('index');
Route::get('/show/{maDV}', [DichVuController::class, 'showForCustomer'])->name('show');
// cart route
Route::get('/cart', [CartController::class, 'index'])->name('cartIndex');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/cart/increase', [CartController::class, 'increaseQuantity'])->name('increaseQuantity');
Route::post('/cart/decrease', [CartController::class, 'decreaseQuantity'])->name('decreaseQuantity');
Route::post('/cart/remove', [CartController::class, 'removeItemFromCart'])->name('removeItemFromCart');
Route::get('/search', [SearchController::class, 'index'])->name('search');
//Route::post('/cart/vnpay_payment', [CartController::class, 'vnpay_payment'])->name('vnpay_payment');
Route::post('/vnpay_payment', [PaymentController::class, 'vnpay_payment']);
Route::post('/momo_payment', [PaymentController::class, 'momo_payment']);