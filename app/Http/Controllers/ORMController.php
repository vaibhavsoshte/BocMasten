<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ORMController extends Controller
{
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
        $emptbl=DB::table('Employeetbl')->get();

        return $emptbl;
    }


    //select particular recored by id where

    public function fetchbyid(Request $request)
    {
        $emptbl=DB::table('Employeetbl')->where('designation',$request->designation)->get();

        return $emptbl;
    }

    //
}
