<?php

use App\Http\Controllers\TargetController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\ProfileController;
use App\Http\Requests\ProfilePictureFormRequest;
use App\Models\User;
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

Route::resource("accounts", AccountController::class)->middleware(["auth", "verified"]);

Route::resource("targets", TargetController::class)->middleware(["auth", "verified"]);

Route::resource("categories", CategoryController::class)->middleware(["auth", "verified"]);

Route::resource("incomes", IncomeController::class)->middleware(["auth", "verified"]);

Route::resource("expenses", ExpenseController::class)->middleware(["auth", "verified"]);

Route::resource("transfers", TransferController::class)->middleware(["auth", "verified"]);

Route::prefix("users")->middleware(["auth", "verified"])->name("users.")->group(function () {
    Route::get("profile", ProfileController::class, "edit")->name("profile");
    Route::put("profile_picture_update", function (ProfilePictureFormRequest $request) {
        $path = $request->file("profile_picture")->store("profile_pictures");
        
        $user = User::where("id", request()->user()->id)->first();
        $user->profile_picture = $path;
        $user->save();

        return to_route("users.profile");
    })->name("profile_picture_update");
});