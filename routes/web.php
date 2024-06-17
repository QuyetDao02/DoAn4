<?php

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

Route::get('/', function () {
    return view('Home/index');
});


Route::controller(App\Http\Controllers\HomeController::class)->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('/Login', 'login')->name('login');
    Route::get('/Category/{id?}', 'category')->name('category');
    Route::get('/Product/{id?}', 'product')->name('product');
    Route::get('/Blog', 'blog')->name('blog');
    Route::get('/Blog-detail/{id?}', 'blog_detail')->name('blog-detail');
    Route::get('/Contact', 'contact')->name('contact');
});

Route::controller(App\Http\Controllers\GioHangController::class)->group(function () {
    Route::get('/Cart', 'cartList')->name('cart.list');
    Route::post('/Cart/Create', 'addToCart')->name('cart.store');
    Route::post('/Cart/Update', 'updateCart')->name('cart.update');
    Route::post('/Cart/Remove', 'removeCart')->name('cart.remove');
    Route::post('/Cart/Clear', 'clearAllCart')->name('cart.clear');
});

Route::controller(App\Http\Controllers\ThanhToanController::class)->group(function () {
    Route::get('/Checkout', 'checkout')->name('checkout');
    Route::post('/ThanhToan/Store', 'store')->name('ThanhToan.store');
});

