@php

    use App\Http\Controllers\AjaxController;

@endphp

<!DOCTYPE html>
<html>
<head>
<title>Covid-19 Record</title>
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
          <div class="col-lg-8 shadow bg-white rounded"style="margin-left:100px; padding:0;">
           <div class="card">
               <div class="card-header" style="background-color: rgb(181, 165, 238)">
                   <h5  align="center">Search Record By Country</h5>
               </div>
               <div class="card-body"> 
                 <form id="countrydata" method="POST" enctype="multipart/form-data">
                   @csrf
                     <div class="input-group mb-6">
                         <select class="form-select" id="country" name="country" style="margin-left: 5%; margin-right:5%;">
                           <option selected disabled>Choose branch...</option>
                           @foreach (AjaxController::fetchallcountry() as $bocha )
                           <option value={{$bocha->country_name}}>{{$bocha->country_name}}</option>
                           @endforeach
                         </select><br>
                       </div><b><br>
                       <div class="input-group mb-6">
                        <button type="button"  id="submit" class="btn btn-outline-primary btn-block" style="margin-left: 45%; margin-right:20%;">Submit</button>
                       </div>
                     
                 </form>
               </div>
             </div>
          </div>
         
    </div><br><br>
    <div id="tbl"></div>
   </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script>
      $(document).ready(function () {
 
        $("#submit").click(function (event) {
        
        //stop submit the form, we will post it manually.
        event.preventDefault();
        
        // Get form
        // var file = fileInput.files[0];
        var form = $("#countrydata")[0];
        
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
            url: "api/coronaapi",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (responsen) {
        
            
                console.log("SUCCESS : ", responsen);
                $("#tbl").html(responsen);
            
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

</body>
</html>