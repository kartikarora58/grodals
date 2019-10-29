@extends('user.layouts.app')
@extends('user.layouts.user')
@section('content')
<div class="container">
	@php
	$i=1
	@endphp
	<div class="row">
		<table class="table table-hover table-striped table-bordered">
			    <tr>
				<th>S.No</th>
				<th>Name</th>
				<th>E-Mail</th>
				<th>Message</th>
				<th>Date and time</th>
				<th>Actions</th>
			</tr>
				@foreach($queries as $query)
				<tr>
				<td>{{$i}}</td>
				<td>{{$query->name}}</td>
				<td>{{$query->email}}</td>
				<td>{{$query->message}}</td>
				<td>{{$query->created_at->format('d-M-Y h:ia')}}</td>
				<td><a href="{{url('/user/reply/'.$query->id)}}" class="btn btn-primary">Reply</a></td>
			</tr>
			@php
			$i++
			@endphp
			@endforeach
		</table>
		{{$queries->links()}}
	</div>
	
</div>

@endsection