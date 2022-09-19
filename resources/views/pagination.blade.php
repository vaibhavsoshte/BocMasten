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
                @foreach(FormExample::paginationdata() as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->pass }}</td>
                    <th scope="collapse=2"><button  class="btn btn-outline-secondary">Update</button>  <button  class="btn btn-outline-secondary">Delete</button></th>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div id="tablescroll">

        </div>

        
    </div>
</body>
<script>
   function prevpage() {
    console.log("Previous Page In");
    var pageno = getCookie("productpageindex");
    
    if(pageno != "" && parseInt(pageno)>1) {
        pagexo=parseInt(pageno)-1;
        //alert("Welcome again, " + pageno);
        calculatedentry=(pagexo*5)+1;
        setCookie("productpageindex", pagexo, 30);
        switchentries();
    } else {
        pagexo=1;
        if(pagexo != 0 && pagexo != null) {
            // Set cookie using our custom function
            setCookie("productpageindex", pagexo, 30);
            calculatedentry=pagexo;
            switchentries();
        }
    }
}
function nextpage() {
    console.log("Next Page In");
    var pageno = getCookie("productpageindex");
    
    if(pageno != ""  ) {
        pagexo=parseInt(pageno)+1;
        //alert("Welcome again, " + pageno);
        calculatedentry=(pagexo*5)+1;
        setCookie("productpageindex", pagexo, 30);
        switchentries();
    } else {
        pagexo=1;
        if(pagexo != 0 && pagexo != null) {
            // Set cookie using our custom function
            setCookie("productpageindex", pagexo, 30);
            calculatedentry=pagexo;
            switchentries();
        }
    }
}



    function switchpage(whichpage) {
    if(whichpage!=1){
    console.log("Switching Pages with test "+whichpage);
    calculatedentry=(whichpage*5)+1;
    console.log("Calculated Page Value:"+calculatedentry);
    setCookie("productpageindex", whichpage, 30);
    switchentries();

    }
    else
    {
        calculatedentry=1;
        console.log("Calculated Page Value:"+calculatedentry);
        setCookie("productpageindex", whichpage, 30);
        switchentries();
    }
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
       // var counter=10;

       // var divisions=1;
        $.ajax({
        url: '/api/norecores',
        type: 'get',
        success: function(response){

            console.log(response);

            settotprods=response;
            if(response>10) {
                    markol="<nav aria-label=\"Page navigation example\"><ul class=\"pagination\"><li class=\"page-item\"><a class=\"page-link\" onclick='prevpage();'>Previous</a></li>";
                    for(x=1;x<=4;x++) {
                        markol+="<li class=\"page-item\"><a class=\"page-link\" onclick='switchpage(\""+x+"\")' >"+x+"</a></li>";
                    }
                    markol+="<li class=\"page-item\"><a class=\"page-link\" onclick='nextpage();'>Next</a></li></ul></nav>";  
                    $("#tablescroll").html(markol);
                    document.cookie = "productpageindex=1;";
                }
                else {
                    markol="<nav aria-label=\"Page navigation example\"><ul class=\"pagination\"><li class=\"page-item\"><a class=\"page-link\" onclick='prevpage();'>Previous</a></li>";
                    for(x=1;x<=response;x++) {
                        markol+="<li class=\"page-item\"><a class=\"page-link\" onclick='switchpage(\""+x+"\")'>"+x+"</a></li>";
                    }
                    markol+="<li class=\"page-item\"><a class=\"page-link\" onclick='nextpage();' >Next</a></li></ul></nav>";
                    $("#tablescroll").html(markol);
                    document.cookie = "productpageindex=1;";
                }

        }
    });
});
</script>
</html>