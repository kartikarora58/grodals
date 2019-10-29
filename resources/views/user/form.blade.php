@extends('user.layouts.app')
@extends('user.layouts.user')
@section('content')
<!-- form shuru shone wala hai -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
         <form enctype="multipart/form-data" style="width: 50%;margin:auto;" method="post" action="{{url('/user/register')}}">
          {{csrf_field()}}
           <div class="form-group">
             <label>Company Name</label>
             <input type="text" class="form-control" id="companyName" name="company_name"  placeholder="Enter company Name">

           </div>
           <div class="form-group">
             <label>Address 1</label>
             <input type="text" class="form-control" name="address1" id="address1" placeholder="first address" required>
           </div>
              <div class="form-group">
             <label for="exampleInputPassword1">Address 2</label>
             <input type="text" class="form-control" name="address2" id="address2" placeholder="second address">
           </div>
           <div class="form-group">
           <label>Country</label>
           <select required class="form-control" name="country">
            @foreach($countries as $c)
             <option value="{{$c->id}}">{{$c->country_name}}</option>
             @endforeach
           </select>
          </div>
          <div class="form-group">
           <label >States</label>
           <select class="form-control" name="state" id="state">
            @foreach($states as $s)
             <option value="{{$s->id}}">{{$s->state_name}}</option>
             @endforeach
           </select>
          </div>
         <div class="form-group">
           <label>City</label>
           <select class="form-control" name="city" id="city">
            @foreach($cities as $c)
             <option value="{{$c->id}}">{{$c->city_name}}</option>
             @endforeach
           </select>
          </div>
         
              <div class="form-group">
             <label>Pincode</label>
             <input type="text" class="form-control" name="pincode" id="pincode" placeholder="pincode">
            </div> 
            <div class="form-group">
             <label>Mobile Number</label>
             <input type="text" class="form-control" name="mobile" id="mobile" placeholder="mobile">
            </div>
            <div class="form-group">
             <label>Landline Number</label>
             <input type="text" class="form-control" name="landline" id="landline" placeholder="landline">
            </div>
            <div class="form-group">
             <label>Email</label>
             <input type="email" class="form-control" name="email" id="email" placeholder="email">
            </div>

            <div class="form-group">
            <label>Website</label>
            <input type="url" class="form-control" name="website" placeholder="Enter Website">
           </div>

    <div class="form-group">
            <label>About</label>
            <input type="text" class="form-control" name="about" placeholder="Enter About" required>
          
   </div>
  <div class="form-group">
            <label>Off Days</label>
            <input type="text" class="form-control" name="off_days" placeholder="Enter off days" >
          
   </div>
   <div class="form-group">
            <label>Contact Person</label>
            <input type="text" class="form-control" name="contact" placeholder="Contact person" required>
   </div>
   <div class="form-group">
            <label>Designaion</label>
            <input type="text" class="form-control" name="designation" placeholder="designation" required>
   </div>
   <div class="form-group">
            <label>Summer Timings</label><br>
           Morning Time: <input type="text" class="form-control" name="s_timing1" placeholder="Enter time" required>
           Evening Time: <input type="text" class="form-control" name="s_timing2" placeholder="Enter time" required>
          
   </div>

    <div class="form-group">
            <label>Winter Timings</label><br>
           Morning Time: <input type="text" class="form-control" name="w_timing1" placeholder="Enter time" required>
           Evening Time: <input type="text" class="form-control" name="w_timing2" placeholder="Enter time" required>
          
   </div>


    <div class="form-group">
            <label>Logo</label>
            <input type="file" class="form-control" name="logo" placeholder="" >
          
   </div>

   <div class="form-group">
            <label>Image Gallery</label>
            <input type="file" class="form-control" name="img[]" placeholder="Gallery" multiple>
            
          
   </div>
   <div class="form-group">
        <label>Business Category:</label><br>
    <select class="form-control" required="" name="category">
            @foreach($categories as $c)
             <option value="{{$c->id}}">{{$c->category_name}}</option>
             @endforeach
           </select>
   <div class="form-group">
</div>
    <label>Others:</label><br>
    @foreach($categories as $category)

    <input  type="checkbox" name="others[]" value="{{$category->id}}">{{$category->category_name}}<br>
    @endforeach
   
           <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    
@endsection
