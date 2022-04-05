@php

    use App\Http\Controllers\FormExample;

@endphp


<html>
    <head>
        <title> List of Student </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        @csrf
        <div class="container mt-5">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Registrationn Number</th>
                <th scope="col">Branch</th>
                <th scope="col">Student Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach (FormExample::fetchallstudent() as $student )
                      <tr>
                        <th scope="col">{{ $student->registrationno }}</th>
                        <th scope="col">{{ $student->branch }}</th>
                        <th scope="col">{{ $student->studentname }}</th>
                        <th scope="collapse=2"><button  class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModal" onclick="myupdate('{{$student->registrationno}}','{{$student->branch}}','{{$student->studentname}}')">Update</button>  </th>
                      </tr>                                              
                    @endforeach
              
            </tbody>
          </table>
          <div id="page">
          <nav aria-label="Page navigation example ">
            
          </nav>
        </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
        <script type="text/javascript">
                $.ajax({
                    type:"GET",
                    url:"/norecores",
                   // data:"json",
                    success:function(data) 
                    {
                        console.log(data);
                        if(data > 0){
                                $("#selsubject").empty();
                                // Read data and create list
                                for(var i=0; i<data; i++){
                                $('#page .list').append('<li><h3 class="name">'+i+'</h3></li>')
                              
                                }
                       
                    }
                }
                });
        </script>
    </body>
</html>