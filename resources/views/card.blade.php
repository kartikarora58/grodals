@extends('user.layouts.app')
@section('content')
<style type="text/css">
  #id {
  
  max-width: 900px;
  margin: 30px auto;
  padding: 20px;
  height: 80%
</style>
<div class="container-fluid " style="height: 80%">
<br>
  <div class="row">
  @foreach($users as $user)
  <div class="col-md-3" align="center">
    <div class="flex flex-wrap -m-3" id="id">
  <div class="w-full sm:w-1/2 md:w-1/3 flex flex-col p-3">
    <div  class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col">
      <img src="{{asset('/public/image/'.$user->logo)}}" width="100%" height="auto">
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

@include('user.layouts.footer')
@endsection