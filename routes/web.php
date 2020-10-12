<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ContactTypeController;
use App\Http\Controllers\HelloController;
use App\Models\Category;
use App\Models\ContactType;
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
Route::view('/', "home");

Route::get("/brand" , [BrandController::class , "index"])->name("brands");
Route::get("/brand/delete/{id}" , [BrandController::class , "delete"])
->where("id","[0-9]+")
->name("brands_delete");
Route::get("/brand/edit/{id}" , [BrandController::class , "edit"])
->where("id","[0-9]+")
->name("brands_edit");
Route::post("/brand" , [BrandController::class , "add"]);
Route::post("/brand/edit" , [BrandController::class , "update"]);


// Route::get("/types" ,[ContactTypeController::class ,"index"])->name("contact_types");
// Route::post("/types" ,[ContactTypeController::class ,"store"]);
// Route::delete("/types/{id}" ,[ContactTypeController::class ,"destroy"]);

 Route::resource("/types" , ContactTypeController::class)->except(["create"]);

 Route::view("/users/all" , "users.index")->name("users.all");