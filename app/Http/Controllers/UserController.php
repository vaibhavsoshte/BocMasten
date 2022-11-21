<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class UserController extends Controller
{
    //fetch all user
    public function fetchUser()
    {
        $users=User::all();

        return $users;
    }


    public function parsingjson()
    {
         $count=0;
         $path = storage_path()."/airports.json"; 

         $json = json_decode(file_get_contents($path), true); 
       
        echo '<table border=1px solid black;>';
        echo '<tr>';
       // echo '<th>Sr No</th>';
        echo '<th>Code</th>';
        echo '<th>Airport Name</th>';
        echo '</tr>'; 
        //  foreach($json as $name => $data) 
        //   {
        //     if($data['country']=="India" && $data['state']=="Maharashtra")
        //     {
        //        // echo $data['code'] ."               ".$data['name'] ."\n";
        //        $count++;
        //         echo "<tr>";
        //         echo  "<td>".$count."</td>";
        //         echo "<td>".$data['code']."</td>" ;
        //         echo "<td>".$data['name']."</td>";
        //         echo "</tr>";  
        //     }    
        //   }
          //echo "<tr>" ."Total No of Airport:".$count."</tr>";
           echo "</table>"; 
           $table ="</table>"; 
          //echo "Total No of Airport:".$count;
           $pdf = PDF::loadView('myPDF',compact('json','count'));
          return $pdf->download('Airport.pdf');
    }
}
