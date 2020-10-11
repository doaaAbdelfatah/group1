<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\HelloController;
use App\Models\Category;
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

// Route::get("/hello/{name}" ,"App\Http\Controllers\HelloController@hello");

Route::get("/hello/{fname}/{lname}" ,[HelloController::class ,"hello"])
->where(["fname"=>"[a-z]+"] ,["lname"=>"[A-Za-z]+"] );
Route::get('/', function () {
    return view('welcome');
});

Route::get("/sum/{x}/{y}" ,[HelloController::class ,"sum"] );
Route::get("/add/{x}/{y}" ,[HelloController::class ,"add"] )
        ->where(["x"=>"[0-9]+","y"=>"[0-9]+"]);

Route::view("/hh" ,"hi" ,["name"=>"ahmed"]);
Route::view("/home" ,"home" ,["data"=>"Test"] );
Route::view("/order" ,"orders" );


Route::get("/sub/{x?}/{y?}"  ,[HelloController::class ,"sub"]);
Route::get("/mul/{x?}/{y?}"  ,[HelloController::class ,"mul"]);

Route::get("/brand" , [BrandController::class , "index"])->name("brands");
Route::get("/brand/delete/{id}" , [BrandController::class , "delete"])
->where("id","[0-9]+")
->name("brands_delete");
Route::get("/brand/edit/{id}" , [BrandController::class , "edit"])
->where("id","[0-9]+")
->name("brands_edit");
Route::post("/brand" , [BrandController::class , "add"]);
Route::post("/brand/edit" , [BrandController::class , "update"]);

Route::get("/cat" ,function (){
    dd(Category::all());
} );