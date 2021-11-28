<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route("login");
});

Route::get("/login", [AuthController::class, "indexLogin"])->name("login");
Route::post("/login", [AuthController::class, "login"])->name("login.send");
Route::get("/register", [AuthController::class, "indexRegister"])->name("register");
Route::post("/register", [AuthController::class, "register"])->name("register.send");


Route::group(["middleware" => "login"], function() {
    Route::get("/home", [BackendController::class, "home"])->name("home");
    Route::get("/add", [BackendController::class, "indexAdd"])->name("add");
    Route::post("/add", [BackendController::class, "addUser"])->name("add.send");
    Route::get("/delete/{id}", [BackendController::class, "del"])->name("delete");
    Route::get("/logout", [AuthController::class, "logout"])->name("logout");
});



