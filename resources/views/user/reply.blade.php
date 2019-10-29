@extends('user.layouts.app')
@extends('user.layouts.user')
@section('content')
<div class="container" style="width: 50%">
	<form method="post" action="{{url('/user/reply')}}">
		@csrf
		<div class="form-group">
			<label>E-mail:</label>
			<input class="form-control" type="email" name="email" value="{{$user->email}}" readonly>
		</div>
		<div class="form-group">
			<label>Subject:</label>
			<input class="form-control" type="text" name="subject" >
		</div>
		<div class="form-group">
			<label>Message:</label>
			<textarea class="form-control" name="message" style="height: 150px"></textarea>
		</div>
		<input type="submit" name="submit" value="Send" class="btn btn-success form-control">
	</form>
	
</div>
@endsection