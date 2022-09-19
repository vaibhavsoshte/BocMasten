@php

    use App\Http\Controllers\FormExample;

@endphp

<!DOCTYPE html>
<html>
    <head>
        <title> New Student ID Generation  </title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
          
    </head>
    <body>
        @csrf
        <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                New Student ID Generation
            </div>
            <div class="card-body">
            <input class="form-control form-control-lg" type="text" id="studentname" placeholder="Student Name"><br><br>

            <select class="form-select" id="branchaname">
                <option selected disabled="disabled">Please Select Branch</option>
                @foreach (FormExample::fetchallbranch() as $branch)
                <option id="branchaname" name="branchaname" value="{{$branch->branchname}}"> {{$branch->branchname}}</option>
                @endforeach

              </select><br><br>
             
              <button type="button" class="btn btn-outline-primary" id="submit" name="submit">Generated ID</button>
            </div>
          </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                  $("#submit").click(function() {
                                var studentname= $("#studentname").val();
                                var branch= $("#branchaname").val();
                                
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                    });
            
                                $.ajax({
                                    type:"POST",
                                    url:"newstudent",
                                    data:"studentname=" +studentname+ "&branch=" +branch,
                                    success:function(data) {
                                       alert(data);
                                       window.location.reload();
                                    }
                                });
            
            
                            });
                    });
                </script>
    </body>
</html>