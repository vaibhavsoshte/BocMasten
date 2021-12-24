<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AJAXController extends Controller
{
    public static function show(Request $request)
    {
        $Data=DB::select('select * from student');
       // dd($Data);
       // return $Data;

    echo "<table border=5 class=\"table \ border bg-light\">
    <tr>
     <th>Student ID</th>
     <th>Student Name</th>
     <th>Email</th>
     <th>Mobile</th>

   </tr>";
   $i=0;
   //while($Data==0)
   foreach($Data as $r)
   {
      $i++;
      echo "<tr>";
          echo  "<td>" . $r->stu_id. "</td>";
          echo "<td>" . $r->stu_name. "</td>" ;
          echo "<td>" . $r->stu_email. "</td>";
          echo "<td>" .$r->stu_mobile. "</td>" ;


      echo "</tr>";

   }
   echo "</table>";

    }

}