Route::group(['middleware' => ['auth']], function () {
    // Các tuyến đường của trang admin ở đây

    Route::controller(App\Http\Controllers\DoNoiThatController::class)->group(function () {
        Route::get('/DoNoiThat', 'index')->name('DoNoiThat.index');
        Route::get('/DoNoiThat/Create', 'create')->name('DoNoiThat.create');
        Route::post('/DoNoiThat/Store', 'store')->name('DoNoiThat.store');
        Route::get('/DoNoiThat/Edit/{id}', 'edit')->name('DoNoiThat.edit');
        Route::post('/DoNoiThat/Update/{id}', 'update')->name('DoNoiThat.update');
        Route::get('/DoNoiThat/Show/{id}', 'show')->name('DoNoiThat.show');
        Route::get('/DoNoiThat/Delete/{id}', 'destroy')->name('DoNoiThat.delete');
    });

    Route::controller(App\Http\Controllers\LoaiDoNoiThatController::class)->group(function () {
        Route::get('/LoaiDoNoiThat', 'index')->name('LoaiDoNoiThat.index');
        Route::get('/LoaiDoNoiThat/Create', 'create')->name('LoaiDoNoiThat.create');
        Route::post('/LoaiDoNoiThat/Store', 'store')->name('LoaiDoNoiThat.store');
        Route::get('/LoaiDoNoiThat/Edit/{id}', 'edit')->name('LoaiDoNoiThat.edit');
        Route::post('/LoaiDoNoiThat/Update/{id}', 'update')->name('LoaiDoNoiThat.update');
        Route::get('/LoaiDoNoiThat/Delete/{id}', 'destroy')->name('LoaiDoNoiThat.delete');
        Route::get('/LoaiDoNoiThat/Show/{id}', 'show')->name('LoaiDoNoiThat.show');
    });

    Route::controller(App\Http\Controllers\NhaCungCapController::class)->group(function () {
        Route::get('/NhaCungCap', 'index')->name('NhaCungCap.index');
        Route::get('/NhaCungCap/Create', 'create')->name('NhaCungCap.create');
        Route::post('/NhaCungCap/Store', 'store')->name('NhaCungCap.store');
        Route::get('/NhaCungCap/Edit/{id}', 'edit')->name('NhaCungCap.edit');
        Route::post('/NhaCungCap/Update/{id}', 'update')->name('NhaCungCap.update');
        Route::get('/NhaCungCap/Show/{id}', 'show')->name('NhaCungCap.show');
        Route::get('/NhaCungCap/Delete/{id}', 'destroy')->name('NhaCungCap.delete');
    });

    Route::controller(App\Http\Controllers\TinTucController::class)->group(function () {
        Route::get('/TinTuc', 'index')->name('TinTuc.index');
        Route::get('/TinTuc/Create', 'create')->name('TinTuc.create');
        Route::post('/TinTuc/Store', 'store')->name('TinTuc.store');
        Route::get('/TinTuc/Edit/{id}', 'edit')->name('TinTuc.edit');
        Route::post('/TinTuc/Update/{id}', 'update')->name('TinTuc.update');
        Route::get('/TinTuc/Show/{id}', 'show')->name('TinTuc.show');
        Route::get('/TinTuc/Delete/{id}', 'destroy')->name('TinTuc.delete');
    });

    Route::controller(App\Http\Controllers\DonHangBanController::class)->group(function () {
        Route::get('/DonHangBan/ChuaXuLy', 'index')->name('DonHangBan.index');
        Route::get('/DonHangBan/DaXuLy', 'index1')->name('DonHangBan.index1');
        Route::get('/DonHangBan/Create', 'create')->name('DonHangBan.create');
        Route::post('/DonHangBan/Store', 'store')->name('DonHangBan.store');
        Route::get('/DonHangBan/Edit/{id}', 'edit')->name('DonHangBan.edit');
        Route::post('/DonHangBan/Update/{id}', 'update')->name('DonHangBan.update');
        Route::get('/DonHangBan/Delete/{id}', 'destroy')->name('DonHangBan.delete');
    });

    Route::controller(App\Http\Controllers\ChiTietDHBController::class)->group(function () {
        Route::get('/ChiTietDHB/{id}', 'index')->name('ChiTietDHB.index');
        Route::get('/ChiTietDHB/Create', 'create')->name('ChiTietDHB.create');
        Route::post('/ChiTietDHB/Store', 'store')->name('ChiTietDHB.store');
        Route::get('/ChiTietDHB/Edit/{id}', 'edit')->name('ChiTietDHB.edit');
        Route::post('/ChiTietDHB/Update/{id}', 'update')->name('ChiTietDHB.update');
        Route::get('/ChiTietDHB/Delete/{id}', 'destroy')->name('ChiTietDHB.delete');
    });

    Route::controller(App\Http\Controllers\HoaDonNhapController::class)->group(function () {
        Route::get('/HoaDonNhap/ChuaXuLy', 'index')->name('HoaDonNhap.index');
        Route::get('/HoaDonNhap/DaXuLy', 'index1')->name('HoaDonNhap.index1');
        Route::get('/HoaDonNhap/Create', 'create')->name('HoaDonNhap.create');
        Route::post('/HoaDonNhap/Store', 'store')->name('HoaDonNhap.store');
        Route::get('/HoaDonNhap/Edit/{id}', 'edit')->name('HoaDonNhap.edit');
        Route::post('/HoaDonNhap/Update/{id}', 'update')->name('HoaDonNhap.update');
        Route::get('/HoaDonNhap/Delete/{id}', 'destroy')->name('HoaDonNhap.delete');
    });

    Route::controller(App\Http\Controllers\ChiTietHDNController::class)->group(function () {
        Route::get('/ChiTietHDN/{id}', 'index')->name('ChiTietHDN.index');
        Route::get('/ChiTietHDN/Create/{id}', 'create')->name('ChiTietHDN.create');
        Route::post('/ChiTietHDN/Store/{id}', 'store')->name('ChiTietHDN.store');
        Route::get('/ChiTietHDN/Edit/{id}', 'edit')->name('ChiTietHDN.edit');
        Route::post('/ChiTietHDN/Update/{id}', 'update')->name('ChiTietHDN.update');
        Route::get('/ChiTietHDN/Delete/{id}', 'destroy')->name('ChiTietHDN.delete');
    });

    Route::controller(App\Http\Controllers\ChiTietAnhController::class)->group(function () {
        Route::get('/ChiTietAnh/Create/{id}', 'create')->name('ChiTietAnh.create');
        Route::post('/ChiTietAnh/Store/{id}', 'store')->name('ChiTietAnh.store');
        Route::get('/ChiTietAnh/Delete/{id}', 'destroy')->name('ChiTietAnh.delete');
    });

    Route::controller(App\Http\Controllers\KhoController::class)->group(function () {
        Route::get('/Kho', 'index')->name('Kho.index');
    });

    Route::controller(App\Http\Controllers\TaiKhoanController::class)->group(function () {
        Route::get('/TaiKhoan', 'index')->name('TaiKhoan.index');
        Route::get('/TaiKhoan/Create', 'create')->name('TaiKhoan.create');
        Route::post('/TaiKhoan/Store', 'store')->name('TaiKhoan.store');
        Route::get('/TaiKhoan/Edit/{id}', 'edit')->name('TaiKhoan.edit');
        Route::post('/TaiKhoan/Update/{id}', 'update')->name('TaiKhoan.update');
        Route::get('/TaiKhoan/Show/{id}', 'show')->name('TaiKhoan.show');
        Route::get('/TaiKhoan/Delete/{id}', 'destroy')->name('TaiKhoan.delete');
    });

    Route::controller(App\Http\Controllers\NhanVienController::class)->group(function () {
        Route::get('/NhanVien', 'index')->name('NhanVien.index');
        Route::get('/NhanVien/Create', 'create')->name('NhanVien.create');
        Route::post('/NhanVien/Store', 'store')->name('NhanVien.store');
        Route::get('/NhanVien/Edit/{id}', 'edit')->name('NhanVien.edit');
        Route::post('/NhanVien/Update/{id}', 'update')->name('NhanVien.update');
        Route::get('/NhanVien/Show/{id}', 'show')->name('NhanVien.show');
        Route::get('/NhanVien/Delete/{id}', 'destroy')->name('NhanVien.delete');
    });

    Route::controller(App\Http\Controllers\KhachHangController::class)->group(function () {
        Route::get('/KhachHang', 'index')->name('KhachHang.index');
        Route::get('/KhachHang/Create', 'create')->name('KhachHang.create');
        Route::post('/KhachHang/Store', 'store')->name('KhachHang.store');
        Route::get('/KhachHang/Edit/{id}', 'edit')->name('KhachHang.edit');
        Route::post('/KhachHang/Update/{id}', 'update')->name('KhachHang.update');
        Route::get('/KhachHang/Show/{id}', 'show')->name('KhachHang.show');
        Route::get('/KhachHang/Delete/{id}', 'destroy')->name('KhachHang.delete');
    });
});
Auth::routes();
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->back();
})->name('logout');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
