@php

    use App\Http\Controllers\StudentController;

@endphp
<!DOCTYPE html>
<html>
 <head>
  <title>Page Title</title>
  <title>Student Attended</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 
        <meta name="csrf-token" content="{{ csrf_token() }}"> 
       
 </head>
  <body>
    @csrf
    <div class="container mt-1">
        <div class="top" style="background-color: aqua">
         <h1 align="center"> Attendance Record By Branch</h1>
        </div>
          <div class="card" style="width:60%; margin-left:20%;">
              <div class="card-body">
                
               <form id="studentcard" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="input-group mb-3">
                     
                      <select class="form-select" id="branch" name="branch" style="margin-left: 20%; margin-right:20%;">
                        <option selected>Choose branch...</option>
                        @foreach (StudentController::fetchbranch() as $bocha )
                        <option value={{$bocha->branchcode}}>{{$bocha->branchname}}</option>
                        @endforeach
                      </select><br>
                    </div>
                    <div class="input-group mb-3">
                      <input class="date form-control" id="date" name="date" type="date" style="margin-left: 20%; margin-right:20%;">  
                    </div>
                    <div class="input-group mb-3">
                      <button type="button"  id="submit" class="btn btn-outline-primary btn-block" style="margin-left: 45%; margin-right:20%;">Submit</button>
                    </div>
               </form>
              </div>
            </div><br>
            <div id="branchrecordtbl">

            </div>    
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script type="text/javascript">
       $(document).ready(function () {

        $("#submit").click(function (event) {

        //stop submit the form, we will post it manually.
        event.preventDefault();

        // Get form
        // var file = fileInput.files[0];
        var form = $("#studentcard")[0];

        // Create an FormData object 
        var data = new FormData(form);

        // If you want to add an extra field for the FormData
        data.append("CustomField", "This is some extra data, testing");

        // disabled the submit button
        $("#addmetadata").prop("disabled", true);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "api/recordbybranch",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (responsen) {

            
            //  console.log("SUCCESS : ", responsen);
            //console.log(dataox);
            $("#branchrecordtbl").html(responsen);
                        
            },
            error: function (e) {

            // $("#result").text(e.responseText);
                console.log("ERROR : ", e);
                $("#addmetadata").prop("disabled", false);
            // alert(e.responseText);
            }
        });
    });
});
      </script>
  </body>
</html>