<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DateTime;
use Illuminate\Support\Facades\DB;

class DateController extends Controller
{
    //show current date
    

    public function todaydate(Request $request)
    {
        $dob=$request->get('dob');
        
        $today=date("y");
       

        echo "Today is " . date("Y"). "<br>";
        echo date("y"). "<br>";
        echo $dob ."<br>";
        
        $diff = date_diff($dob,$today,FALSE);
        echo 'Your age is '.$diff->format('%y');

    }

     //calculate age and check is above 18 or not

    public function validateage(Request $request)
    {
        $dateOfBirth = $request->post("dob");
        $today = date("d-m-Y");
        //echo "Date of Birthdday=>$dateOfBirth ";
       // echo "\n";
        
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        
       // echo "\n";
        echo 'Your age is '.$diff->format('%y');
        $age=$diff->format('%y');
        
    
        echo "\n";
        if($age>=18)
        {
           echo "\n";
           echo "Your Are Adult";
           
        }
        else
        {
           echo "\n";
           echo "Your Are Minor";
           
        }
    }

    public function dateformatconvertion(Request $request)
    {
       // $today = date("d-m-Y");

       // $today = date("F j, Y, g:i a");

        date_default_timezone_set("Asia/Kolkata");

        echo "Today is " . date("F j, Y, g:i a");

        echo "\n";

        $date = date('m/d/Y h:i:s a', time());

        echo $date;
    }

    public function checkdate(Request $request)
    {
       $dob=$request->post('dob');

       echo $dob;

        var_dump(checkdate(12, 31, 2000));

    }

    public function StoredProcedure(Request $request)
    {
      $StoredProcedure=DB::select("CREATE PROCEDURE SelectAllCustomers
      AS
      SELECT * FROM statestbl
      GO;");
      return $StoredProcedure;
    }
  
}
