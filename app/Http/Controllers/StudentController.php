<?php

namespace App\Http\Controllers;
use App\Models\studentidtbl;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //fetch student with pagination
    public function fetchstudent()
    {
        //$users = DB::select("SELECT * FROM studentidtbl")->Paginate(10);
        $users=studentidtbl::Paginate(10);

        //return $users;// 
        //$data=compact('users');
       // $name="vaibhav";
        return view('tablepagination',compact('users'));
       // return view('TablePagination')->with($data);
        //return $users;
    }
}
