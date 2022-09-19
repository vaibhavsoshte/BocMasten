<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Redirect;
use Session;

class LoginController extends Controller
{
    //login

  public function login(Request $request)
  {
    $email=$request->post('email');
    $login = DB::select("SELECT  count(*) As user  FROM users WHERE email=? AND pass=? ",[$request->email,$request->pass]);
                    
    $subval= $login[0]->user;

    if($subval==1)
    {
       date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d H:i:s");
        $session_id = Session::getId();
        $logindetails=DB::statement("INSERT INTO `loginparticular` (`sessionid`,`userid`, `logintime`) VALUES (?,?,?)",[$session_id,$request->email,$date]);
        
        $id= DB::getPdo()->lastinsertid();
        if($logindetails==1)
        {
            Session::put('userid', $email);
            Session::put('id',$id);
            return Redirect('/UserHome');
           
        }
    }

  }

  //logout

  public function logout(Request $request)
  {
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d H:i:s");
    $value=$request->post('id');
    $value=$request->post('userid');
    $value = Session::get('id');
    Session::flush('id');
    Session::flush('userid');
    $logout=DB::statement("UPDATE loginparticular SET logouttime='$date' WHERE sr='$value'");

    if($logout==1)
    {
      return redirect('/Login');
    }
    
  }
  
  
}
