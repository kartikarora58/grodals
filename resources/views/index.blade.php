@extends('user.layouts.app')
@section('content')
<style>
 #id {
  
  max-width: 900px;
  margin: 30px auto;
  padding: 20px;
  height: 80%
/*   outline: 1px solid #ccc; */
}
  #p01:hover
  {
    border: 2px solid red;
    color:purple;
    font-size: 20px;
  }
  #p02:hover
  {
    border: 2px solid violet;
    color:green;
    font-size: 20px;
  }
  .parallax {
  /* The image used */
  background-image: url("{{asset('/public/image/back1.jpeg')}}");

  /* Set a specific height */
  min-height: 500px; 

  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
 .parallax2 {
  /* The image used */
  background-image: url("{{asset('/public/image/backfront.jpeg')}}");

  /* Set a specific height */
  min-height: 500px; 

  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
@media 
@media only screen and (max-height:575px)
{
    #mycard
    {
      width: 10%;
    }
}

</style>
<!DOCTYPE html>
<html>
<head>
  <title>Ludhiana Education</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- for font glyphicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- waypoint -->
  
    
 
</head>
<body>
<div style="width: 100%;margin-top: -25px;"  class="container-fluid" >  
<!-- Slider Starting -->
  <div class="carousel slide" id="demo" data-ride="carousel">
        <!-- Indicators -->
      <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ul>
        <!-- The slide show -->
          <div class="carousel-inner" style="width: 100%;border: solid red thin;">
              <div class="carousel-item active">
               <img src="{{asset('/public/image/qw.jpeg')}}" alt="Los Angeles" width="100%;">
              </div>
            <div class="carousel-item">
               <img src="{{asset('/public/image/catering.jpeg')}}" alt="newyork" width="100%;">
              </div>
            <div class="carousel-item">
                <img src="{{asset('/public/image/henna.jpeg')}}" alt="paris" width="100%;">
            </div>
          </div>
           <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
    </div>
       <!-- Left and right controls -->
         
</div>

<!-- Slider End -->

<!-- Starting of form -->
<div class="container-fluid" >
<form action="{{url('/filter')}}" method="post">
  @csrf
  <div class="form-group">
    <div class="row">
          <div class="col-sm-4">
              <label for="location" ></label>
                <select name="state" class="form-control" id="location">
                <option  selected value>Select Location</option>
                @foreach($states as $s)
                <option value="{{$s->id}}">{{$s->state_name}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-sm-4">
              <label for="category" ></label>
                <select name="category" class="form-control" id="category">
                <option  selected value>Select Category</option>
                @foreach($categories as $c)
                <option value="{{$c->id}}">{{$c->category_name}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-sm-4"><br>
             <input type="submit" name="submit" value="search" class="btn btn-primary form-control">
          </div>
    </div>
  </div>
</form>
</div>

<!-- End of form -->
<!-- starting of card -->
<div class="container-fluid" style="background-color: white">
<br>
<div class="row">
  <div class="col-sm-3">
    
   <a href="{{url('/card/'.'1')}}" style="text-decoration: none;color: black"><div class="card" id="p01">
    <div class="card-body">
      <img src="{{asset('/public/image/outfit1.jpeg')}}" width="50px" height="50px">&nbsp;&nbsp;&nbsp;
      Wedding Outfit
    </div>
  </div></a>
  <br>
  <a href="{{url('/card/'.'2')}}" style="text-decoration: none;color: black"> <div class="card" id="p02">
     <div class="card-body">
       <img src="{{asset('/public/image/jewellery1.jpeg')}}" width="50px" height="50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Jewellery and Accessory
    </div>
   </div></a>
   <br>
    <a href="{{url('/card/'.'9')}}" style="text-decoration: none;color: black"><div class="card" id="p01">
    <div class="card-body">
      <img src="{{asset('/public/image/make1.jpeg')}}" width="50px" height="50px">&nbsp;&nbsp;&nbsp;
      Make Up
    </div>
  </div></a>
  <br>
  </div>
  <div class="col-sm-3">
    <a href="{{url('/card/'.'3')}}" style="text-decoration: none;color: black"> <div class="card" id="p02">
     <div class="card-body">
       <img src="{{asset('/public/image/catering1.jpeg')}}" width="50px" height="50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Catering
    </div>
   </div></a>
   <br>
   <a href="{{url('/card/'.'4')}}" style="text-decoration: none;color: black"><div class="card" id="p01">
     <div class="card-body">
       <img src="{{asset('/public/image/venue1.jpeg')}}" width="50px" height="50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Venue
    </div>
   </div></a>
   <br>
    <a href="{{url('/card/'.'11')}}" style="text-decoration: none;color: black"><div class="card" id="p02">
     <div class="card-body">
       <img src="{{asset('/public/image/pandit1.jpeg')}}" width="50px" height="50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Pandit
    </div>
   </div></a>
   <br>
  </div>
  <div class="col-sm-3">
 <a href="{{url('/card/'.'5')}}" style="text-decoration: none;color: black"> <div class="card" id="p01">
     <div class="card-body">
       <img src="{{asset('/public/image/band1.jpeg')}}" width="50px" height="50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Band and Ghodi
    </div>
   </div></a>
   <br>
    <a href="{{url('/card/'.'6')}}" style="text-decoration: none;color: black"><div class="card" id="p02">
     <div class="card-body">
       <img src="{{asset('/public/image/dj1.jpeg')}}" width="50px" height="50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Music and DJ
    </div>
   </div></a>
   <br>
    <a href="{{url('/card/'.'12')}}" style="text-decoration: none;color: black"><div class="card" id="p01">
     <div class="card-body">
       <img src="{{asset('/public/image/wedding1.png')}}" width="50px" height="50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Wedding Cards
    </div>
   </div></a>
   <br>
  </div>
   <div class="col-sm-3">
   <a href="{{url('/card/'.'7')}}" style="text-decoration: none;color: black"> <div class="card" id="p02">
     <div class="card-body">
       <img src="{{asset('/public/image/decor1.jpeg')}}" width="50px" height="50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     Decorators
    </div>
   </div></a>
   <br>
    <a href="{{url('/card/'.'10')}}" style="text-decoration: none;color: black"><div class="card" id="p01">
     <div class="card-body">
       <img src="{{asset('/public/image/photo1.jpeg')}}" width="50px" height="50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Photography
    </div>
   </div></a>
   <br>
   <a href="{{url('/card/'.'14')}}" style="text-decoration: none;color: black"><div class="card" id="p02">
     <div class="card-body">
       <img src="{{asset('/public/image/henna1.jpeg')}}" width="50px" height="50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Mehandi
    </div>
   </div></a>
   <br>
  </div>
</div>
</div>
<!-- Ending of card -->
<!-- parallax start -->
<div class="parallax"></div>
<!-- parallax end -->
<div class="container-fluid" style="background-color: #F08F6D">
  <div class="row">
    <div align="center" style="font-size: 50px;color: purple;margin: auto">&nbsp;Our Results Speak For Themselves&nbsp;</div>
  </div>
  <br><br>
  <div class="row">
    <div class="col-sm-6">
      <div class="progress" style="height: 30px">
  <div style="background-color: green" id="dynamic" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
    <span id="current-progress"></span>
  </div>
</div><br>
  </div> 
  <div class="col-sm-6">
      <div class="progress" style="height: 30px">
  <div style="background-color: blue" id="dynamic2" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
    <span id="current-progress"></span>
  </div>
</div><br>
  </div> 
    
    </div>
    <br>
    <br>
  </div>


 <!-- School and colleges section-->

<div class="container-fluid " style="height: 80%">
<br>
<div class="row">
  <h2 style="margin: auto">Recently Joined</h2>
</div>
  <div class="row">
  
  @foreach($users as $user)
  <div class="col-md-3" align="center">
    <div class="flex flex-wrap -m-3" id="id">
  <div class="w-full sm:w-1/2 md:w-1/3 flex flex-col p-3">
    <div  class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col">
      <img src="{{asset('/public/image/'.$user->logo)}}"  width="100%" height="100px">
      <hr style="width: 80%;" class="bg-success">
      <div class="p-4 flex-1 flex flex-col" style="height:200px">
        <h3 class="mb-4 text-2xl">{{$user->company_name}}</h3>
        <div class="mb-4 text-grey-darker text-sm flex-1">
          <p>{{$user->address1}},{{$user->city->city_name}},{{$user->state->state_name}}</p>
        </div>
      </div>
      <hr style="width: 80%" class="bg-success">
      <div style="margin-bottom: 30px"><a href="{{url('/detail/'.$user->id)}}" class="btn btn-success">View Details</a></div>
    </div>  
  </div>
  </div>
  </div>
  @endforeach
    

</div>



   <!-- End of row -->
<!-- 2nd flower Image -->

</div>  <!--row end-->
 <!--end of container-->
 <!--end of container-->

<!-- disclaimer -->

@include('user.layouts.footer')
  </body>
  </html>
  <!--body container-fluid-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.2/waypoints.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){

        $(function(){

          var current_progress = 0;
  var interval = setInterval(function() {
      current_progress += 10;
      $("#dynamic")
      .css("width", current_progress + "%")
      // .attr("aria-valuenow", current_progress)
      .html("<b style='font-size:12px'>98% Customer Satisfaction</b>");
      if (current_progress >= 90)
          clearInterval(interval);
        
  }, 500);
        });

        $(function() {
  var current_progress = 0;
  var interval = setInterval(function() {
      current_progress += 10;
      $("#dynamic2")
      .css("width", current_progress + "%")
      .attr("aria-valuenow", current_progress)
      .html("<b style='font-size:12px'>Vendors Available 1000+</b>");
      if (current_progress >= 70)
          clearInterval(interval);
  }, 500);
});
      });

  


        
      
       
    </script>
  @endsection