<?php

use App\Http\Controllers\Apis\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//http://127.0.0.1:8000/api/test
Route::get('test',function(){
    echo"test";
});

Route::group(['prefix' => 'products'],function(){
    Route::get('/',[ProductController::class,'index']);
    Route::get('/create',[ProductController::class,'create']);
    Route::get('/edit/{id}',[ProductController::class,'edit']);
    Route::post('/store',[ProductController::class,'store']);
    Route::put('/update/{id}',[ProductController::class,'update']);
    Route::delete('/destroy/{id}',[ProductController::class,'destroy']);
});

