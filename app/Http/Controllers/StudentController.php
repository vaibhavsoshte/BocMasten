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
      
      //laravel eloquent join()

    public function fetchuser()
    {
        return $user= DB::table('studentidtbls')
                          ->join('attendedtbl','studentidtbls.id','=','attendedtbl.stu_id')
                          ->get();
       
    }

    public function insertattended(Request $request)
    {
        $dtro=$request->post("CustomField");
        //dd($_REQUEST);
        //echo $dtro;
       
        $bulla="ptr";
        foreach ($_REQUEST as $parm => $value)  {
            //echo "$parm = '$value'\n";
            if(str_starts_with($parm,$bulla))
            {
                $no=substr($parm,3);
               // echo "<br>";
               // echo $value;

               $insert=DB::statement("INSERT INTO attendedtbl(stu_id, attendeddate, remark) VALUES (?,?,?)",[$no,$dtro,$value]);
              // echo "Done........";
            }

        }
       if($insert==1)
       {
         return "Attended Done";
       }
       else{
           return "Eerro in  Mark Attended ";
       }
    }
}
