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
                            <th scope="col">Student Name</th>
                            <th scope="col">Subject Name</th>
                            <th scope="col" > Mark</th>

                          </tr>
                    </thead>
                    <tbody>

                      @foreach (FormExample::table() as $bocha )
                      <tr>
                        <th scope="col">{{ $bocha->stu_id}}</th>
                        <th scope="col">{{ $bocha->stu_name}}</th>
                        <th scope="col">{{ $bocha->Sub_name}}</th>
                        <th scope="col">{{ $bocha->bulla}}</th>
                      </tr>

                       @endforeach
                    </tbody>
                </div>
            </body>



</html>
