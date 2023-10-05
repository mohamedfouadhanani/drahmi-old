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

Route::prefix("users")->middleware(["auth", "verified"])->name("users.")->group(function () {
    Route::get("profile", [ProfileController::class, "edit"])->name("profile");
    Route::put("profile_picture_update", function (ProfilePictureFormRequest $request) {
        $path = $request->file("profile_picture")->store("profile_pictures");
        
        $user = User::where("id", request()->user()->id)->first();
        $user->profile_picture = $path;
        $user->save();

        return to_route("users.profile");
    })->name("profile_picture_update");
});

Route::prefix("accounts")->middleware(["auth", "verified"])->name("accounts.")->group(function () {
    Route::get("/", [AccountController::class, "index"])->name("index");
    Route::get("/create", [AccountController::class, "create"])->name("create");
    Route::post("/", [AccountController::class, "store"])->name("store");
    Route::get("/{account}", [AccountController::class, "show"])->name("show")->middleware("owner:account");
    Route::get("/{account}/edit", [AccountController::class, "edit"])->name("edit")->middleware("owner:account");
    Route::put("/{account}", [AccountController::class, "update"])->name("update");
    Route::delete("/{account}", [AccountController::class, "destroy"])->name("destroy")->middleware("owner:account");
});

Route::prefix("targets")->middleware(["auth", "verified"])->name("targets.")->group(function () {
    Route::get("/", [TargetController::class, "index"])->name("index");
    Route::get("/create", [TargetController::class, "create"])->name("create");
    Route::post("/", [TargetController::class, "store"])->name("store");
    Route::get("/{target}", [TargetController::class, "show"])->name("show")->middleware("owner:target");
    Route::get("/{target}/edit", [TargetController::class, "edit"])->name("edit")->middleware("owner:target");
    Route::put("/{target}", [TargetController::class, "update"])->name("update");
    Route::delete("/{target}", [TargetController::class, "destroy"])->name("destroy")->middleware("owner:target");
});

Route::prefix("categories")->middleware(["auth", "verified"])->name("categories.")->group(function () {
    Route::get("/", [CategoryController::class, "index"])->name("index");
    Route::get("/create", [CategoryController::class, "create"])->name("create");
    Route::post("/", [CategoryController::class, "store"])->name("store");
    Route::get("/{category}", [CategoryController::class, "show"])->name("show")->middleware("owner:category");
    Route::get("/{category}/edit", [CategoryController::class, "edit"])->name("edit")->middleware("owner:category");
    Route::put("/{category}", [CategoryController::class, "update"])->name("update");
    Route::delete("/{category}", [CategoryController::class, "destroy"])->name("destroy")->middleware("owner:category");
});

Route::prefix("incomes")->middleware(["auth", "verified"])->name("incomes.")->group(function () {
    Route::get("/", [IncomeController::class, "index"])->name("index");
    Route::get("/create", [IncomeController::class, "create"])->name("create");
    Route::post("/", [IncomeController::class, "store"])->name("store");
    Route::get("/{income}", [IncomeController::class, "show"])->name("show")->middleware("owner:income");
    Route::get("/{income}/edit", [IncomeController::class, "edit"])->name("edit")->middleware("owner:income");
    Route::put("/{income}", [IncomeController::class, "update"])->name("update");
    Route::delete("/{income}", [IncomeController::class, "destroy"])->name("destroy")->middleware("owner:income");
});

Route::prefix("expenses")->middleware(["auth", "verified"])->name("expenses.")->group(function () {
    Route::get("/", [ExpenseController::class, "index"])->name("index");
    Route::get("/create", [ExpenseController::class, "create"])->name("create");
    Route::post("/", [ExpenseController::class, "store"])->name("store");
    Route::get("/{expense}", [ExpenseController::class, "show"])->name("show")->middleware("owner:expense");
    Route::get("/{expense}/edit", [ExpenseController::class, "edit"])->name("edit")->middleware("owner:expense");
    Route::put("/{expense}", [ExpenseController::class, "update"])->name("update");
    Route::delete("/{expense}", [ExpenseController::class, "destroy"])->name("destroy")->middleware("owner:expense");
});

Route::prefix("transfers")->middleware(["auth", "verified"])->name("transfers.")->group(function () {
    Route::get("/", [TransferController::class, "index"])->name("index");
    Route::get("/create", [TransferController::class, "create"])->name("create");
    Route::post("/", [TransferController::class, "store"])->name("store");
    Route::get("/{transfer}", [TransferController::class, "show"])->name("show")->middleware("owner:transfer");
    Route::get("/{transfer}/edit", [TransferController::class, "edit"])->name("edit")->middleware("owner:transfer");
    Route::put("/{transfer}", [TransferController::class, "update"])->name("update");
    Route::delete("/{transfer}", [TransferController::class, "destroy"])->name("destroy")->middleware("owner:transfer");
});