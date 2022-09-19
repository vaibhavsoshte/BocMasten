@php

    use App\Http\Controllers\FormExample;

@endphp



<html>
    <head>
        <title>Image Upload And Stored In DB</title>
    </head>
    <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!-- JavaScript Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <meta name="csrf-token" content="{{ csrf_token() }}">

    <body>
        <div class="container mt-5">
            <div class="col-md-8">
            <form method="post" enctype="multipart/form-data">
            @csrf
             <input type="file" class="form-control" id="file" name="file" /><br><br>
             <div class="d-grid gap-2 col-6 mx-auto">
             <button type="submit" class="btn btn-outline-primary" id="submit" value="submit">Save Image</button>
             </div>
            </form>
            <div class="col-6-sm">
                <table class="table" id="table">
                  
                </table>
            </div>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <script type="text/javascript">
    $("#submit").click(function(event) {
    event.preventDefault();

    var file = $("#file").val();
    //var userid = $("#Id").val();
    console.log(file)

    $.ajaxSetup({
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                    });

    $.ajax({
        type:"post",
        url:"/csvfile",
        data:"file="+file,
        success: function(data){
              alert(data);
            // $("#table").append(data); 
        },
        error: function(data){
             alert("Error")
        }
    }); 
});

    </script>
    </html>
