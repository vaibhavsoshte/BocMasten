<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\DB;

class FormExample extends Controller
{

     // Insert Query

    public function saveuser(Request $request)
    {
        // dd($request);

        $email=$request->post('email');
        $password=$request->post('password');
        //$id=$request->post('id');
        $dbInsertStatusQuestion=DB::insert('INSERT INTO user (email, password) values (?,?)', [$email,$password]);

         if($dbInsertStatusQuestion)
           {
             echo "<script>alert('Inserted Successfully');</script>";
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
             $dtro=$request->email;

             $finalResult = DB::delete("DELETE FROM user WHERE email=?",[$dtro]);
             //To chect if the query executed properly you may use the following syntax
            if($finalResult == 1)
            {
           //SUCCESS
             // echo "<script>alert('Record Delete Successfully');</script>";
              return redirect('/Tablerecord');


            } else
            {
             //ERROR
            }

        }

           // update Query

        public function update(Request $request)
        {

            $id=$request->id;
            $email=$request->email;
            $password=$request->password;

            $finalResult= DB::update("UPDATE user set email = '$email', password ='$password' where id = $id");
            if($finalResult == 1)
            {
           //SUCCESS
              echo "<script>alert('Record Update Successfully');</script>";
              return redirect('/Tablerecord');


            } else
            {
             //ERROR
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

}
