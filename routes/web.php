<?php

use App\Http\Controllers\TargetController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource("accounts", AccountController::class)->middleware(["auth", "verified"]);

Route::resource("targets", TargetController::class)->middleware(["auth", "verified"]);

Route::resource("categories", CategoryController::class)->middleware(["auth", "verified"]);

Route::prefix("users")->middleware(["auth", "verified"])->name("users.")->group(function () {
    Route::get("profile", ProfileController::class, "edit")->name("profile");
});