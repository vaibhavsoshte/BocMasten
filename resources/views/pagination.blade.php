@php
  use App\Http\Controllers\FormExample;
@endphp

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laravel Pagination Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">ID</th>
                    <th scope="col">Email Id</th>
                    <th scope="col">Password</th>
                    <th scope="col" colspan="2"> Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->password }}</td>
                    <th scope="collapse=2"><button  class="btn btn-outline-secondary">Update</button>  <button  class="btn btn-outline-secondary">Delete</button></th>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $users->links() !!}
        </div>
    </div>
</body>
</html>