<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ContactTypeController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAge;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contacts;
use App\Models\ContactType;
use App\Models\Products;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
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

 Route::get("/users/all" , [UserController::class ,"index"])->name("users.all");


 Route::get("/test" ,function(){
    //  $c =DB::table("brands")->get();
    $c= Brand::all();
    $b =$c->fresh();
    // dd($c->contains(11));
    // dd($c->find(1));
    dd($b);

 });

 Route::resource("/category"  ,CategoryController::class) ;//->middleware(CheckAge::class) ;
 Route::resource("/product"  ,ProductController::class);
 Route::resource("/supplier"  ,SupplierController::class);

 Route::get("/contact/create/{type}/{id}" ,[ContactsController::class ,"create"]);
 Route::post("/contact/{type}/{id}" ,[ContactsController::class ,"store"]);

 Route::post("/lang" ,function(Request $request){
    session()->put("locale" ,$request->locale);
   // dd($request->locale);
   // App::setLocale($request->locale);
// echo __("messages.Add Supplier");
   // dd( App::getLocale());
   return redirect()->back();
 });

//  Route::get("/test/{age}" ,function(){
//     echo "Test";
//  })->middleware(CheckAge::class) ;

//  Route::middleware([CheckAge::class])->prefix("/test")->group(function(){
//     Route::get("go/{age}" ,function(){
//        echo "Go";
//     });
//     Route::get("by/{age}" ,function(){
//       echo "Bye";
//    });
//  });

//  Route::middleware(["age"])->prefix("/xxx")->group(function(){
//    Route::get("go/{age}" ,function(){
//       echo "Go";
//    });
//    Route::get("by/{age}" ,function(){
//      echo "Bye";
//   });
// });