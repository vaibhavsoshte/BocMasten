<?php

namespace App\Exceptions;

use Exception;

class DivisionByZeroExceptionx extends Exception
{
    //
    // public function report()
    // {
    //     \Log::error('connection issue: ' );
    // }

     public function render()
     {
      //return view('errors.divz');
       return "Can't Divide by zero";
     }
    
}
