<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
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

        public static function show()
         {
             $Data=DB::select('select * from user');
            // dd($Data);
             return $Data;

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

      public function paginationdata(Request $request)
      {
         // $user = Employee::paginate(8);
         $users = DB::table('user')->paginate(3);
         //return view('pagination', compact('users'));
         
          return $users;
      }

      public static function updateuser(Request $request)
      {
         $id=$request->id;
         $email=$request->email;
         $password=$request->password;
         
        $updateuser = DB::update("UPDATE `user` SET `email`='$email',`password`='$password' WHERE `id`= '$id'");
        
        if($updateuser==1)
        {
            echo "Updating Record Succefully";
        }
         else
         {
            echo " Error in Updating............";
         }
      }

}
