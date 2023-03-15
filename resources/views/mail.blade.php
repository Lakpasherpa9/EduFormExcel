@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

<div class="container mt-2 mb-2 pd-2">

    <a href="{{ route('emailViewAll') }}" class="btn btn-primary">Send Email To All Users</a>
  <br>
    @if(session('sucess'))
      <div class="alert alert-success">
        {{session('success')}}
      </div>
      <p> User: {{session('users')}}</p>
    @endif

    @if(session('message'))
      <div class="alert alert-success">
        {{session('message')}}
      </div>
      <p> User: {{session('users')}}</p>
    @endif
  <br>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">User</th>
            <th scope="col">Email</th>
            <th scope="col">Send Email</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)
            {{-- {{dd($user)}} --}}
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{$user->Student_Id}}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('emailView', $user->id) }}" class="btn btn-success">Send  Email</a>
                </td>
              </tr>
            @endforeach


        </tbody>
      </table>
</div>
</div>
</div>
</div>
@endsection