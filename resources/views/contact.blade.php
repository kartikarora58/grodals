@extends('user.layouts.app')
<link rel="stylesheet" type="text/css" href="{{asset('/public/css/contact.css')}}">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')
<style type="text/css">
	.parallax {
  /* The image used */
  background-image: url("{{asset('/public/image/contact.jpeg')}}");

  /* Set a specific height */
  min-height: 500px; 

  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
<div style="text-align: center;font-size: 300%;text-shadow: 2px 2px black;color: #EC898C">
	Contact Us
</div>
<div class="ad-inf-sec bg-light">
			<div class="container">
				<div class="address row">

					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-4 address-left text-center">
								<i class="far fa-map"></i>
							</div>
							<div class="col-md-8 address-right text-left">
								<h6>Address</h6>
								<p> 3759/2, Model Town Extension, Ludhiana, Punjab

								</p>
							</div>
						</div>

					</div>
					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-4 address-left text-center">
								<i class="far fa-envelope"></i>
							</div>
							<div class="col-md-8 address-right text-left">
								<h6>Email</h6>
								<p>Email :
									<a href="mailto:example@email.com"> info@grodals.com</a>
								</p>
							</div>

						</div>
					</div>
					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-4 address-left text-center">
								<i class="fas fa-mobile-alt"></i>
							</div>
							<div class="col-md-8 address-right text-left">
								<h6>Phone</h6>
								<p>+91-9888500487</p>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
<div class="parallax">

</div>
		
		<div class="container">
			<div class="contact_grid_right">
				<form action="#" method="post">
					<div class="row contact_left_grid">
						<div class="col-md-6 con-left">
							<div class="form-group">
								<label for="validationCustom01 my-2">Name</label>
								<input class="form-control" type="text" name="Name" placeholder="" required="">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Email</label>
								<input class="form-control" type="email" name="Email" placeholder="" required="">
							</div>
							<div class="form-group">
								<label for="validationCustom03 my-2">Subject</label>
								<input class="form-control" type="text" name="Subject" placeholder="" required="">
							</div>
						</div>
						<div class="col-md-6 con-right">
							<div  class="form-group">
								<label for="textarea">Message</label>
								<textarea id="textarea" class="form-control" placeholder=""></textarea>
							</div>
							<input style="width: 100%" class="form-group" type="submit" value="Submit">
						</div>
					</div>
				</form>
			</div>
		</div>
		<br>
		<div class="container-fluid">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13696.104950954497!2d75.834673!3d30.885927!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd9ee63754098857b!2sMicrochip%20Computers!5e0!3m2!1sen!2sin!4v1567243683021!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
			
		</div>
		@include('user.layouts.footer')

@endsection