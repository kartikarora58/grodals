@extends('user.layouts.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
  
    <div class="container">
      <form>
      
          <div class="form-group">
            <label>Select Category:</label>
            <select class="form-control" id="category_id">
              <option value="all">All</option>
              @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->category_name}}</option>
              @endforeach
            </select>
           
          </div>
           <a href="#" class="btn btn-outline-primary" id="submit">Submit</a>
        
      </form>     
      
      <hr>
            <table class="table table-striped table-condensed table-hover table-light" id="table">
               <thead>
                  <tr>
                     
                     <th>Name</th>
                     <th>Address</th>
                     <th>Phone No</th>
                     <th>Detail</th>
                  </tr>
               </thead>
            </table>
         </div>
         @include('user.layouts.footer')
         
       <script>
      
       	$(document).ready(function(){
          $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

         
               $('#table').DataTable({
			   responsive:true,
               processing: true,
               serverSide: true,
               ajax: 
               {
                url:'{{ url('data') }}',
                type:'GET',
                data:function(d)
                {
                  d.id=$('#category_id').val();
                }
              },
               
               columns: [
                        
                        { data: 'company_name', name: 'company_name' },
                        { data: 'address1', name: 'address1' },
                        {data:'mobile',name:'mobile'},
                        {data: 'action',name:'action',orderable:false}

                     ]
            });
         
         $('#submit').click(function(){
     $('#table').DataTable().draw(true);
  });
         
     });
         </script>
         
</body>
</html>

@endsection