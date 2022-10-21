@php

    use App\Http\Controllers\StudentController;

@endphp

<!DOCTYPE html>
<html>
 <head>
  <title>Fess Payment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> 
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 
  <meta name="csrf-token" content="{{ csrf_token() }}"> 
 </head>
  <body>
    <div class="container">
    <div class="card" style="margin-right: 10px; margin-left: 10px;">
        <div class="card-header">
          Payment
        </div>
        <div class="card-body">
            <form id="studentcard" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">  
                    <input class="date form-control" id="name" name="name" type="text" style="margin-left: 20%; margin-right:20%;">  
                </div>
                <div class="input-group mb-3">     
                    <select class="form-select" id="branch" name="branch" style="margin-left: 20%; margin-right:20%;">
                      <option selected>Choose branch...</option>
                      @foreach (StudentController::fetchbranch() as $bocha )
                      <option value={{$bocha->branchcode}}>{{$bocha->branchname}}</option>
                      @endforeach
                    </select><br>
                </div>
            </form>
          <hr>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </body>
</html>