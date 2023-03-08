@extends('navbar')

<br>
<br>
<br><br><br>
<br><br><br>
@extends('layout.post')

<br><br>
<div class="container">

                 <div class="col-md-10 blogShort post">
                   <h1>{{$post->title}}</h1>
                     {{-- <img src="#" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail"> --}}
                     
                        
                     <div class="body-content">
                        {{$post->id}}.
                        {{$post->body}}
                     </div>
                        
                     {{-- <a class="btn btn-blog pull-right marginBottom10" href="#">READ MORE</a>  --}}
                 </div>
                 
</div>

