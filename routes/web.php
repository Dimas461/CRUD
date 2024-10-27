<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

// halaman default
// Route::match(['get','post'],'/', function () {
//     return view('form');
// });

Route::get('/', [HomeController::class, 'home'])->middleware('auth');
Route::match(["get", "post"],
            '/home/insert', [HomeController::class, 'insert']);
Route::match(["get","post"],
            '/home/update/{id}', [HomeController::class, 'update']);
Route::get('/home/delete/{id}', [HomeController::class, 'delete']);

Route::match(["get", "post"],
            '/login', LoginController::class)->name('login');
Route::get('/logout', LogoutController::class);




Route::get('/dashboard', [HomeController::class, 'dashboard']);
Route::get('/about', AboutController::class);
Route::resource('/siswa',SiswaController::class);


Route::prefix("blog")->group(function() {

    Route::get('/about', function() {
        return 'Tentang Kami';
    });
    Route::get('/contact', function() {
        return 'Contact us';
    });
    Route::get('/login', function() {
        return 'Login page';
    });
});
