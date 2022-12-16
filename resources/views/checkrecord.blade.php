<!DOCTYPE html>
<html>
    <head>
      <title>Page Title</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 
        <meta name="csrf-token" content="{{ csrf_token() }}"> 
    </head>
     <body>
       <div class="container mt-1">
         <div class="top" style="background-color: aqua">
          <h1 align="center"> Attendance Record </h1>
         </div><br>
         <form id="studentcard" method="POST" enctype="multipart/form-data">
          @csrf
         <div class="row">
          <div class="form-group col-md-5 mb-3">
            <input class="form-control" id="txtname" name="txtname" type="text" style="margin-left: 2%; margin-right:2%;">
            <div id="list" style="margin-left: 2%; margin-right:2%;"></div>
          </div>
          <div class="col-md-3 mb-3">
            <input class="date form-control" id="startdate" name="startdate" type="date" style="margin-left: 2%; margin-right:2%;">
          </div>
          <div class="col col-md-3 mb-3">
            <input class="date form-control" id="enddate" name="enddate" type="date" style="margin-left: 2%; margin-right:2%;">
          </div><br>
          <div class="input-group mb-3">
            <button type="button"  id="submit" class="btn btn-outline-primary btn-block" style="margin-left: 45%; margin-right:20%;">Submit</button>
          </div>
        </div>
        </form><br>
        <div id="record"> 
        </div>
        </div><!--- container close   --->
     </body>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script type="text/javascript">
      $(document).ready(function() {

      $("#txtname").keyup(function() {                
              
              var txtname=$(this).val();
              //console.log(txtname);
               
                  if(txtname!=="")
                {
                    $.ajax({    //create an ajax request to M
                    type: "POST",
                    url: "api/searchstudent",             
                    //data: {'student':student},
                    data:"txtname="+txtname,    //expect html to be returned                
                    success: function(data){                    
                     //console.log(data); 
                    $("#list").fadeIn("fast").html(data);
                    //alert(response);
               }

           });
           }
              else{
                  $("#list").fadeOut();
              }
       });
       $(document).on("click","#list li",function(){
           
           $("#txtname").val($(this).text());
           
            $("#list").fadeOut();
            
           
       });

       $("#submit").click(function (event) {

      //stop submit the form, we will post it manually.
      event.preventDefault();
      var txtname=$('#txtname').val();
      var startdate=$('#startdate').val();
      var enddate=$('#enddate').val();
      console.log(txtname);
      console.log(startdate);
      console.log(enddate); 

      $.ajax({    //create an ajax request to MakeTableServlet
              type:"POST",
              url:"api/attendedrecord",             
              //data: {'student':student},
              data:"txtname="+txtname+"&startdate="+startdate+"&enddate="+enddate,
              //dataType: "JSON",           //expect html to be returned                
              success: function(data){                    
              
              //$("#studentList").fadeIn("fast").html(data);
              $("#record").html(data); 
              //alert(response);
        }

      });

    });

  });
     </script>
</html>






