<?php

use App\Http\Controllers\api\GuruController;
use App\Http\Controllers\api\KelasController;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\LogoutController;
use App\Http\Controllers\api\Registercontroller;
use App\Http\Controllers\SiswaController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
   return $request->user();
})->middleware('auth:sanctum');

route::get('/siswa', [SiswaController::class,'api'])->middleware(['auth:sanctum','admin']);

route::post('register', Registercontroller::class);

route::post('login', LoginController::class);
route::get('logout', LogoutController::class)->middleware('auth:sanctum');
route::apiResource('guru', GuruController::class )-> middleware('auth:sanctum');
route::apiResource('kelas', KelasController::class)->middleware('auth:sanctum');
