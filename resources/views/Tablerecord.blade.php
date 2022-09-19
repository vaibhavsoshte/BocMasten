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
                            <th scope="col">Image</th>
                            <th scope="col">Email Id</th>
                            <th scope="col">Password</th>
                            <th scope="col" colspan="2"> Operation</th>

                          </tr>
                    </thead>
                    <tbody>

                      @foreach($data as $users)
                      <tr>
                        <th scope="col">{{ $users->id }}</th>
                        <th scope="col"> <p style="text-align:center;"> <img src="{{asset('/'.$users->image)}}" class="center" alt="image" height="70px" width="70px" ></p></th>
                        <th scope="col"><p style="text-align:center;">{{ $users->email }}</p></th>
                        <th scope="col">{{ $users->pass}}</th>
                       
                        <th scope="collapse=2"><p style="text-align:center;"><button  class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModal" onclick="myupdate('{{$users->id}}','{{$users->email}}','{{$users->pass}}')">Update</button>  <button  class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal"onclick="mydelete('{{$users->id}}')">Delete</button> </p>
                          @if($users->statu =='disabled')         
                          <td><button class="btn btn-outline-success" disabled>Approved</button></td>         
                          @else
                          <td> <button class="btn btn-outline-success" data-toggle="modal" data-target="#approvedModal" onclick="myapproved('{{$users->id}}','{{$users->email}}','{{$users->pass}}')">Pending</button></td>        
                           @endif</th>
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
                <!--- approved --->
                <div class="modal fade" id="approvedModal" role="dialog">
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                       
                        <h4 class="modal-title"> Approved User</h4>
                      </div>
                      <div class="modal-body">
                        <p id="p" name="p"></p>
                        <div class="modal-body">
                         
                          <input type="" name="id" id="id" value="" ><br><br>
                          <input type="" name="mail" id="mail" value=""><br><br>
                          <input type="" name="passwordx" id="passwordx" value="">
                      </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-default" data-dismiss="modal">Close</button>
                        <button  class="btn btn-outline-success" id="approved" name="approved">Approved</button> 
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

             function myapproved(a,b,c) 
             {
                var id=a;
                var email=b;
                var pass=c;

                console.log(id);
                console.log(email);
                console.log(pass);

                $("#id").val(id);
                $("#mail").val(email);
                $("#passwordx").val(pass);
                //alert(k);

             }
             

            
              $("#update").click(function() 
              {

              var userid = $("#Id").val();
              var bla = $("#email").val();
              var password = $("#pass").val();
              
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
              url:"/updateuser",
               data:"id="+userid+"&email="+bla+"&password="+password,
              //data:{"id":userid,"email":bla,"password":password},
              success:function(data) 
              {
                alert(data);
                window.location.reload();
              }
            }); 
          });

            $("#approved").click(function() 
              {

              var id = $("#id").val();
              var mail = $("#mail").val();
              var pass = $("#passwordx").val();
              
              console.log(id)
              console.log(mail)
              console.log(pass)
              $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                    });

              $.ajax({ 
              type:"POST",
              url:"/updatestatus",
              data:"id="+id+"&email="+mail+"&password="+pass,
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


