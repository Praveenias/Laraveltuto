<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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



Route::get("/",[HomeController::class,"index"]);

Route::get("/redirects",[HomeController::class,"redirects"]);

Route::get("/user",[AdminController::class,"user"]);

Route::get("/deleteuser/{id}",[AdminController::class,"deleteuser"]);


Route::get("/foodmenu",[AdminController::class,"foodmenu"]);

Route::post("/uploadfood",[AdminController::class,"upload"]);

Route::get("/deletefoodmenu/{id}",[AdminController::class,"deletefoodmenu"]);

Route::get("/getfoodmenu/{id}",[AdminController::class,"getfoodmenu"]);

Route::post("/updatefood/{id}",[AdminController::class,"updatefood"]);


Route::post("/reservation",[AdminController::class,"reservation"]);

Route::get("/getreservation",[AdminController::class,"getreservation"]);


Route::get("/foodchef",[AdminController::class,"foodchef"]);

Route::post("/createchef",[AdminController::class,"createchef"]);

Route::get("/deletefoodchef/{id}",[AdminController::class,"deletefoodchef"]);


Route::post("/addcard/{id}",[HomeController::class,"addcard"]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
