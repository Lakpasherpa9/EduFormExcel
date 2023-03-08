<!DOCTYPE html>
<html>

<head>
	<title> excel </title>
	<link rel="stylesheet"
		href=
"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>

<body>
	<div class="container">
		<div class="card bg-light mt-3">
			<br><br>
			<div class="card-body">
				<form action="{{ route('import') }}"
					method="POST"
					enctype="multipart/form-data">
					@csrf
					<input type="file" name="file"
						class="form-control">
					<br>
					<button class="btn btn-success">
						Import User Data
					</button>
					{{-- <a class="btn btn-warning"
					href="{{ route('usersExport') }}">
							Export User Data
					</a> --}}
				</form>
				<br>

				


				<br>

				@if (\Session::has('success'))
    				<div class="alert alert-success">
       				 <ul>
           				<li>{!! \Session::get('success') !!}</li>
       				 </ul>

				@endif
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif


			{{-- starts here 
				//Creating on web table for the Imported data
				--}}
				<table class="table table-hover">
					
					<thead>
						<tr>
						
						  <th scope="col">Student ID</th>
						  <th scope="col">Name</th>
						  <th scope="col">email</th>  
						</tr>
					  </thead>

					  <tbody>
						@if(count($usersData))
							@foreach ($usersData as $user)
								<tr>
									{{-- <th scope="row">{{$userdata->id}}</th> --}}
									<td>{{$user->Student_Id}}</td>
									<td>{{$user->name}}</td> 
									<td>{{$user->email}}</td>
								</tr>
							@endforeach
						@else
							<tr>
								<th scope="row">Error</th>
													
							</tr>
						@endif
					  </tbody>

				  </table>
				  {{-- @endif --}}
			{{-- ends here --}}
    </div>

			</div>
		</div>
	</div>
 @yield('importFile');
</body>

</html>
