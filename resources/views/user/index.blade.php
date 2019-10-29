@extends('user.layouts.app')
@extends('user.layouts.user')
@section('content')
<div class="conatiner">
	<div class="row">
	<div align="center" class="col-md-3">
		<img  src="{{asset('/image/'.$users->logo)}}" width="200" height="200">
	</div>
	<div  class="col-md-9">
		<table  class="table">
			<tr><th>Company Name: {{$users->company_name}}</th></tr>
				@if($users->landline==NULL)
				<tr><th>Phone: {{$users->mobile}}</th></td>
				@else
				<tr><th>Phone: {{$users->mobile}}, {{$users->landline}}</th></td>
				@endif
			<tr><th>Email: {{$users->email}}</th></tr>
			@if($users->address2==NULL)
		    <tr><th>Address: {{$users->address1}},{{$users->city->city_name}}, {{$users->state->state_name}}, {{$users->country->country_name}}</th></tr>
            @else
            <tr><th>Address 1: {{$users->address1}},{{$users->city->city_name}}, {{$users->state->state_name}}, {{$users->country->country_name}}<br>
             Address 2: {{$users->address2}},{{$users->city->city_name}}, {{$users->state->state_name}}, {{$users->country->country_name}}</th></tr>
		    @endif
			
		</table>
	</div>
	</div>
</div>
@endsection