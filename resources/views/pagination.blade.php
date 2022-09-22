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
        <div id="usertb">
           
        </div>
        <div id="tablescroll">

        </div>

        
    </div>
</body>
<script>
    calculatedentry=1;
settotprods=1;
function setCookie(name, value, daysToLive) {
    // Encode value in order to escape semicolons, commas, and whitespace
    var cookie = name + "=" + encodeURIComponent(value);
    
    if(typeof daysToLive === "number") {
        /* Sets the max-age attribute so that the cookie expires
        after the specified number of days */
        cookie += "; max-age=" + (daysToLive*24*60*60);
        
        document.cookie = cookie;
    }
}
function getCookie(name) {
    // Split cookie string and get all individual name=value pairs in an array
    var cookieArr = document.cookie.split(";");
    
    // Loop through the array elements
    for(var i = 0; i < cookieArr.length; i++) {
        var cookiePair = cookieArr[i].split("=");
        
        /* Removing whitespace at the beginning of the cookie name
        and compare it with the given string */
        if(name == cookiePair[0].trim()) {
            // Decode the cookie value and return
            return decodeURIComponent(cookiePair[1]);
        }
    }
    
    // Return null if not found
    return null;
}    

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


function switchentries() {
    var x = calculatedentry;
    
    var updurl='/api/userlist?limits=4&offset='+x;

    $.ajax({
                url: updurl,
                type: 'get',
                success: function(responsen) {

                 console.log(responsen);
                    var len = 0;
                                if(responsen['data'] != null){
                                    len = responsen['data'].length;
                                }

                                var dataox="<table class=\"table mt-5 table-bordered\" > <thead><tr><th>ID</th><th>Email ID</th><th>Password</th><th>Operation</th></tr></thead>";
                                dataox+="<tbody>";
                                var srno=1;
                                if(len > 0){
                                    for(var i=0; i<len; i++){
                                    var productsku = responsen['data'][i].id;
                                    var productname = responsen['data'][i].email;
                                    var productpacksize = responsen['data'][i].pass;
                                    var offeramt = responsen['data'][i].statu;
                                 

                                    dataox+="<tr><td>"+srno+"</td><td>"+productsku+"</td><td>"+productname+"</td><td>"+productpacksize+"</td><td>"+offeramt+"</td><td>"+expiryinterval+"</td>";
                                    dataox+="<td><div id=\"frmdt\">  <a href=\"/editproductsku?id="+productsku+"\"><button type=\"button\" class=\"btn btn-primary form-control\" style='margin:1px;' ><i class=\"fas fa-edit\"></i>Edit</button></a>    <button type=\"button\" class=\"btn btn-danger form-control\" style='margin:1px;' onclick='deletesku(\""+productsku+"\")'><i class=\"far fa-trash-alt\"></i>Delete</button>       </div></td></tr>";
                                    srno=srno+1;
                                    }
                                }                                                    
                                dataox+="</tbody>";
                    dataox+="</table>";

                                console.log(dataox);
                    $("#usertb").html(dataox);

                }
            });

    
}

           $.ajax({
                url: '/paginationdata?limits=4&offset=0',
                type: 'get',
                success: function(responsen){

                    console.log(responsen);
                    var len = 0;
                                if(responsen['data'] != null){
                                    len = responsen['data'].length;
                                }

                                var dataox="<table class=\"table mt-5 table-bordered\" > <thead><tr><th>Sr. No</th><th>User ID</th><th>Email ID</th><th>Passworld</th><th>Status</th><th scope=\"colspan=3\">Action on Product</th></tr></thead>";
                                dataox+="<tbody>";
                                var srno=1;
                                if(len > 0){
                                    for(var i=0; i<len; i++){
                                    var id = responsen['data'][i].id;
                                    var email = responsen['data'][i].email;
                                    var pass = responsen['data'][i].pass;
                                    var statu= responsen['data'][i].statu;
                                    

                                    dataox+="<tr><td>"+srno+"</td><td>"+id+"</td><td>"+email+"</td><td>"+pass+"</td><td>"+statu+"</td>";
                                    dataox+="<td><div id=\"frmdt\">  <a href=\"/editproductsku?id="+id+"\"><button type=\"button\" class=\"btn btn-primary form-control\" style='margin:1px;' ><i class=\"fas fa-edit\"></i>Edit</button></a>    <button type=\"button\" class=\"btn btn-danger form-control\" style='margin:1px;' onclick='deletesku(\""+id+"\")'><i class=\"far fa-trash-alt\"></i>Delete</button>       </div></td></tr>";
                                    srno=srno+1;
                                    }
                                } 

                                dataox+="</tbody>";
                               dataox+="</table>";

                                console.log(dataox);
                    $("#usertb").html(dataox);

                }
                });

           /* else {
                $("#tabledata").html("<h4>No data found</h4>");
            } */
</script>
</html>