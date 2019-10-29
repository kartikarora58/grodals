@extends('admin.layouts.adminapp')
@extends('admin.layouts.admin')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="alert alert-success" id="success"></div>
<div align="center"><button id="refresh" class="btn btn-outline-primary">Refresh</button></div><br>
@if($users->isEmpty())

  <div style="width: 70%;margin:auto" align="center"   class="alert alert-info">
      Empty
  </div>

@else
<table align="center" style="width: 50%;border-style: " class="table table-bordered" id="table">
  @php
  $i=0
  @endphp
  <thead class="table table-dark">
  <tr>
    <th>S.No</th>
    <th>Company Name</th>
    <th>Action</th>
  </tr>
</thead>
  @foreach($users as $user)
  <tr>
    <td>{{++$i}}</td>
    <td>{{$user->company_name}}</td>
    <td><button href="#" value="{{$user->id}}" class=" btn btn-info view" >View Profile</button></td>
    
  </tr>
  @endforeach
</table>
@endif

<!-- modal starts -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="myform">
          @csrf
          <div class="form-group">
          Company Name:<input disabled class="form-control" type="text" id="company_name"  name="name">
          </div>
          <div class="form-group">
            Address 1:<input disabled type="text" class="form-control" id="address1">
          </div>
          <div class="form-group">
            Address 2:<input value="N.A"  disabled type="text" class="form-control" id="address2">
          </div>
          <div class="form-group">
            country:<input disabled class="form-control" type="text" name="" id="country">
          </div>
           <div class="form-group">
            State:<input disabled class="form-control" type="text" name="" id="state">
          </div>
          <div class="form-group">
            City:<input disabled class="form-control" type="text" name="" id="city">
          </div>
           <div class="form-group">
            Pincode:<input disabled class="form-control" type="text" name="" id="pincode">
          </div>
          <div class="form-group">
            Mobile:<input disabled class="form-control" type="text" name="" id="mobile">
          </div>
          <div class="form-group">
            Landline:<input disabled class="form-control" type="text" name="" id="landline">
          </div>
          <div class="form-group">
            Email:<input disabled class="form-control" type="text" name="" id="email">
          </div>
          <div class="form-group">
            Website:<input disabled class="form-control" type="text" name="" id="website">
          </div>
          <div class="form-group">
            About:<input disabled class="form-control" type="text" name="" id="about">
          </div>
          <div class="form-group">
            Off Days:<input disabled class="form-control" type="text" name="" id="offdays">
          </div>
          <div class="form-group">
            Contact Person:<input disabled class="form-control" type="text" name="" id="contact">
          </div>
          <div class="form-group">
            Designation:<input disabled class="form-control" type="text" name="" id="designation">
          </div>
          <div class="form-group">
            <b>Summer Timing</b> <br>
            Morning:<input disabled class="form-control" type="text" name="" id="smorning">
            Evening:<input disabled class="form-control" type="text" name="" id="sevening">
          </div>
           <div class="form-group">
            <b>Winter Timing</b><br>
            Morning:<input disabled class="form-control" type="text" name="" id="wmorning">
            Evening:<input disabled class="form-control" type="text" name="" id="wevening">
          </div>
          <div class="form-group">
           Logo:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img width="100px" height="100px" src="" id="logo">
          </div>
           <b><hr size="50px"></b>
          <div class="form-group">
            <label id="images" id="images">Gallery:</label><br>
          </div>
          <div class="form-group">
            Main Business:<input disabled type="text" id="category" class="form-control">
          </div>
          <div class="form-group">
           Also Deals in:<br><select disabled id="others" multiple="multiple">
             
           </select>
          </div>
         
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="approval" class="btn btn-primary approval">Approve</button>
        
        
      </div>
    </div>
  </div>
</div>
<!-- modal ends -->
<script>
// Basic example
$(document).ready(function () {
  $('#success').hide();
  $('#refresh').click(function()
  {
      location.reload();
  });
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });
   
   $('.view').click(function(){
           var user_id=$(this).val();
            console.log(user_id);          
              $.get('/training/grodal/admin/check/'+user_id,function(data){
                   console.log(data);
                  $('#company_name').val(data.user.company_name);
                  $('#address1').val(data.user.address1);
                  $('#address2').val(data.user.address2===null?'N.A':data.user.address2);
                  $('#country').val(data.country.country_name);
                  $('#state').val(data.state.state_name);
                  $('#city').val(data.city.city_name);
                  $('#pincode').val(data.user.pincode);
                  $('#mobile').val(data.user.mobile);
                  $('#landline').val(data.user.landline===null?'N.A':data.user.landline);
                  $('#email').val(data.user.email);
                  $('#website').val(data.user.website);
                  $('#about').val(data.user.about_us);
                  $('#offdays').val(data.user.off_days);
                  $('#contact').val(data.user.contact_person);
                  $('#designation').val(data.user.designation);
                  $('#smorning').val(data.user.s_timing1);
                  $('#sevening').val(data.user.s_timing2);
                  $('#wmorning').val(data.user.w_timing1);
                  $('#wevening').val(data.user.w_timing2);
                  $('#category').val(data.category.category_name);
                  $('#approval').val(data.user.id);
                  
                   var y=JSON.parse(data.user.others);
                   console.log(y);
                   $('.others').remove();
                   $.each(data.categories,function(index,value){
                     $.each(y,function(index1,value1)
                     {
                        if(value.id==value1)
                        {
                          $('#others').append('<option class="others">'+value.category_name+'</option>');
                        }

                     });

                   });
                $('#logo').attr('src','{{url("/image")}}'+'/'+data.user.logo);
                var x=JSON.parse(data.user.gallery);
                console.log(x);
               if(x.length<1)
               {
               $('.gallery').remove();
               $('#images').text('Gallery:N.A');
              }
              else
              {
                 $('.gallery').remove();
                 $('#images').text('Gallery :');
                $.each(x, function (index, value) {     
                 $("#images").after('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img width="100px" class="gallery" height="100px" src=""  id="gallery">');
                 $('#gallery').attr('src','{{url("/image")}}'+'/'+value);
                 });
              }
              $('#mymodal').modal('toggle');

   });
    });
   $('.approval').click(function(){
       var id=$(this).val();
       console.log(id);
       $.get('/training/grodal/admin/approve/'+id,function(data){
        $('#success').show();
                 $('#success').text('Approval Successfull.Please Refresh the page.');
       });
       $('#mymodal').modal('toggle');

   });
    
});
</script>
@endsection