<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormExample;
use App\Http\Controllers\AJAXController;

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
    return view('welcome');
});

Route::get('/form', function () {
    return view('form');
});

Route::view('formData' ,'form');

Route::post('/form1', [FormExample::class,'saveuser']);
Route::view('Tablerecord' ,'Tablerecord');

Route::post('/Table', [FormExample::class,'show']);
Route::get('/TableDelete', [FormExample::class,'DeleteBocha']);

Route::view('/update' ,'update');
Route::post('/Tableupdate', [FormExample::class,'updateuser']);


Route::get('/Alerts', function () {
    return view('Alerts');
});

// sandip sir project db ctappdb Route //

Route::get('/subscriptiontable', function () {
    return view('ActiveSubscription');
});

Route::post('/subscriptionsave', [FormExample::class,'renewbocho']);

Route::get('/subscription', function () {
    return view('renewsubscription');
});


Route::get('/PaginationTable', function () {
    return view('pagination');
});

