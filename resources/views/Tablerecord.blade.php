@php
    use App\Http\Controllers\FormExample;
@endphp
<html>
    <head>
        <title> Table Record  </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
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
              <div class="container">
                <div class="col-6-sm">
                <table class="table mt-4 table table-bordered" style="border-color:black;">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Email Id</th>
                            <th scope="col">Password</th>
                            <th scope="col" colspan="2"> Operation</th>

                          </tr>
                    </thead>
                    <tbody>

                      @foreach (FormExample::show() as $bocha )
                      <tr>
                        <th scope="col">{{ $bocha->id }}</th>
                        <th scope="col">{{ $bocha->email }}</th>
                        <th scope="col">{{ $bocha->password}}</th>
                        <th scope="collapse=2"><button  class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModal" onclick="myupdate('{{$bocha->id}}','{{$bocha->email}}','{{$bocha->password}}')">Update</button>  <button  class="btn btn-outline-secondary" data-toggle="modal" data-target="#deleteModal"onclick="mydelete('{{$bocha->id}}')">Delete</button></th>
                       
                      </tr>                                              
                       @endforeach
                    </tbody>
                </table>
                </div>
                </div>
                <!-- update -->
                <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                       
                        <h4 class="modal-title"> Update User</h4>
                      </div>
                      <div class="modal-body">
                        <p id="p" name="p"></p>
                        <div class="modal-body">
                         
                          <input type="" name="Id" id="Id" value="" readonly><br><br>
                          <input type="" name="email" id="email" value=""><br><br>
                          <input type="" name="pass" id="pass" value="">
                      </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button  class="btn btn-secondary" id="update" name="update">Update</button> 
                      </div>
                    </div>
                    
                  </div>
                </div>
                <!-- delete -->

                <div class="modal fade" id="deleteModal" role="dialog">
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                       
                        <h4 class="modal-title">Confirmation</h4>
                      </div>  
                      <div class="modal-body">

                        <p>Are you sure you want to delete this Users?</p>  
                          
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancels</button>
                        <button  class="btn btn-secondary" id="delete">Delete</button> 
                      </div>
                    </div>
                    
                  </div>
                </div>
            </body>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
            <script type="text/javascript">
              function mydelete(ix) 
              {
                var id=ix;
                //alert(id);
                // Delete 
                $("#delete").click(function(){
                 // var el = this;

                $.ajax({
                    type:"GET",
                    url:"/TableDelete",
                    data:"id=" +id,
                    success:function(data) 
                    {
                       alert(data);
                       window.location.reload();
                    }
                }); 
              });
          

             }
             function myupdate(i,k,p) 
             {
                var id=k;
                var email=i;
                var pass=p;
                
                $("#Id").val(email);
                $("#email").val(id);
                $("#pass").val(p);
                //alert(k);

             }
             

            
              $("#update").click(function() 
              {
              var bla = $("#email").val();
              var password = $("#pass").val();
              var userid = $("#Id").val();
              console.log(bla)
              console.log(password)
              console.log(userid)

              $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                    });

              $.ajax({ 
              type:"POST",
              url:"/Tableupdate",
               data:"id="+userid+"&email="+bla+"&password="+password,
              //data:{"id":userid,"email":bla,"password":password},
              success:function(data) 
              {
                alert(data);
                window.location.reload();
              }
            }); 

          });

  
      
    </script>
</html>


