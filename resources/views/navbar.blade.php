<html>
<head>
<title>Navbar Demo </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 
<meta name="csrf-token" content="{{ csrf_token() }}"> 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<style>
    
a:hover 
{
  background-color: grey;
  padding-left: 2px;
  margin: 0%;
  text-decoration: none;
  font-size: 3rem;
}
.navbar{
    padding: 0%;
    border: red;
    margin: 0%;
}
.box{
    margin: 0%;
    background-image: url("wallpaper11.jpg");
    background-repeat:no-repeat;
    background-size: 25% 100px;
    background-position: right;
   /* background-color: antiquewhite; */
}
   
</style>
</head>
<body>
 
    <div class="box">
          <img src="top.jpeg" width="800px" height="84px"  class="img-fluid" alt="" style="margin-top: 1px">
       
      </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto" style="padding: 0%;">
            <li class="nav-item ">
              <a class="nav-link" href="#" style="color: black;s hover:background-color: yellow;  font-size:20px;">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="color: black;s hover:background-color: yellow; font-size:20px;">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color: black;s hover:background-color: yellow; font-size:20px;">Branch</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" style="color: black;s hover:background-color: yellow; font-size:20px;">Notice Section</a>
              </li>
          
            <li class="nav-item">
              <a class="nav-link" href="#" style="color: black;s hover:background-color: yellow; font-size:20px; ">Dashboard</a>
            </li>
          </ul>
        
        </div>
      </nav>
      <div id="myCarousel" class="carousel slide" data-ride="carousel" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" style="height:500px" >

      <div class="item active">
        <img src="11.jpg" alt="Los Angeles" style="width:100%; height:500px;">
        <div class="carousel-caption">
          <h3>Grand Master Kiyoshi Shri. Ainul Hassan Shaikh</h3>
        </div>
      </div>

      <div class="item">
        <img src="12.jpg" alt="Chicago" style="width:100%; height:500px;">
        <div class="carousel-caption">
          <h3>Advika thombre Won Gold Medal in Swabhimaan Bharat Cup</h3>
          
        </div>
      </div>
    
      <div class="item">
        <img src="13.jpg" alt="New York" style="width:100%; height:500px;">
        <div class="carousel-caption">
          <h3>ISDA Team</h3>
          <p>All ISDA Official Referees & judge </p>
        </div>
      </div>
  
      <div class="item">
        <img src="14.jpg" alt="New York" style="width:100%; height:500px;">
        <div class="carousel-caption">
          <span style="font-size: 2.5rem; color: black;">MARTIAL ARTS TEACHES US: Practising 1 Kick 10,00 Times Is
            More Effective Then Practising 10,000 Kicks 1 Time.</span>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div><br>
  <hr>
<div class="container"> 
  <div class="row shadow  mb-5 bg-white rounded" style="padding: 0%; margin:0%;">
    <div class="col-md-3">
      <img src="isdalogo.png" alt="New York" style="width:100%; height:150px;">
    </div>
    <div class="col-md-8">
      <p style="font-size: 15px; margin-top:10px; font-weight: bold; "> Indian's Self Defence Academy is Known as ISDA.  ESTD. 2nd May 1993. ISDA, the Martial Arts Institute has been giving training in Karate, Judo, Aikido and  Oriental Martial Arts  Weapons. The ISDA organize advanced Martial Arts Training Camp every year twice ( Winter, Summer Camp). Also the Students of ISDA  have won many medals of GOLD, SILVER and BRONZE  in State, National and International level  tournaments. Also giving Special Self Defence training to Girls, working women. Short term  course of Self defence training also Introduced ( i.e..1 month, 3 months & six months) for all.</p>
    </div>
  </div>
</div> <!---container close---->
<div class="row" style="padding: 0%; margin-top:2%; margin-right:10%; margin-left:10%;">
  <div class="col-md-3">
    <div class="card" style="width:400px">
      <img class="card-img-top" src="shihan.jpg" alt="Card image">
      <div class="card-body">
        <h4 class="card-title" align="center"> SHIHAN. Ramchandran Mudaliar</h4>
      </div>
    </div>
  </div>
</div>
  <div class="col-md-9">
    <p style="font-size: 15px; margin-top:10px; font-weight: bold; "></p>
  </div><br>
<h3 align="center" style="margin-top:1px; font-weight: bold; ">ISDA Team </h3>
<div class="row" style="padding: 0%; margin:0%; margin-right:8%; margin-left:8%;">
<div class="col-md-4" style="padding-top: 2%;" >
  <div class="card" style="width:250px;">
    <img class="card-img-top" src="suresh.jpg" height="300px" wid alt="Card image">
    <div class="card-body">
      <h4 class="card-title" align="center">Sensei Suresh Yadav</h4>
    </div>
  </div>
</div>
<div class="col-md-4" style="padding-top: 2%;">
  <div class="card" style="width:250px;">
    <img class="card-img-top" src="milind.jpg" height="300px" alt="Card image">
    <div class="card-body">
      <h4 class="card-title" align="center"> Sensei Milind H Surve</h4>
    </div>
  </div>
</div>
<div class="col-md-4" style="padding-top: 2% ">
  <div class="card" style="width:250px">
    <img class="card-img-top" src="vinod.jpg" height="300px" alt="Card image">
    <div class="card-body">
      <h4 class="card-title" align="center">Sensei Vinod Vasu Nair </h4>
    </div>
  </div>
</div>
</div>
<div class="row-footer">
  <div class="col-lg-12  bg-dark">

  </div>
</div>
</body>
</html>