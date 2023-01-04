<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormExample;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FessController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PatternsController;

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

// FormExample

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

Route::get('/userlist', [FormExample::class,'userlist']);


//date controller

Route::get('/todaydate', [DateController::class,'todaydate']);

Route::post('/validateage', [DateController::class,'validateage']);

Route::post('/dateformatconvertion', [DateController::class,'dateformatconvertion']);

Route::post('/checkdate', [DateController::class,'checkdate']);

Route::post('/login', [LoginController::class,'login']);

Route::get('/StoredProcedure', [DateController::class,'StoredProcedure']);




//student controller 

Route::get('/fetchstudent', [StudentController::class,'fetchstudent']);

Route::get('/fetchstudentbranch', [StudentController::class,'fetchstudentbranch']);

Route::get('/fetchbranch', [StudentController::class,'fetchbranch']);

Route::get('/fetchuser', [StudentController::class,'fetchuser']);

Route::post('/insertattended', [StudentController::class,'insertattended']);

Route::post('/searchstudent', [StudentController::class,'searchstudent']);

Route::post('/attendedrecord', [StudentController::class,'attendedrecord']);

Route::post('/recordbybranch', [StudentController::class,'recordbybranch']);


//fess controller

Route::post('/fetchfess', [FessController::class,'fetchfess']);

Route::post('/fetchfess',[FessController::class,'fetchfess']);

//UserController

Route::get('/parsingjson', [UserController::class,'parsingjson']);

// Route::get('/myPDF', function () {
//     return view('myPDF');
// });

Route::get('/myPDF', [UserController::class,'parsingjson']);

Route::get('/apiparsing', [AjaxController::class,'apiparsing']);

Route::get('/array', [DateController::class,'array']);

Route::post('/coronaapi', [AjaxController::class,'coronaapi']);

Route::get('/coronaapiinsert', [AjaxController::class,'coronaapiinsert']);

Route::get('/fetchallcountry', [AjaxController::class,'fetchallcountry']);

Route::get('/Exceptions', [TestController::class,'Exceptions']);

Route::post('/studentinsert', [TestController::class,'studentinsert']);

//PatternsController

Route::get('/pyramid', [PatternsController::class,'pyramid']);

Route::get('/triangle', [PatternsController::class,'triangle']);

Route::get('/Swapping', [PatternsController::class,'Swapping']);

Route::get('/arraypattern', [PatternsController::class,'arraypattern']);

Route::get('/arraylength', [PatternsController::class,'arraylength']);

Route::get('/arraycheckelement', [PatternsController::class,'arraycheckelement']);

Route::get('/greatestValue', [PatternsController::class,'greatestValue']);

Route::get('/sumofarray', [PatternsController::class,'sumofarray']);

Route::get('/reversestring', [PatternsController::class,'reversestring']);

Route::get('/tableno', [PatternsController::class,'tableno']);

Route::get('/arraytrial', [PatternsController::class,'arraytrial']);

Route::get('/binaryserach', [PatternsController::class,'binaryserach']);

Route::get('/arraycheck', [PatternsController::class,'arraycheck']);

Route::get('/error', [PatternsController::class,'error']);

Route::get('/factorialno', [PatternsController::class,'factorialno']);

Route::get('/Occurring', [PatternsController::class,'Occurring']);

Route::get('/stringOccurring', [PatternsController::class,'stringOccurring']);

Route::get('/uniqustring', [PatternsController::class,'uniqustring']);





//usercontroller

Route::get('/user', [UserController::class,'user']);

Route::get('/user', [UserController::class,'user']);



