<?php

use App\Http\Controllers\ApiAuthCotnroller;
use App\Http\Controllers\ApiProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//prefix=>api
Route::controller(ApiProductController::class)->group(function(){
    Route::middleware('api_Auth')->group(function(){
        Route::get("products","all");
        Route::get("product/{id}","show");
        Route::post("products","store");
        Route::put("edit/{id}","edit");
        Route::delete('delete/{id}',"delete");
    });

});
Route::controller(ApiAuthCotnroller::class)->group(function(){

    Route::post("register","register");
    Route::post("login","login");
    Route::post("logout","logout");

});