@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

<br><br>
<div class="container">

                 <div class="col-md-10 blogShort post">
                   <h1>{{$post->title}}</h1>
                     {{-- <img src="#" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail"> --}}
                     
                        
                     <div class="body-content">
                      {{-- {{dd($post)}} --}}
                        {{$post->id}}.
                        {{$post->body}}
                     </div>
                        
                     {{-- <a class="btn btn-blog pull-right marginBottom10" href="#">READ MORE</a>  --}}
                 </div>
                 
</div>

</div>
</div>
</div>
@endsection