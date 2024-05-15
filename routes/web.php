<?php

use App\Http\Controllers\Web\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
    return view('welcome');
});

Route::prefix('auth')->group(function ()
{
    Route::get("login", [LoginController::class, "index"])->name("web.auth.login");
});
