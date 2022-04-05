<html>
    <head>
        <title>Image Upload And Stored In DB</title>
    </head>
    <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!-- JavaScript Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <body>
        <div class="container mt-5">
            <div class="col-md-8">
            <form action="/imagesave" method="post" enctype="multipart/form-data">
            @csrf
             <input type="file" class="form-control" id="image" name="image" /><br><br>
             <div class="d-grid gap-2 col-6 mx-auto">
             <button type="submit" class="btn btn-outline-primary" value="submit">Save Image</button>
             </div>
            </form>
            </div>
        </div>
    </body>
    </html>
