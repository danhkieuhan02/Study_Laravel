<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\SanPhamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::prefix("/admin")->name("admin.")->middleware('auth')->group(function () {
    Route::prefix("/danh-muc")->name("danhmuc.")->group(function () {
        Route::get('/', [DanhMucController::class, "index"])->name('index');
        Route::get('/tao-danh-muc', [DanhMucController::class, "create"])->name('create');
        // Route::post('/store', [DanhMucController::class, "store"])->name('store');
        Route::get('/{id}/sua-danh-muc', [DanhMucController::class, "edit"])->name('edit');
        //Có dấu ? vì dùng cho id không bắt buộc. Id có cũng được không có cũng không sao. Phải ở cuối url.
        Route::post('/luu/{id?}', [DanhMucController::class, "upsert"])->name('upsert'); // dùng upsert phải đem id ra cuối vì thêm mới thì phải thêm ib, id không xuất hiện trên url, bỏ ở giữa rất phức tạp.
        Route::post('/xoa/{id}', [DanhMucController::class, "destroy"])->name('destroy');
    });
});
// /admin/danh-muc/xxx

Route::prefix("/admin")->name('admin.')->middleware('auth')->group(function () {
    Route::prefix("/san-pham")->name('sanpham.')->group(function () {
        Route::get("/", [SanPhamController::class, "index"])->name('index');
        Route::get('/them-san-pham', [SanPhamController::class, "create"])->name('create');
        Route::post('/luu/{id?}', [SanPhamController::class, "upsert"])->name("upsert");
        Route::post('/xoa/{id}', [SanPhamController::class, "destroy"])->name("destroy");
        Route::get('/{id}/sua-san-pham', [SanPhamController::class, "edit"])->name('edit');
    });
});

Route::prefix("/account")->name('account.')->group(function () {
    Route::get('/dang-ky', [AccountController::class, "register"])->name('register');
    Route::post('/dang-ky', [AccountController::class, "save"])->name('save');
    Route::get('/dang-nhap', [AccountController::class, "login"])->name('login');
    Route::post('/dang-nhap', [AccountController::class, "auth"])->name('auth');
    Route::get('/dang-xuat', [AccountController::class, "logout"])->name('logout');
});
