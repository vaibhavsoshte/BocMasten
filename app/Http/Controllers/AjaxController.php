<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    //
    public static function table()
    {
        $Data=DB::select('select * from studenttbl');
       // dd($Data);
        return $Data;

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


    public function apiparsing()
    {
        $url = "https://newsapi.org/v2/everything?domains=wsj.com&apiKey=0e6a78cedb964a849ee2262dafef8adb";


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERPWD, "my_password");
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_USERAGENT, 'PostmanRuntime/7.29.2');
            //curl_setopt_array();
            $output = curl_exec($ch);
            $retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $info = curl_getinfo($ch);
            curl_close($ch);
            
             //echo $output;
            
             $object = json_decode($output);
            //print_r($object);
            // var_dump($object);
            //$count=0;
            //echo $object['totalResults'];
             //$value= $object['articles'];
             //print_r(array_keys($object));
            // print_r($object['source']);
              foreach($object as $key => $data) 
                { 
                    //echo $data->articles->author;
                   // echo $data['articles'] ."               ".$data['title'] ."\n";
                     if($key=="articles"){
                         //print_r($data);
                         foreach($data as $keyy => $dataa) {
                             //echo $keyy."<br>";
                             echo $dataa->author;
                         }
                     }
                     //echo $data['articles'];
                    /* foreach($data->articles as $au)
                        {
                          //echo $au;
                          var_dump($au);
                        } */
                    
                }       
    }


       public function coronaapi(Request $request)
       {
      

        $curl = curl_init();
        
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://corona-virus-world-and-india-data.p.rapidapi.com/api",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: corona-virus-world-and-india-data.p.rapidapi.com",
                "X-RapidAPI-Key: 63a7db4447mshf6b5a23d83f5aedp1418fcjsn048661fbf321"
            ],
        ]);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $count=0;
        

        curl_close($curl);
        echo '<table border=1px solid black;>';
        echo '<tr>';
        echo '<th>Sr No</th>';
        echo '<th>Country Name</th>';
        echo '<th>Total Cases</th>';
        echo '<th>Total Recovered</th>';
        echo '<th>Deaths</th>';
        echo '</tr>'; 
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else 
        {
           // echo $response;
           $obj = json_decode($response,true);

           //var_dump($obj);

           foreach($obj as $key => $corona)
           {
              // echo $key."<br>";
              // echo $corona["countries_stat"];

              if($key=="countries_stat")
              {

                foreach($corona as $key1 => $corona1)
                {
                   $country_name=  $corona1['country_name'];
                   $cases= $corona1['cases'];
                   $total_recovered= $corona1['total_recovered'];
                   $deaths= $corona1['deaths'];
                   //print_r($corona1);
                  

                   if($corona1['country_name']==$request->name)
                   {
                        $count++;
                        echo "<tr>";
                        echo  "<td>".$count."</td>";
                        echo "<td>".$country_name."</td>";
                        echo "<td>".$cases."</td>";
                        echo "<td>".$total_recovered."</td>";
                        echo "<td>".$deaths."</td>";
                        echo "</tr>";  
                   } 
                    else
                    {
                    // echo "<tr>";
                   //echo "<td  colspan='5'>"."There is no such Country Found"."</td>";
                  // echo "<tr>";  
                     //echo "No Recored Find";
                    } 
                }
               
              }
           }
          // echo "<td  colspan='5'>"."There is no such Country Found"."</td>";
           echo "</table>"; 
        }
       }



       public function coronaapiinsert()
       {
      

        $curl = curl_init();
        
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://corona-virus-world-and-india-data.p.rapidapi.com/api",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: corona-virus-world-and-india-data.p.rapidapi.com",
                "X-RapidAPI-Key: 63a7db4447mshf6b5a23d83f5aedp1418fcjsn048661fbf321"
            ],
        ]);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $count=0;
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else 
        {
           // echo $response;
           $obj = json_decode($response,true);

           //var_dump($obj);

           foreach($obj as $key => $corona)
           {
              // echo $key."<br>";
              // echo $corona["countries_stat"];

              if($key=="countries_stat")
              {

                foreach($corona as $key1 => $corona1)
                {
                   $country_name=  $corona1['country_name'];
                   $cases= $corona1['cases'];
                   $total_recovered= $corona1['total_recovered'];
                   $deaths= $corona1['deaths'];
                  
                  $insertapidata=DB::statement("INSERT INTO `coronadatatbl`(country_name, cases, total_recovered, deaths) VALUES (?,?,?,?)",[$country_name,$cases,$total_recovered,$deaths]);

                }
                if(isset($insertapidata))
                {
                    echo "Data Inserting ";
                }
              }
           }
          // echo "<td  colspan='5'>"."There is no such Country Found"."</td>";
           echo "</table>"; 
        }
       }
}
