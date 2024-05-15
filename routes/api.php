<?php


use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function ()
{
    Route::post('login', LoginController::class)->name('api.login');
    Route::post('logout', LogoutController::class)->middleware('auth:sanctum')->name('api.logout');
    Route::post('register', RegisterController::class)->name('api.register');
});

Route::get('/user', function (Request $request)
{
    return $request->user();
})->middleware('auth:sanctum')->name('user.loggedin');
