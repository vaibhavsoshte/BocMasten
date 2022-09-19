<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class FormExample extends Controller
{

     // Insert Query

    public static function saveuser(Request $request)
    {
        // dd($request);
        //$email=$request->post('email');
        $email=$request->post('email');
        $password=$request->post('password');
        //$id=$request->post('id');
        $dbInsertStatusQuestion=DB::insert('INSERT INTO user (email, password) values (?,?)', [$email,$password]);

         if($dbInsertStatusQuestion==1)
           {
             echo "Inserted Successfully";
           }
            else
             {
             echo "Insertion Error";
             }
         return redirect('/Tablerecord');

     }

              // Select Query

        public function show()
         {
             //$Data=DB::select('select * from user');
            // return $Data;
            $data=User::paginate(5);
            return view('Tablerecord',compact('data'));
            //return $Data; 

         }

                //Delete Query

         public static function DeleteBocha(Request $request)
         {
             $dtro=$request->post('id');

             if(isset($dtro))
             {
              $finalResult = DB::delete("DELETE FROM user WHERE id=?",[$dtro]);
              //To chect if the query executed properly you may use the following syntax
             if($finalResult == 1)
             {
            //SUCCESS
               echo "Record Delete Successfully";
               //return redirect('/Tablerecord');
 
 
             } else
             {
              //ERROR
              echo "Error in Delete Record ";
 
             }
               
             }
             else
             {
                echo "No id Found";

             }

             

        }

           // update Query

        public static function update(Request $request)
        {

            $id=$request->userid;
            $email=$request->bla;
            $password=$request->password;

            //echo $id;
            //echo "$email";
            //echo "$password";
         
          
            $finalResult= DB::update("UPDATE `user` SET `email`='$email',`password`='$password' WHERE id='$id'");
            //echo $id;
            echo $email;
            echo $finalResult;
             if($finalResult == 1)
             {
            
               echo "Record Update Successfully.......";
               //return redirect('/Tablerecord');
 
 
             } else
             {
              
              echo "Error Update record...........";
  
             }
          
          
        }
        public static function table()
        {
            $Data=DB::select("SELECT s.stu_id,s.stu_name, sub.Sub_name ,m.mark AS bulla FROM student s INNER JOIN mark m ON s.stu_id=m.stu_id INNER JOIN subject sub ON sub.sub_id=m.sub_id");
           // dd($Data);
            return $Data;

        }
        public static function studentrecord()
        {
            $Data=DB::select('select * from student');
            // dd($Data);
             return $Data;

        }

        public static  function tablerecord1()
        {
            $Data=DB::select("SELECT s.stu_id,s.stu_name, sub.Sub_name ,m.mark AS bulla FROM student s INNER JOIN mark m ON s.stu_id=m.stu_id INNER JOIN subject sub ON sub.sub_id=m.sub_id");
           // dd($Data);
            return $Data;
        }
          // This is sandip sir project API DB ctappdb //
        public static function fetchAllsubscription()
        {
          $informa="{";
          $itersubscriptiontbl=0;
          $resultsubscription=DB::select("SELECT usertbl.userid, usertbl.usrname,usertbl.dob,usertbl.gender,usertbl.address,usertbl.mobno,subscriptiontbl.courseid,subscriptiontbl.startdt,subscriptiontbl.enddt
          FROM usertbl
          INNER JOIN subscriptiontbl ON usertbl.userid=subscriptiontbl.userid  WHERE subscriptiontbl.enddt >= CURDATE()");
          if(count($resultsubscription))
          {
              $informa=$informa."\"ActiveSubscription\":[";
          }

          foreach ($resultsubscription as $subscription)
          {

              if($itersubscriptiontbl>0)
              {
                  $informa=$informa.",";
              }
              $informa=$informa."{
                                  \"UserID\":\"". $subscription->userid."\",
                                  \"UserName\":\"". $subscription->usrname."\",
                                  \"DOB\":\"".$subscription->dob."\",
                                  \"Gender\":\"".$subscription->gender."\",
                                  \"Address\":\"".$subscription->address."\",
                                  \"Mobile\":\"".$subscription->mobno."\",
                                  \"CourseID\":\"".$subscription->courseid."\",
                                  \"StartDate\":\"".$subscription->startdt."\",
                                  \"EndDate\":\"".$subscription->enddt."\"";

                                  $itersubscriptiontbl= $itersubscriptiontbl+1;
                                  $informa=$informa."}";
          }
                 if(count($resultsubscription))
                {

                }
                  $informa=$informa."]";
                  $informa=$informa."}";
                  //echo $informa;
                 return $resultsubscription;
                  return $informa;
      }



      // update subscription//
      public static function renewbocho()
      {

          $userid=$_REQUEST["userid"];
          $usrname=$_REQUEST["usrname"];
          $startdt=$_REQUEST["startdt"];
          $enddt=$_REQUEST["enddt"];


          $finalResult= DB::update("UPDATE subscriptiontbl SET startdt = '$startdt', enddt ='$enddt' WHERE userid = '$userid'");
          if($finalResult == 1)
          {
         //SUCCESS
            //echo "<script>alert('Record Update Successfully');</script>";
            //echo  $finalResult;
            return view('ActiveSubscription');


          }
          else
          {
            //echo "<script>alert('Record not Update Successfully');</script>";
           // echo  $finalResult;
            return view('subscriptiontable');
          }
      }
       // pagination 

      public static function paginationdata()
      {
         // $user = Employee::paginate(8);
         $users = DB::table('user')->paginate(4);
         //return view('pagination', compact('users'));
         
          return $users;
      }

      public static function page()
      {
        $data = "vaibhav";

        $array= compact('data');

        return view('test',['data'->$data]);

        //return $array;

      }

      public static function updateuser(Request $request)
      {
         $id=$request->post('id');
         $email=$request->post('email');
         $password=$request->post('password');
         
        $updateuser = DB::statement("UPDATE `user` SET `email`='$email',`pass`='$password' WHERE `id`= '$id'");
        
        if($updateuser==1)
        {
            echo "Updating Record Succefully $email";
        }
         else
         {
            echo " Error in Updating............";
         }
      } 

      public static function updatestatus(Request $request)
      {
        $id=$request->post('id');
        $email=$request->post('email');
        $pass=$request->post('password');
        $statu="disabled";
         
        $updatestatus=DB::statement("UPDATE `user` SET `email`=?, `pass`=? , `statu`=? WHERE `id`= ?" ,[$email,$pass,$statu,$id]);
        
        if($updatestatus==1)
        {
          echo "$email Approved Succefully";
        }
        else
        {
          echo "Error in Updating.........";
        }

      }
        //New Registration Number Generated API

      public function Id(Request $request)
      {
      
         $lastid =DB::select("SELECT MAX(id) AS id FROM `studentidtbl`");
         $subval= $lastid[0]->id; //array index value Access
         $add=$subval+1;
         $branch=$request->get('branch');
         $studentname=strtoupper($request->get('studentname'));
         $today = date("dmy"); 
         
         $id = strtoupper(substr($branch, 0,2)).'-'.date('dmy').'/'.rand(10,100).$add;
         //echo $id; 
         //return $lastid;
        $check=DB::select("SELECT * FROM `studentidtbl` WHERE `registrationno`='$id'");
        if($check==1)
        {
           echo "Registration Number already Exists";

        }
        else
        {
          
        $makeid=DB::insert("INSERT INTO `studentidtbl`(`registrationno`,`branch`, `studentname`) VALUES (?,?,?)",[$id,$branch,$studentname]);

        if($makeid==1)
        {
           //echo "\n";
           echo "New Registration Number Generated $id";
        }
        else
        {
           echo "Error In Registration Number";
        }
        }
        
      }
      
      public function checke(Request $request)
      {
        $registrationno=$request->post('registrationno');
        echo $registrationno;

        $check=DB::select("SELECT COUNT(registrationno) AS user FROM `studentidtbl` WHERE `registrationno`='$registrationno'");
        echo "\n";
        $user= $check[0]->user;
        //echo $user;
        if($user==1)
        {
          echo"\n";
          echo "Registration Number already Exists";
        }
        else
        {
          echo "Registration Number not Found $registrationno";   
        }
        
      }

     public static function fetchallbranch()
     {
         $fetchallbranch=DB::select("SELECT * FROM `branchtbl`");

         return $fetchallbranch;
     }

     public static function fetchallstudent()
     {
       $fetchallstudent=DB::select("SELECT * FROM `studentidtbl` LIMIT 100 OFFSET 0");

       return $fetchallstudent;
     }

     public static function norecores()
     {

       $norecores=DB::select("SELECT COUNT(id) AS id FROM `user`");
       
       $subval= $norecores[0]->id;
       $page=Ceil($subval/4);
        
       return $page;
       //return $subval;
       //return $norecores;
      // echo $page;


     }
      
     //switch case  

     public function casequery(Request $request)
     {
       $case=$request->get('case');
       $no=$request->get('no');
       $statesname=$request->get('statesname');

       switch ($case) {
        case "statesname":
          //echo "Your Request is No $no";
          $statestbl=DB::statement("INSERT INTO `statestbl`(`statesname`) VALUES (?)",[$statesname]);
          if($statestbl==1)
          {
             echo "States Name $statesname is Adding Succefully";
          }
          else
          {
             echo "Error In Addiong";
          }
          break;
        case "no":
          //echo "Your Request is States Name $statesname";
          $numbertbl=DB::statement("INSERT INTO `numbertbl`(`no`) VALUES (?)",[$no]);
          if($numbertbl==1)
          {
            echo "The No $no is Adding Succefully";
          }
          else
          {
             echo "Error In Adding";
          }
          break;
          default:
          echo "No Input Given";
     }
   }

    //csv file import API

   public static function csvfile(Request $request)
   {
    if ($file = $request->file('file')) 
    {
      $destinationPath = 'storage/';
      $workImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
      $file->move($destinationPath, $workImage);
      $input['file'] = "$workImage";

      $finalpath=$destinationPath.$workImage;

      //echo $finalpath;
     
    if (($handle = fopen(public_path()."/".$finalpath, "r")) !== FALSE) 
    //if (($handle = fopen($datax, "r")) !== FALSE) 
     { 
       
      while (($data = fgetcsv($handle,",")) !== FALSE) 
      { 
         $users[]=$data;
      }
      fclose($handle);
    }

     echo "<pre>";
     //print_r($users);
     
    echo '<table border=1px solid black;>';
    echo '<tr>';
    echo '<th>Username</th>';
    echo '<th>Email</th>';
    echo '<th>Mobile</th>';
    echo '<th>SignupDate</th>';
    echo '<th>Promotion</th>';
    echo '</tr>'; 
    
    
    $i=0;
    //while($Data==0)
    foreach($users as $data)
    {
       $i++;
       echo "<tr>";
           echo  "<td>".$data[0]."</td>";
           echo "<td>".$data[1]."</td>" ;
           echo "<td>".$data[2]."</td>";
           echo "<td>".$data[3]."</td>" ;
           echo "<td>".$data[4]."</td>" ;
 
 
       echo "</tr>";
 
    }
    echo "</table>";
    } 
   } 
    //upload image

   public static function store(Request $request)
  {   

    if ($image = $request->file('image')) 
    {
      $destinationPath = 'images/';
      $workImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
      $image->move($destinationPath, $workImage);
      $input['image'] = "$workImage";

      $finalpath=$destinationPath.$workImage;
      $rootpath=public_path().$finalpath;
      // echo $workImage;
      $uploadimage=DB::statement("INSERT INTO `imagetbl`(`image`) VALUES (?)",[$workImage]);
     
      if($uploadimage==1)
      {
        echo "$workImage Image Uploading successfully.......";
      }
      else
      {
        "\n Eorror  In Uploading......";
      }
    }
    else
    {
      echo "image is not Selected ";
    }
  } 

  //moving file in floder
  
  public static function moveuploadedfile(Request $request)
  {
    if ($file = $request->file('file')) 
    {
      $destinationPath = 'storage/';
      $workImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
      $file->move($destinationPath, $workImage);
      $input['file'] = "$workImage";

      $finalpath=$destinationPath.$workImage;
      //$rootpath=storage_path().$finalpath;
       echo $workImage;
     // $uploadimage=DB::statement("INSERT INTO `imagetbl`(`image`) VALUES (?)",[$workImage]);
     
      if($rootpath=storage_path().$finalpath)
      {
        echo "File Moving successfully.......";
      }
      else
      {
        "\n Eorror  In Uploading......";
      }
    }
    else
    {
      echo "image is not Selected ";
    }
  }
}