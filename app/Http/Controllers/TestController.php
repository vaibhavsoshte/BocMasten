<?php

namespace App\Http\Controllers;

use App\Exceptions\DivisionByZeroExceptionx;
use Illuminate\Http\Request;
use Illuminate\ArithmeticException;
use Illuminate\Support\Facades\DB;
use \Exception;


class TestController extends Controller
{
    //

   public function Exceptions()
   {
       $a=20;
       $b=0;

       try
       {
           if($b==0)
           {
            throw new \App\Exceptions\DivisionByZeroExceptionx("Can't Divide by zero");
           }
          $div=$a/$b;

          echo "Division :".$div;
       }
       catch(DivisionByZeroExceptionx $err)
       { 
           //echo "got error-> $e";
           return response()->json(['Status' => 'Failure', 'Details' => $err]);
       } 
    //    catch(Exception $e) {return response()- 
    //     echo "got $e";
    //    }
   }
   public function studentinsert(Request $request)
   {
       try
       {
        $sql=DB::statement("INSERT INTO bochatbl(bochaname) VALUES (?)",[$request->bochaname]);
        
         if($sql==1)
         {
            return response()->json(['Status' => 'Success', 'Details' => 'Bocha Added']);
         }
         else
         {
            return response()->json(['Status' => 'Failure', 'Details' => 'Failed due to DB violations']); 
         }

       }
       catch (\Illuminate\Database\QueryException $ex)
       {
           return response()->json(['Status' => 'Failure', 'Details' => $ex]);
          //echo $ex;
       }
       
   }
  
}
