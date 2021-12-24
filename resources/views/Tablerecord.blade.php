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
                        <th scope="col"><a href="/TableDelete?email={{ $bocha->email }}"> <button  type="\button\class=\btn btn-primary\">Delete </button> </a></th>

                      </tr>

                       @endforeach
                    </tbody>
                </div>
            </body>



</html>


