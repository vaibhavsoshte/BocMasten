@php

    use App\Http\Controllers\FormExample;

@endphp
<html>
    <head>
        <title> Table API  </title>
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
                            <th scope="col">Student ID</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col" colspan="2"> Operation</th>
                          </tr>
                    </thead>
                    <tbody>

                      @foreach (AJAXController::show() as $bocha )
                      <tr>
                        <th scope="col">{{$bocha->stu_id}}</th>
                        <th scope="col">{{$bocha->stu_name}}</th>
                        <th scope="col">{{$bocha->stu_email}}</th>
                        <th scope="col">{{$bocha->stu_mobile}}</th>
                       <th scope="col"><a href="/update?stu_id={{$bocha->stu_id}}& stu_email={{$bocha->stu_email}} & stu_mobile={{$bocha->stu_mobile}}"> <button  type="\button\class=\btn btn-primary\">Update</button> </a> </th>
                        <th scope="col"><a href="/TableDelete?stu_email={{ $bocha->stu_email }}"> <button  type="\button\class=\btn btn-primary\">Delete </button> </a></th>
                        <th scope="col"><button  type="\button\class=\btn btn-success\">Approved</button></th>


                      </tr>

                       @endforeach
                    </tbody>
                </div>
            </body>



</html>


