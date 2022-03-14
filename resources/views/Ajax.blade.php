@php

    use App\Http\Controllers\AJAXController;

@endphp



<!DOCTYPE html>
<html>
<head>
<title>Table in Laravel With Ajax </title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

</head>
<body>
<div>
<!---- table --->
<table class="table">
    <thead>
        <tr>
            <th scope="col">Student ID</th>
            <th scope="col">Student Name</th>
            <th scope="col">Email ID</th>
            <th scope="col">Mobile No</th>
          </tr>
    </thead>

    <tbody>
     <script type='text/javascript'>

        $(document).ready(function()
        {
        // $('#option5').addClass("optionvsmnote");

                $.ajax({
                url: 'Ajax',
                type: 'get',
                success: function(data)
                    {
			         alert(data);
			         $('#table').html(data);
                        ;
                    }



                });
        });
     </script>


</tbody>
</table>
</div>
</body>
</html>
