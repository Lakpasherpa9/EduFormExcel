@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">

<head>
	<title> excel </title>
	<link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
	<style>
						.btn-label {
							position: relative;
							left: 12px;
							display: inline-block;
							padding: 6px 12px;
							background: rgba(0, 0, 0, 0.15);
							border-radius: 3px 0 0 3px;
						}

						.btn-labeled {
							padding-top: 0;
							padding-bottom: 0;
						}

						.btn {
							margin-bottom: 10px;
						}
	</style>
</head>
<body>	
	<div class="container">
		<div class="card bg-light mt-3">
			<br><br>
			<div class="card-body">	
				<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<input type="file" name="file" class="form-control" onchange="console.log(this.files[0])">
					<br>
					<button class="btn btn-success">
						Import User Data
					</button>
							{{-- Filter garna ko lagi HTML code --}}
						
							{{-- Filter ko HTML code yaha sidhinxa --}}


					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

					{{-- <a class="btn btn-warning"
					href="{{ route('usersExport') }}">
							Export User Data
					</a> --}}
				</form>
				<br><br>
				@if (\Session::has('success'))
    				<div class="alert alert-success">
       				 <ul>
           				<li>{!! \Session::get('success') !!}</li>
       				 </ul>
				@endif
				@if (\Session::has('message'))
    				<div class="alert alert-success">
       				 <ul>
           				<li>{!! \Session::get('message') !!}</li>
       				 </ul>
				@endif
				@if (\Session::has('fails'))
				<div class="alert alert-danger">
					<ul>
					   <li>{!! \Session::get('fails') !!}</li>
					</ul>
				@endif
				@if (\Session::has('excelError'))
				<div class="alert alert-danger">
					<ul>
					   <li>{!! \Session::get('excelError') !!}</li>
					</ul>
				@endif
				@if (\Session::has('msg'))
				<div class="alert alert-primary">
					<ul>
					   <li>{!! \Session::get('msg') !!}</li>
					</ul>
				@endif

				<form action="{{ route('search') }}" method="GET">
					<input type="text" name="query" placeholder="Search...">
					<button type="submit">Search</button>
				</form>
				<table class="table table-hover">
					{{-- starts here 
				//Creating on web table for the Imported data
				--}}
				<table class="table table-hover">	
					<thead>
						<tr class="user-row">	
						  {{-- <th scope="col">Student ID</th> --}}
						  <th scope="col">Id</th>
						  <th scope="col">Student Id</th>
						  <th scope="col">Name</th>
						  <th scope="col">email</th>  
						  <th scope="col">Faculty</th>  
						  <th scope="col">Program</th>  
						  <th scope="col">Semester</th>  
						  <th scope="col">Update</th>  
						  <th scope="col">Remove</th>  

						  {{-- <th scope="col">Action</th>   --}}
						</tr>
					  </thead>
					  <tbody>
						@if(count($usersData))
							@foreach ($usersData as $user)
								<tr>
									{{-- <th scope="row">{{$userdata->id}}</th> --}}
									{{-- <td>{{$user->Student_Id}}</td> --}}						
										<td>{{$user->id}}</td>
										<td>{{$user->studentid}}</td>
										<td>{{$user->name}}</td>
										<td>{{$user->email}}</td>
										<td>{{$user->faculty}}</td>
										<td>{{$user->program}}</td>
										<td>{{$user->semester}}</td>
									
									<td><button class="btn-outline-primary btn-labeled editBtn ">Edit</button></td>
									<td>
										<form action="{{route('deleteRow', $user->id)}}" method="POST">
											@csrf
											@method('DELETE')
											<button class="bt btn-outline-danger" type="submit">Delete</button>
										</form> 
									</td>
									<td>
										<form action="{{ route('updateRow', $user->id) }}" method="POST" style="display:none" id="updateRow">
											@csrf
											@method('PUT')
											<input type="text" name="name" value="{{ $user->name }}" id="updateNameField"> 
											<input type="email" name="email" value="{{ $user->email }}" id="updateEmailField">
											<button type="submit" class='bt btn-outline-danger'>Save</button>
										</form>
									</td>
								</tr>
							@endforeach
						@endif
					  </tbody>
				  </table>
				<br><br>
    </div>
			</div>
		</div>
	</div>
 {{-- @yield('importFile'); --}}
</body>
<script>
	const editBtns =document.querySelectorAll('.editBtn');
	const updateRow =document.querySelectorAll('#updateRow');
// if(editBtns.length){}
	// editBtns.forEach((edit,index) => {});//calling back every buttons for that momment
	editBtns.forEach((editBtn,index )=>{
		const updateRows= updateRow[index];
		console.log(`Event listener to edit button ${index}`);
		console.log(`Event listener to update row ${updateRows}`);

			editBtn.addEventListener('click',()=>{
				console.log(`The edit button $[index] has been clicked`);
			if (updateRows.style.display==='block'){
				updateRows.style.display ='none';
			}
			else{
				updateRows.style.display ='block';		
			}
		});
	});


	//Filter scripts
    const filterType = document.getElementById('filterType');
    const filterSport = document.getElementById('filterSport');
    const userRows = document.querySelectorAll('.user-row');

    // Add event listeners to filter options to filter the rows
    filterType.addEventListener('change', () => {
        filterRows();
    });

    filterSport.addEventListener('change', () => {
        filterRows();
    });
</script>
</div>
</div>
</div>
@endsection