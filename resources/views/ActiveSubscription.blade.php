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
                <h1  align="center"> List of Active User Subscripation </h1>
                <div class="col-6-sm">
                <table class="table mt-4 mx-auto table-striped table-bordered" style="border-color:black;">
                    <thead>
                        <tr>
                            <th scope="col">UserID</th>
                            <th scope="col">User Name</th>
                            <th scope="col">DOB</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Address</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Course ID</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col" colspan="2"> Operation</th>



                          </tr>
                    </thead>
                    <tbody>

                      @foreach (FormExample::fetchAllsubscription() as $bocha )
                      <tr>
                        <th scope="col">{{$bocha->userid}}</th>
                        <th scope="col">{{$bocha->usrname}}</th>
                        <th scope="col">{{$bocha->dob}}</th>
                        <th scope="col">{{$bocha->gender}}</th>
                        <th scope="col">{{$bocha->address}}</th>
                        <th scope="col">{{$bocha->mobno}}</th>
                        <th scope="col">{{$bocha->courseid}}</th>
                        <th scope="col">{{$bocha->startdt}}</th>
                        <th scope="col">{{$bocha->enddt}}</th>
                        <th scope="col"><a href="/subscription?userid={{$bocha->userid}}&usrname={{$bocha->usrname}}&startdt={{$bocha->startdt}}& enddt={{$bocha->enddt}}"> <button  type="\button\class=\btn btn-primary\">Update</button> </a> </th>
                      </tr>

                       @endforeach
                    </tbody>
                </div>
            </body>



</html>


