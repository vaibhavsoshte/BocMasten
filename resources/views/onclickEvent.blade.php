<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
</head>
<body>
    <h3>Create Input Box</h3>
    
    <button id="btn" onclick="fun()">Create</button>

    <form id="form">
    <!---<input type="type" id="idname"  value=""> --->
    <br>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <script type="text/javascript">


function fun()
    {
    //var no = document.getElementById("idname").value;
    /*Generating text fields dynamically in the same form itself*/
   // for(var i=0;i<no;i++) {
       
        var br = document.createElement('br');
        document.createElement('br');
        var textfield = document.createElement("input");
        textfield.type = "text";
        textfield.value = "";

        document.getElementById('form').appendChild(br);
        document.getElementById('form').appendChild(textfield);
     //}
    }
   /* $("#submit").click(function(event) {
    event.preventDefault();

    var file = $("#file").val();
    //var userid = $("#Id").val();
    console.log(file)

    /*$.ajaxSetup({
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
}); */

    </script>

</body>
</html>