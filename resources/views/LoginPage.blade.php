<html>
    <head>
        <title> Login Page </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-4 col-md-8 pt-4 d-flex justify-content-center" style="border:1px solid #df3f3f;">
        <form action="loginaction" name="myForm" method="post" onsubmit="return validateForm()">
            @csrf
            <!--User ID  input -->
            <div class ="col-md-12 d-flex justify-content-center">
            <div class="form-outline mb-4">

              <input type="email" id="email" name="email" class="form-control" placeholder="User ID"/>
    
            </div>
            </div>
          
            <!-- Password input -->
            <div class="col-md-12 d-flex justify-content-center">
            <div class="form-outline mb-4">

              <input type="password" id="pass" name="pass" class="form-control" placeholder="Password"/>
            
            </div>
            </div>
          
            <!-- Submit button -->
            <div class="col-md-12 d-flex justify-content-center">
            <button type="submit" class="btn btn-outline-success btn-lg btn-block mb-4">Login</button>
            </div>

            </div> 
          </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
        <script type="text/javascript">
         function validateForm() 
         {
            let x = document.forms["myForm"]["email"].value;
            let y = document.forms["myForm"]["pass"].value;
            if (x == "") 
            {
               alert("Email must be filled out");
               return false;
            }
            if(y == "")
            {
              alert("Password Must Be Required");
              return false;
    
            }
         }
        </script>   
    </body>
</html>