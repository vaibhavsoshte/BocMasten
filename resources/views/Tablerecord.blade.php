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

    </head>
            <body>
                <div class="col-6-sm">
                <table class="table mt-4 table-striped table-bordered" style="border-color:black;">
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
                        <th scope="col"><a href="/update?id={{$bocha->id}}& email={{$bocha->email}} & password={{$bocha->password}}"> <button  type="\button\class=\btn btn-primary\">Update</button> </a> </th>
                        <th scope="col"><!--<a href="/TableDelete?email={{ $bocha->email }}">--> <button  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclicke="delete({{$bocha->email}})">Delete </button> </a></th>

                      </tr>

                       @endforeach
                    </tbody>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Are you sure to delete this </p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary">Delete</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>
                </div>
                </div>
            </body>



</html>


