<?php

namespace App\Http\Controllers;
use App\Models\studentidtbl;

use App\Models\branchtbl;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
        $count=0;
        $absent=0;
        try
         {
            foreach ($_REQUEST as $parm => $value)  {
                //echo "$parm = '$value'\n";
                if(str_starts_with($parm,$bulla))
                {
                    $no=substr($parm,3);
                   // echo "<br>";
                   // echo $value;
                   if($value=='Present')
                   $count=$count+1;
                   if($value=='Absent')
                   $absent=$absent+1;
    
                   $insert=DB::statement("INSERT INTO attendedtbl(stu_id, attendeddate, remark) VALUES (?,?,?)",[$no,$dtro,$value]);
                  // echo "Done........";
                }
    
            }
           
           if($insert==1)
           {
             return "Attended Done \n\n  $count Student Present \n\n $absent Student Absent";
             // echo "$count Student Present";
             // echo "\n";
              //echo "$absent Student Absent";
           }
           else
           {
               return "Eerro in  Mark Attended ";
           } 

         }
         catch(\Illuminate\Database\QueryException $ex) {
            //echo 'Message: ' .$ex->getMessage();
            echo 'Message: Attended already Taken ';
          }
       
    }

     //orm query with like with specify

    public function searchstudent(Request $request)
    {
        try
        {
            $txtname=$request->post('txtname');
            //$student = studentidtbl::where('studentname', '=',$txtname)->get();
            $student = studentidtbl::Where('studentname', 'like', '%' . $txtname . '%')->get(); 
            //return $student;
            $bull=0;
            echo "<ul class=\"list-group\">";
            foreach($student as $stu)
            {
                //$name=$stu->studentname;
                //$no=$stu->registrationno;
                
                echo "<li class=\"list-group-item\" id=\".$stu->registrationno.\">".$stu->studentname."</li>";
               $bull++;
            }
            if($bull==0)
            {
                echo "<li class=\"list-group-item\">No  Student Name Found</li>";
            }

            echo "</ul>";

        }
        catch(\Illuminate\Database\QueryException $ex) 
        {
            echo 'Message: ' .$ex->getMessage();
        }
    }

    public function attendedrecord(Request $request)
    {
        
        $attendedrecord=DB::select("SELECT * FROM studentidtbls s ,attendedtbl a WHERE s.studentname=? && a.attendeddate BETWEEN ? AND ?  AND s.id=a.stu_id;",[$request->txtname,$request->startdate,$request->enddate]);
        //return $attendedrecord;

        echo "<table border=5 class=\"table \ border bg-light\">";
        echo "<tr>
        <th class=\"thead-dark\"> Sr.No</th>
        <th> Date Of Attended </th>
        <th>Remark</th>
       
        </tr>";
        $i=0;
        $count=0;
        $percentage=0;
        foreach($attendedrecord as $data)
        {
           $i++;
           echo "<tr>";
               echo "<td>".$i."</td>";
               echo "<td>".$data->attendeddate."</td>" ;
               echo "<td>".$data->remark."</td>";
               
               //echo "<td>".$data[4]."</td>" ;
    
           echo "</tr>";
          if($data->remark=='Present')
          {
            $count=$count+1;
            //echo $count;
          }
          
        }
        $percentage= $count*100/$i;
       
        //echo $percentage;
        if($i==0)
        {
            echo "<tr>";
            echo "<td>NO Record Found</td>";
            echo "</tr>";
        }
        echo "</table>";

        echo "<table border=5 class=\"table \ border bg-light\">";
        echo "<tr>
       
        <th>Student Name</th>
        <th> Registration No </th>
        <th>Total Attended (%)</th>
       
        </tr>";
        echo "<td>".$data->studentname."</td><br>";
        echo "<td>".$data->registrationno."</td><br>";
        echo "<td>".$percentage."</td>"; 
    }

    public function recordbybranch(Request $request)
    {
        $branch=$request->post('branch');
        $date=$request->post('date');

        $recordbybranch=DB::select("SELECT * FROM studentidtbls s,attendedtbl a WHERE s.branch=? && a.attendeddate=? and s.id=a.stu_id",[$branch,$date]);
        //return $recordbybranch;
        $i=0;
        $count=0;
        $Absent=0;
        echo "<table table-bordered class=\"table \ border bg-light\">";
        echo "<thead class=\"thead-dark\">";
        echo "<tr>
        <th class=\"thead-dark\"> SR.No</th>
        <th> STUDENT NAME </th>
        <th> REGISTRATION NO  </th>
        <th>REMARK</th>
        </thead>
        </tr>";

        foreach($recordbybranch as $data)
        {
           $i++;
           echo "<tr>";
               echo "<td>".$i."</td>";
               echo "<td>".$data->studentname."</td>" ;
               echo "<td>".$data->registrationno."</td>" ;
               echo "<td>".$data->remark."</td>";
               
               //echo "<td>".$data[4]."</td>" ;
    
           echo "</tr>";
          if($data->remark=='Present')
          {
            $count=$count+1;
            //echo $count;
          }
          if($data->remark=='Absent')
          {
            $Absent=$Absent+1;
          }
        }
          if($i==0)
          {
              echo "<tr>";
              echo "<td>NO Record Found</td>";
              echo "</tr>";
          }
          echo "</table>";

          echo "<table border=5 class=\"table \ border bg-light\">";
          echo "<tr>
         
         
          <th> Number of Student Present </th>
          <th> Number of Student Absent </th>
         
          </tr>";
         
          echo "<td>".$count."</td><br>";
          echo "<td>".$Absent."</td>"; 
          
       
    }


   
}
