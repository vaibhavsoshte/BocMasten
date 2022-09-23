<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormExample;
use App\Http\Controllers\AJAXController;
use App\Http\Controllers\LoginController;

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

Route::get('/Test', function () {
    return view('test');
});

Route::get('/Table', function () {
    return view('tableapi');
});

//Route::get('/Tablerecord', function () {
    //return view('Tablerecord');
//});

Route::view('formData' ,'form');

Route::post('/form1', [FormExample::class,'saveuser']);
Route::view('Tablerecord' ,'Tablerecord');

Route::post('/Table', [FormExample::class,'show']);
Route::get('/TableDelete', [FormExample::class,'DeleteBocha']);

Route::view('/update' ,'update');
Route::post('/updateuser', [FormExample::class,'updateuser']);

Route::get('/AJAX', function () {
    return view('Ajax');
});


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

Route::get('/TablePagination', function () {
    return view('tablepagination');
}); 

Route::get('/NewStudentRegistration', function () {
    return view('newstudent');
});
Route::post('/newstudent', [FormExample::class,'Id']);

Route::get('/ListofStudent', function () {
    return view('liststudent');

});

Route::get('/norecores', [FormExample::class,'norecores']);

Route::get('/userlist', [FormExample::class,'userlist']); 

Route::get('/paginationdata', [FormExample::class,'paginationdata']);

Route::post('/updatestatus', [FormExample::class,'updatestatus']);

Route::get('/CSVtoArray', function () {
    return view('csvtoarray');
});

Route::post('/csvfile', [FormExample::class,'csvfile']);

Route::get('/CSV', function () {
    return view('csv');
});

Route::get('/ImageUpload', function () {
    return view('imageupload');
});

Route::post('/imagesave', [FormExample::class,'store']);

Route::get('/Login', function () {
    return view('LoginPage');
});

Route::get('/UserHome', function () {
    return view('home');
});

Route::group(['middleware'=>"web"],function()
{
    Route::post('/loginaction', [LoginController::class,'login']);

    Route::get('/logoutaction', [LoginController::class,'logout']);

});

