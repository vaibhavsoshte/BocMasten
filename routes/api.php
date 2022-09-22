<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormExample;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\LoginController;


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

 Route::post('/DeleteBocha', [FormExample::class,'DeleteBocha']);

 Route::post('/adduser', [FormExample::class,'saveuser']);

 Route::get('/update', [FormExample::class,'update']);

// Route::post('/update', [FormExample::class,'update']);

 Route::post('/updateuser', [FormExample::class,'updateuser']);

 Route::get('/ID', [FormExample::class,'Id']);

 Route::post('/checke', [FormExample::class,'checke']);

 Route::get('/fetchallbranch', [FormExample::class,'fetchallbranch']);

 Route::get('/fetchallstudent', [FormExample::class,'fetchallstudent']);

 Route::post('/updatestatus', [FormExample::class,'updatestatus']);

 Route::get('/table', [AjaxController::class,'table']);

 Route::get('/page', [FormExample::class,'page']);

 //Route::get('/curl', [FormExample::class,'DeleteBocha']);

 Route::get('/curlexample', function () {
    return view('curl');
});

Route::get('/pagination', [FormExample::class,'paginationdata']);

Route::get('/norecores', [FormExample::class,'norecores']);

Route::get('/casequery', [FormExample::class,'casequery']);

Route::post('/csvfile', [FormExample::class,'csvfile']);

Route::get('/save', [FormExample::class,'save']);

Route::post('/moveuploadedfile', [FormExample::class,'moveuploadedfile']);


//date controller

Route::get('/todaydate', [DateController::class,'todaydate']);

Route::post('/validateage', [DateController::class,'validateage']);

Route::post('/dateformatconvertion', [DateController::class,'dateformatconvertion']);

Route::post('/checkdate', [DateController::class,'checkdate']);

Route::post('/login', [LoginController::class,'login']);

Route::get('/StoredProcedure', [DateController::class,'StoredProcedure']);

Route::get('/userlist', [FormExample::class,'userlist']);





