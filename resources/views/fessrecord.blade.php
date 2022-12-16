@php

    use App\Http\Controllers\StudentController;
    use App\Http\Controllers\FessController;

@endphp
<!DOCTYPE html>
<html>
<head>
  <title>Fess Record</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 
        <meta name="csrf-token" content="{{ csrf_token() }}"> 
</head>
<body>
 <div class="container mt-2">
     <div class="row container justify center" style="padding: 0;">
       <div class="col-lg-6 shadow bg-white rounded"style="margin-left:200px; padding:0;">
        <div class="card">
            <div class="card-header" style="background-color: rgb(181, 165, 238)">
                <h5  align="center">Fess Record By Branch</h5>
            </div>
            <div class="card-body"> 
              <form id="studentcard" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="input-group mb-3">
                      <select class="form-select" id="branch" name="branch" style="margin-left: 5%; margin-right:5%;">
                        <option selected disabled>Choose branch...</option>
                        @foreach (StudentController::fetchbranch() as $bocha )
                        <option value={{$bocha->branchcode}}>{{$bocha->branchname}}</option>
                        @endforeach
                      </select><br>
                    </div>
                    <div class="input-group mb-3">
                      <select class="form-select" id="fesstyp" name="fesstyp" style="margin-left: 5%; margin-right:5%;">
                        <option selected disabled>Choose Fess Type...</option>
                        @foreach (FessController::fetchallbranch() as $branch )
                        <option value={{$branch->id}}>{{$branch->fesstype}}</option>
                        @endforeach
                      </select><br>
                    </div>
                    <div class="input-group mb-3">
                      <input class="date form-control" id="date" name="date" type="date" style="margin-left: 5%; margin-right:5%;"> <span> To </span> 
                      <input class="date form-control" id="date" name="date" type="date" style="margin-left: 5%; margin-right:5%;"> 
                    </div>
                    <div class="input-group mb-3">
                     <button type="button"  id="submit" class="btn btn-outline-primary btn-block" style="margin-left: 45%; margin-right:20%;">Submit</button>
                    </div>
              </form>
            </div>
          </div>
       </div>
      
 </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
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
    url: "api/fetchstudentbranch",
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    timeout: 600000,
    success: function (responsen) {

      
        console.log("SUCCESS : ", responsen);
      
       /* var len = 0;
                 if(responsen['data'] != null){
                     len = responsen['data'].length;
                    
                 }
                   // console.log(len);
                 
                 var dataox="<form id=\"bocha\" method=\"post\" enctype=\"multipart/form-data\">";
                 dataox+="<table class=\"table mt-5 table-bordered\" > <thead><tr><th>Sr. No</th><th>Registration No</th><th>Student Name</th><th scope=\"colspan=3\">branch</th><th scope=\"colspan=2\"> Mark Attended</th></tr></thead>";
                 dataox+="<tbody>";
                 var srno=1;
                 if(len > 0){
                     for(var i=0; i<len; i++){
                     var id = responsen['data'][i].id;
                     var studentname = responsen['data'][i].studentname;
                     var registrationno = responsen['data'][i].registrationno;
                     var branch = responsen['data'][i].branch;
                     
                     

                     dataox+="<tr><td>"+srno+"</td><td>"+registrationno+"</td><td>"+studentname+"</td><td>"+branch+"</td>";
                     dataox+="<td><div id=\"frmdt\">  <input class=\"form-check-input\" type=\"radio\" value=\"Present\" id=\"ptr"+id+"\" name=\"ptr"+id+"\">  <label class=\"radio\" for=\"flexCheckIndeterminate\"> Present </label>  <br> <br> <input class=\"form-check-input\" type=\"radio\"  value=\"Absent\" id=\"ptr"+id+"\" name=\"ptr"+id+"\">  <label class=\"form-check-label\" for=\"flexCheckIndeterminate\"> Absent </label>  </div></td></tr>";
                     
                     srno=srno+1;
                     }
                     
                 } 
                // dataox+="<tr> <div id=\"\submit\"> <button type=\"button\" class=\"btn btn-primary form-control\" style='margin:1px;' > Take Atteemded </button> </tr>";
                 else{var dataox="no data found";}

                 dataox+="</tbody>";
                 dataox+="</table>";
                 dataox+="<div> <button type=\"button\" id=\"attenddt\" name=\"attenddt\" onclick='savatted()' class=\"btn btn-primary form-control\" style='margin:1px;' > Take Atteemded </button> </div>";
                
                 dataox+="</form>";

                 //console.log(dataox);
                 $("#studenttbl").html(dataox);*/
                
    },
    error: function (e) {

       // $("#result").text(e.responseText);
        console.log("ERROR : ", e);
        $("#addmetadata").prop("disabled", false);
       // alert(e.responseText);
      

      }
   });

 });
}); //-------------
</script>
</html>