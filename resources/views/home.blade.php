@php

if(Session::has('id') && Session::has('userid'))
  {
   $value = Session::get('id');
   $user = Session::get('userid'); 
   //echo "$user";
  }
  else
  {
     //echo "no session is set";
     return redirect('/Login');
  }  
@endphp


<html>
    <head>
        <title> User </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    </head>
    <body>
       
        <form>
        @csrf
        <div class="col-md-6 d-flex justify-content-flex-end">
            <button type="button" class="btn btn-primary btn-lg btn-block mb-4"><a href="/logoutaction?userid={{$user}}&id={{$value}}" style="text-decoration: none">Log Out</a></button>
        </div>
        <div class="container col-md-8 d-flex justify-content-center">
        <h1> Hi This User Page{{$user}}  </h1> 
        </div>
       
        </form>
       
    </body>
</html>