@extends('user.layouts.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
  <!-- owl carousel -->
  <link rel="stylesheet" type="text/css" href="{{asset('/public/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/public/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/public/css/owl.theme.green.min.css')}}">
  <script type="text/javascript" src="{{asset('/public/js/owl.carousel.min.js')}}"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">

<body style="background-image: url('/training/grodal/public/image/background.jpeg')">
<section id="docInfo" class="cl-padding pt-2 bg-light-3">
        <div class="container">
            <div class="row text-left ">
                <!-- left-sidebar -->   
                <div class="col-sm-3">
                    <div class="card mb-4">
                        <img class="card-img-top" src="{{asset('/public/image/'.$user->logo)}}" alt="Card image cap">

                        <div class="sidebar-content">
                            <ul class="list-group list-group-flush">
                            	<hr>
                            	<li class="list-group-item cld-font-size-13">
                            	<strong class="d-block text-uppercase">Company Name</strong>
                            	<p>{{$user->company_name}}</p>
                            	</li>
                                <li class="list-group-item cld-font-size-13">
                                    <strong class="d-block text-uppercase">Location</strong>
                                    <a class="cld-text-gray-light1 text-deco-none" href="#" style="text-decoration: none;color: black" target="_blank">{{$user->address1}},{{$user->city->city_name}},{{$user->state->state_name}},{{$user->country->country_name}}</a>
                                </li>
                                 <li class="list-group-item cld-font-size-13">
                                	<strong class="d-block text-uppercase">Pincode</strong>
                                	<p class="cld-text-gray-light1 text-deco-none">{{$user->pincode}}</p>
                                </li>
                                 <li class="list-group-item cld-font-size-13">
                                	<strong class="d-block text-uppercase">Contact Person</strong>
                                	<p class="cld-text-gray-light1 text-deco-none">{{$user->designation}} : {{$user->contact_person}}</p>
                                </li>
                                <li class="list-group-item cld-font-size-13">
                                    <strong class="d-block text-uppercase">Phone</strong>
                                    <a class="cld-text-gray-light1 text-deco-none" href="tel:{{$user->mobile}}">+91 {{$user->mobile}}</a>
                                </li>
                               
                                <li class="list-group-item cld-font-size-13">
                                    <strong class="d-block text-uppercase">Landline</strong>
                                    @if($user->landline!=null)
                                    <a class="cld-text-gray-light1 text-deco-none">{{$user->landline}}</a>
                                    @else
                                    <a class="cld-text-gray-light1 text-deco-none">N.A</a>
                                    @endif
                                </li>
                                <li class="list-group-item cld-font-size-13">
                                    <strong class="d-block text-uppercase">Email</strong>
                                    <a class="cld-text-gray-light1 text-deco-none">{{$user->email}}</a>
                                </li>
                                <li class="list-group-item cld-font-size-13">
                                    <strong class="d-block text-uppercase">Web Site</strong>
                                    @if($user->website!=null)
                                    <a class="cld-text-gray-light1 text-deco-none" href="{{$user->website}}" target="_blank">{{$user->website}}</a>
                                    @else
                                    <a class="cld-text-gray-light1 text-deco-none" href="#">N.A</a>
                                    @endif
                                </li>
                               
                                
                            </ul>
                        </div>
                        <hr>
                        <div class="card-body ">
                            <h5 class="card-title font-weight-bold font-secondary cld-font-size-18 mt-1 mb-0" style="margin:auto">Working Time</h5>
                        </div>
                        <div class="sidebar-content list-bottom-border-light">
                            <ul class="list-group list-group-flush ">
                                <li class="list-group-item cld-font-size-13">
                                    <strong class="d-block text-uppercase">Summer</strong>
                                    <span class="cld-text-gray-light1 text-deco-none">Morning:{{$user->s_timing1}}</span> <br>
                                    <span class="cld-text-gray-light1 text-deco-none">Evening:{{$user->s_timing2}}</span>
                                </li>
                                <li class="list-group-item cld-font-size-13 ">
                                    <strong class="d-block text-uppercase">Winter</strong>
                                    <span class="cld-text-gray-light1 text-deco-none">Morning:{{$user->w_timing1}}</span> <br>
                                    <span class="cld-text-gray-light1 text-deco-none">Evening:{{$user->w_timing2}}</span>
                                </li>
                                
                                <li class="list-group-item cld-font-size-13">
                                	<strong class="d-block text-uppercase">Off Days</strong>
                                	<p>{{$user->off_days}}</p>
                                </li>
                                <hr>
                            </ul>
                        </div>
                        
                        
                    </div>
                    
                    <br>
                </div>
                <!-- content right-side -->
                <div class="col-sm-9">
                    <div class="card mb-4">
                        <h5 class="card-header font-weight-bold font-secondary bg-white pt-4 pb-4 cld-font-size-18">Profile Description</h5>
                        <div class="card-body p-4 mb-3">
                            <p class="card-text cld-font-size-13 cld-line-height">{{$user->about_us}}</p>
                        </div>
                    </div>
                    <div class="row" style="width: 100%;margin: auto">
                        <div class=" card mb-4" style="height: 10%">
                        <h3 style="margin-top: 10px" align="center">Our Gallery</h3>
                    <div class="owl-carousel owl-theme">
                        
                        @foreach($images as $img)
                        <div class="item">
                        <img style="height: 200px" src="{{asset('/public/image/'.$img)}}" >
                        </div>
                        @endforeach
                        
                    </div>                        
                    </div>
                    </div>
                    
                    
                    <div class="card mb-4">
                        <h5 class="card-header font-weight-bold font-secondary bg-white pt-4 pb-4 cld-font-size-18">Deals in:</h5>
                        <div class="card-body p-4 mb-3">
                            <ul class="doc-specialities list-unstyled">
                                <li>{{$user->category->category_name}}</li>
                                @foreach($categories as $c)
                                @foreach($others as $o)
                                @if($c->id==$o && $o!=$user->category_id)
                                <li>{{$c->category_name}}</li>
                                @endif
                                @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card mb-4" >
                        <div class="card-body pt-4 pb-2">
                            <h3 class="card-title font-weight-bold font-secondary cld-font-size-18 mt-2 mb-0" align="center">Contact Me</h3>
                        </div>
                        <form method="post" style="width: 80%;margin: auto" action="{{url('/query')}}">
                                @csrf
                                <div class="form-group mb-4">
                                    <input type="text" class="form-control box-shadow-none border-focus-dark border-width-3" name="name" id="inputSubject" placeholder="Enter Name">
                                </div>
                                <div class="form-group mb-4">
                                    <input type="email" class="form-control box-shadow-none border-focus-dark border-width-3" name="email" id="inputEmail" placeholder="Email">
                                    <input type="hidden" name="vid" value="{{$user->user_id}}">
                                </div>
                                <div class="form-group mb-4">
                                    <textarea class="form-control box-shadow-none border-focus-dark border-width-3" name="message" rows="5" id="inputMessage" placeholder="Enter Message"></textarea>
                                </div>
                                <div class="form-group mb-5">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg p-3 cld-font-size-14 font-secondary">SEND MESSAGE</button>
                                </div>
                            </form>
                        
                    </div>
                      <br>
                      <br>
                        
                        <div class="card mb-4" hidden>
                            <div class="card-body pb-2">
                            <h5 class="card-title font-weight-bold font-secondary cld-font-size-18 mt-2 mb-1" align="center">Claim the Listing</h5>
                        </div>
                            <form style="width: 80%;margin: auto">
                                <div class="form-group mb-4">
                                    <input type="text" class="form-control box-shadow-none border-focus-dark border-width-3" id="inputSubject1" placeholder="Enter Subject">
                                </div>
                                <div class="form-group mb-4">
                                    <textarea class="form-control box-shadow-none border-focus-dark border-width-3" rows="5" id="inputMessage1" placeholder="Enter Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg p-3 cld-font-size-14 font-secondary">SUBMIT CLAIM</button>
                                </div>
                            </form>
                        

                    </div>
                    
                    
                    
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function(){
         $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay:true,
    autoplayTimeout:1500,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})

        });
    </script>
</body>
@include('user.layouts.footer')
@endsection