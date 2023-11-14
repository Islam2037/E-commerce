<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Customer;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\Is_admin;
use Illuminate\Support\Facades\Auth;
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

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
// });
Route::middleware("auth")->group(function()
{
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

Route::get("redirect",[HomeController::class,"redirect"]);
Route::controller(ProductController::class)->group(function(){

        Route::middleware("auth","is_Admin")->group(function(){
            Route::get("products/create","create");
            Route::post("products","store");
            Route::get("products","allProducts")->name("all");
            Route::get("products/show/{id}","show")->name("show");
            Route::get("editProduct/{id}","edit")->name("edit");
            Route::put("updateProduct/{id}","update")->name("update");
            Route::delete("deleteProduct/{id}","deleteProduct")->name("delete");

        });

    });
    Route::middleware("auth","is_Admin")->group(function(){
    Route::controller(CategoryController::class)->group(function(){
        Route::get("categories/create","create");
        Route::post("categories","store");
        Route::get("categories","allCategories")->name("all");
        Route::get("categories/show/{id}","show")->name("show");
        Route::get("editCategory/{id}","edit")->name("edit");
        Route::put("updateCategory/{id}","update")->name("update");
        Route::delete("deleteCategory/{id}","deleteProduct")->name("delete");

    });
});
Route::get("changeLang/{lang}",function($lang){
    if($lang=="ar")
    {
        session()->put('lang','ar');
    }
    else
    {
        session()->put('lang','en');
    }
    return redirect()->back();

});

Route::controller(CustomerController::class)->group(function(){
    Route::get("/","all");
    Route::get("allProduct/show/{id}","show");
    Route::get("search","search");
    Route::post("addToCard/{id}","addToCard")->middleware("auth");
    Route::get("myCard","showCard")->middleware("auth");
    Route::post("makeOrder","makeOrder")->middleware("auth");
    Route::get("deleteProduct/{id}","deleteProduct")->middleware("auth");



});





