@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

<div class="container mt-2 mb-2 pd-2">

    
  <br>
    @if(session('success'))
      <div class="alert alert-success">
        {{session('success')}}
      </div>
    @endif

  
  <br>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Faculty</th>

            <th scope="col">Program</th>
            <th scope="col">Semester</th>
            {{-- <th scope="col">Token</th> --}}
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($payments as $payment)
            {{-- {{dd($user)}} --}}
            <tr>
                <th scope="row">{{ $payment->id }}</th>
                <td>{{ $payment->name }}</td>
                <td>{{ $payment->email }}</td>
                <td>{{ $payment->faculty }}</td>

                <td>{{$payment->program}}</td>
                <td>{{$payment->semester}}</td>
                {{-- <td>{{$payment->token}}</td> --}}
                <td>{{$payment->status}}</td>
                <td>
                    {{-- <a href="{{route('sendpdf',['id'=>$payment->id,'email'=>$payment->email]) }}" class="btn btn-success">Send  Admit card</a> --}}
                  
                    <a href="{{route('admitCard',['id'=>$payment->id,'email'=>$payment->email]) }}" class="btn btn-success">Send  Admit card</a>
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