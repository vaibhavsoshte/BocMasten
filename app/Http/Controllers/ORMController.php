<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ORMController extends Controller
{

    //static function

   public function activtylog()
   {
    
    date_default_timezone_set("Asia/Calcutta");  
    $user_id = "vaibhav";
    $time = date('Y-m-d H:i:s');
    
    $values = array('user_id' => $user_id,'time'=> $time,'activtyname'=>$activtyname);
    $activtylog=DB::table('useractivtylog')->insert($values);

   }

    //INNER JOIN 

    public function join()
    {
        $emp =DB::table('Employeetbl')
                ->join('Employeedetailstbl', 'Employeetbl.id', '=', 'Employeedetailstbl.id')
                //->select('articles.id','articles.title','articles.body','users.username', 'category.name')
                ->get(); 


                return $emp;
    }


    //LEFT JOIN 

    public function leftJoins()
    {

        $emp =DB::table('Employeetbl')
                ->leftJoin('Employeedetailstbl', 'Employeetbl.id', '=', 'Employeedetailstbl.id')
                ->get(); 

                return $emp;

    }

    //RIGHT JOIN

    public function rightJoins()
    {

        $emp =DB::table('Employeetbl')
                ->rightJoin('Employeedetailstbl', 'Employeetbl.id', '=', 'Employeedetailstbl.id')
                ->get(); 

                return $emp;

    }


    //FULL JOIN

   /* public function fullJoins()
    {
        $emp =DB::table('Employeetbl')
                ->fullJoin('Employeedetailstbl', 'Employeetbl.id', '=', 'Employeedetailstbl.id')
                ->get(); 

                return $emp;

    } */

    // select query

    public function fetchall()
    {
        //$emptbl=DB::table('Employeetbl')->paginate(4);
        $emptbl=DB::table('Employeetbl')->paginate()->get();

        return $emptbl;
    }


    //select particular recored by id where

    public function fetchbyid(Request $request)
    {
        $emptbl=DB::table('Employeetbl')->where('designation',$request->designation)->get();

        return $emptbl;
    }

    //update query

    public function updaterecored(Request $request)
    {
       $emptbl=DB::table('Employeetbl')
                   ->where('id',$request->id)
                   ->update(['sataus' => $request->sataus ,'designation'=>$request->designation]);

                
          if($emptbl==1){
              
              return response()->json(['success' => true,'message'=> 'Record Update successfully']);
          }
          else{
             
              return response()->json(['success' => false,'message'=> 'Error in Updating.....']);
          }
    }


    //delete query

    public function deleterecored(Request $request)
    {
          $emptbl=DB::table('Employeetbl')->where('id',$request->id)->delete();

          if($emptbl==1){
              
            return response()->json(['success' => true,'message'=> 'Record Delete successfully']);
           }
          else{
           
            return response()->json(['success' => false,'message'=> 'Error in Deleting.....']);
          }
    }

    public  function insertrecored(Request $request)
    {
       $values = array('empid' => $request->empid,'name' => $request->name,'sataus'=>$request->sataus,'designation'=>$request->designation);
       $emptbl = DB::table('Employeetbl')->insert($values);

       if($emptbl==1){
              
        return response()->json(['success' => true,'message'=> 'Record Add successfully']);
       }
      else{
       
        return response()->json(['success' => false,'message'=> 'Error in Adding Recored.....']);
      }
    }

    public function ordering()
    {

        $query = DB::table('studenttbl')->get();

        return $query;

    }


    public function limitoffset()
    {
        $users = DB::table('users')
                ->offset(10)
                ->limit(10)   //paginate  //limit //  
                ->get();

                return $users;
    }

    public  function having()
    {
        $activtyname = "property_info";
        $this->activtylog($activtyname);
        $this->activtylog();

        $users = DB::table('property_info')
                //->groupBy('architectural_style')
                //->having('architectural_style', '=', 'Bungalow')
                 ->where('pricing', '=', 500000.00)
                ->get();

                return $users;
    }

    public function arrattest()
    {
        $arr = array(1,2,3,4,5,2,5,3);
        // $a=2;
        for($i=0;$i<=count($arr);$i++)
        {
            if($arr[$i]==5)
            unset($arr[$i]);
        }
        

        return $arr;
    }
}