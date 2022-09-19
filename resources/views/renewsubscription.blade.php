@php
    use App\Http\Controllers\FormExample;
@endphp
<html>
    <head>
        <title> Renew Subscription </title>
    </head>
    <body>
        <div class="container">
            <h1> </h1>
            <?php

                    $userid=$_REQUEST["userid"];
                    $usrname=$_REQUEST["usrname"];
                    $startdt=$_REQUEST["startdt"];
                    $enddt=$_REQUEST["enddt"];

                 ?>

            <form action="/subscriptionsave" method="POST">
                @csrf
                <div class="form-group">
                <input type="email" name="userid" class="form-control"  readonly required value="<?php echo  $userid;?>">
                <input type="text" name="usrname" class="form-control"  readonly  required value="<?php echo $usrname;?>">
                <input type="date" name="startdt" class="form-control"   required value="<?php echo $startdt;?>">
                <input type="date" name="enddt" class="form-control"   required value="<?php echo $enddt;?>">

                <button type="submit" class="btn btn-primary">Update</button>


            </form>
        </div><!--  container close      -->

    </body>
</html>
