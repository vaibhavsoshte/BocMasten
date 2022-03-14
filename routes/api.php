<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormExample;
use app\http\Controllers\AJAXController;


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

 Route::get('/user', [FormExample::class,'show']);

 Route::get('/subscription', [FormExample::class,'fetchAllsubscription']);

 Route::get('/DeleteBocha', [FormExample::class,'DeleteBocha']);

 Route::post('/adduser', [FormExample::class,'saveuser']);

 Route::get('/update', [FormExample::class,'update']);

// Route::post('/update', [FormExample::class,'update']);

 Route::post('/updateuser', [FormExample::class,'updateuser']);


 


 //Route::get('/curl', [FormExample::class,'DeleteBocha']);

 Route::get('/curlexample', function () {
    return view('curl');
});

Route::get('/pagination', [FormExample::class,'paginationdata']);


