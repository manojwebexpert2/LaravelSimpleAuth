<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\MainController;

Route::post('/auth/login', [MainController::class, 'loginnow'])->name('loginnow');
Route::post('/auth/save', [MainController::class, 'save'])->name('save');
Route::get('/admin/logout', [MainController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['DashboardAccessCheck']], function () {

    Route::view('/auth/login', 'auth.login')->name('loginnow');
    Route::get('/auth/regsiter', [MainController::class, 'register'])->name('register');
    Route::view('/admin/dashboard', 'admin.dashboard')->name('dashboard');
    Route::view('/admin/setting', 'admin.setting')->name('setting');
    Route::view('/admin/profile', 'admin.setting')->name('profile');
    
});
