@php
   use App\Http\Controllers\FormExample;
@endphp
<html>
    <head>
        <title> Update Table Record  </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    </head>
            <body>
                <?php

                    $id=$_REQUEST["id"];
                    $email=$_REQUEST["email"];
                    $password=$_REQUEST["password"];

                 ?>
                <form action="/Tableupdate" method="POST">
                    @csrf
                    <div class="form-group">
                    <input type="number" name="id" class="form-control"  readonly required value="<?php echo $id;?>">
                    <input type="email" name="email" class="form-control"    required value="<?php echo $email;?>">
                    <input type="" name="password" class="form-control"   required value="<?php echo $password;?>">

                    <button type="submit" class="btn btn-primary">Update</button>

                    </div>
                </form>
            </body>
</html>
