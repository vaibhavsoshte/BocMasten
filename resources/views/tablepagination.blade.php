@php

use App\Http\Controllers\StudentController;

@endphp


<html>
<head>
    <title>Pagination in Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <div class="col-6-sm">
        <table class="table mt-4 table-striped table-bordered" style="border-color:black;">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Registration No</th>
                    <th scope="col">Student Name</th>
                    <th scope="col" >Branch</th>

                  </tr>
            </thead>
            <tbody>

               @foreach($users as $user)
              <tr>
                <th scope="col">{{ $user->id}}</th>
                <th scope="col">{{ $user->registrationno}}</th>
                <th scope="col">{{ $user->studentname}}</th>
                <th scope="col">{{ $user->branch}}</th>
              </tr>

               @endforeach 
             
            </tbody>
        </table>
        </div>
       
         {{$users->links()}}
        
        <style>
            .w-5
            {
                display: none;
            }
        </style>
    </div>
</body>
</html>