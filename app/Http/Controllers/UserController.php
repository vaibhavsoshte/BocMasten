<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //fetch all user
    public function fetchUser()
    {
        $users=User::all();

        return $users;
    }
}
