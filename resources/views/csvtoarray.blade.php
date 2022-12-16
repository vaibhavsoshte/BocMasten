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
 <!-- <p>To create a custom file upload, wrap a container element with a class of .custom-file around the input with type="file". Then add the .custom-file-input to the file input:</p> -->
  
    <!--<p>Custom file:</p>
    <div class="custom-file mb-3">
      <input type="file" class="custom-file-input" id="customFile" name="filename">
      <label class="custom-file-label" for="customFile">Choose file</label>
    </div> -->
    
    <p>Default file:</p>
    <input type="file" id="filename2" name="filename2">
  
    <div class="mt-3">
      <button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
    </div>

    <table class="table">
    </table>
  
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script> 
<script type='text/javascript'>

$(document).ready(function()
{
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  var file = $('#filename2').val();
  console.log(file);
  $.ajax({
      type:"POST",
      enctype:"multipart/form-data",
      url:"/csvfile",
      data:file,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
     
      success: function(Data) 
      {
        //alert(Data);
        $('#table').html(Data);
                        ;
                       
      }
      });
    });
  //});
</script>

</body>
</html>
