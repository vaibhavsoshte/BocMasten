<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //fetch student with pagination
    public function fetchstudent()
    {
        $users = DB::table('studentidtbl')->Paginate(15);
        //return $users;
        //$data=compact('users');
        return view('TablePagination',compact("users"));
    }
}
