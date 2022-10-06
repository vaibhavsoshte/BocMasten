<?php

namespace App\Http\Controllers;
use App\Models\studentidtbl;
use App\Models\branchtbl;

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

    //student attended 
    public function fetchstudentbranch(Request $request)
    {
        $dtro=$request->post('branch');
        //echo $dtro;
        $results["data"] =studentidtbl::where('branch', '=', $dtro)->get();
        return $results;

    }
   
     //get all branch
    public function fetchbranch()
    {
       
        $result =branchtbl::all();
        return $result;

    }
}
