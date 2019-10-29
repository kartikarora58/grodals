@extends('user.layouts.app')
@extends('user.layouts.user')
@section('content')
<!-- form shuru shone wala hai -->
<style>
  @media only screen and (max-width: 1000px) {
  #form {
    margin-left: 10px;
  }
}
</style>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
         <div id="qw" style="width: 50%;margin:auto" id="form" >
         <form  enctype="multipart/form-data"  method="post" action="{{url('/user/edit')}}">
          <input type="hidden" name="_method" value="patch">
          {{csrf_field()}}
           <div class="form-group">
             <label>Company Name</label>
             <input  type="text" class="form-control" value="{{$users->company_name}}" id="companyName" name="company_name"  placeholder="Enter company Name">

           </div>
           <div class="form-group">
             <label>Address 1</label>
             <input type="text" class="form-control" value="{{$users->address1}}" name="address1" id="address1" placeholder="first address" required>
           </div>
              <div class="form-group">
             <label for="exampleInputPassword1">Address 2</label>
             <input type="text" class="form-control" name="address2" value="{{$users->address2}}" id="address2" placeholder="second address">
           </div>
           <div class="form-group">
           <label>Country</label>
           <select required class="form-control" name="country">
            @foreach($countries as $key=>$c)
             <option value="{{++$key}}" {{$key==$users->country_id ? 'selected' : ''}}>{{$c->country_name}}</option>
             @endforeach
           </select>
          </div>
          <div class="form-group">
           <label >States</label>
           <select class="form-control" name="state" id="state">
            @foreach($states as $key=>$s)
             <option value="{{++$key}}" {{$key==$users->state_id ? 'selected' : ''}}>{{$s->state_name}}</option>
             @endforeach
           </select>
          </div>
         <div class="form-group">
           <label>City</label>
           <select class="form-control" name="city" id="city">
            @foreach($cities as $key=>$c)
             <option value="{{++$key}}" {{($key==$users->city_id) ? 'selected' : ''}}>{{$c->city_name}}</option>
             @endforeach
           </select>
          </div>
         
              <div class="form-group">
             <label>Pincode</label>
             <input type="text" class="form-control" value="{{$users->pincode}}" name="pincode" id="pincode" placeholder="pincode">
            </div> 
            <div class="form-group">
             <label>Mobile Number</label>
             <input type="text" class="form-control" value="{{$users->mobile}}" name="mobile" id="mobile" placeholder="mobile">
            </div>
            <div class="form-group">
             <label>Landline Number</label>
             <input type="text" class="form-control" value="{{$users->landline}}" name="landline" id="landline" placeholder="landline">
            </div>
            <div class="form-group">
             <label>Email</label>
             <input type="email" class="form-control" value="{{$users->email}}" name="email" id="email" placeholder="email">
            </div>

            <div class="form-group">
            <label>Website</label>
            <input type="url" class="form-control" value="{{$users->website}}" name="website" placeholder="Enter Website" >
           </div>

    <div class="form-group">
            <label>About</label>
            <input type="text" class="form-control" value="{{$users->about_us}}" name="about" placeholder="Enter About" required>
          
   </div>
  <div class="form-group">
            <label>Off Days</label>
            <input type="text" class="form-control" value="{{$users->off_days}}" name="off_days" placeholder="Enter off days" >
          
   </div>
   <div class="form-group">
            <label>Contact Person</label>
            <input type="text" class="form-control" value="{{$users->contact_person}}" name="contact" placeholder="Contact person" required>
   </div>
   <div class="form-group">
            <label>Designaion</label>
            <input type="text" class="form-control" value="{{$users->designation}}" name="designation" placeholder="designation" required>
   </div>
   <div class="form-group">
            <label>Summer Timings</label><br>
           Morning Time: <input type="text" class="form-control" value="{{$users->s_timing1}}" name="s_timing1" placeholder="Enter time" required>
           Evening Time: <input type="text" class="form-control" value="{{$users->s_timing2}}" name="s_timing2" placeholder="Enter time" required>
          
   </div>

    <div class="form-group">
            <label>Winter Timings</label><br>
           Morning Time: <input type="text" class="form-control" value="{{$users->w_timing1}}" name="w_timing1" placeholder="Enter time" required>
           Evening Time: <input type="text" class="form-control" value="{{$users->w_timing2}}" name="w_timing2" placeholder="Enter time" required>
          
   </div>


    <div class="form-group">
            <label>Logo</label>
            <input type="file" class="form-control" name="logo" placeholder="" >
            <img src="{{asset('/public/image/'.$users->logo)}}" width="200" height="200">
          
   </div>

   <div class="form-group">
            <label>Image Gallery</label>
            <input type="file" class="form-control" name="img[]" placeholder="Gallery" multiple>
           @foreach($image as $key=>$img)
           <img src="{{asset('/public/image/'.$img)}}" width="200" height="200">  
           @endforeach
          
   </div>
   <div class="form-group">
        <label>Business Category:</label><br>
    <select class="form-control" required="" name="category">
            @foreach($categories as $key=>$c)
             <option value="{{++$key}}" {{($key==$users->category_id) ? ' selected ' : ''}}>{{$c->category_name}}</option>
             @endforeach
           </select>
   <div class="form-group">
</div>
    <label>Others:</label><br>
    @foreach($categories as $category)
    @php
    $x=0
    @endphp
    @foreach($others as $other)
    @if($category->id==$other)
    <input type="checkbox" name="others[]" value="{{$category->id}}" checked>{{$category->category_name}}<br>
    @php
    $x=1
    @endphp
    @endif
    @endforeach
    @if($x!==1)
    <input type="checkbox" name="others[]" value="{{$category->id}}" >{{$category->category_name}}<br>
    @endif
    @endforeach
   


    
    
   
           <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
   
<script>

    
@endsection
