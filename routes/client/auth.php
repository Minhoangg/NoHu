<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/login', [AuthController::class, 'loginForm'])->name('login-form');
Route::post('/login', [AuthController::class, 'loginHandle'])->name('login-submit');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register-form');
Route::post('/register', [AuthController::class, 'registerHandle'])->name('register-submit');
Route::get('/logout', function () {
    // Lấy người dùng hiện tại
    $user = Auth::user();

    // Kiểm tra nếu người dùng đã đăng nhập
    if ($user) {
        // Cập nhật thông tin last_login_at trước khi đăng xuất
        $user->last_login_at = null;
        $user->save();
    }

    // Thực hiện đăng xuất
    Auth::logout();

    // Xóa session người dùng (nếu cần thiết)
    session()->invalidate();

    // Đưa người dùng về trang welcome
    return redirect()->route('client.wellcome');
})->name('logout');
