<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
@csrf
<div class="container mt-3">
  <h2>Custom File</h2>
  <form action="/csvfile" method="post" enctype="multipart/form-data">
    <p>Default file:</p>
    <input type="file" id="file" name="file">
  
    <div class="mt-3">
      <!--<button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button> -->
      <input type="submit" class="btn btn-primary" value="Submit">
    </div>
    <h3 class="text"></h3>
  </form>
    <!--<table class="table">
    </table> -->
  
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script> 
<script type='text/javascript'>
$(document).ready(function(){
                $.ajax({
                url:'/csvfile',
                type: 'get',
                success: function(response)
                {
                   //alter(response);
                   $('#text').html(response);
                }
              });
        });
</script>

</body>
</html>