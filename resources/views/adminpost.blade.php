@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
    <head>
        <title>Email Posting</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <style>
            .post{
                                
                    width: 50%;
                    margin: 0 auto;


            }
        </style>
    </head>
    <div class="post">
        <h4 class="display-2  text-primary">Admin Posting</h4>
    </div>
    
    <div class="container py-md-5 container--narrow">
      <h3>
        Please fill the data for the posts
      </h3>
        <form action="{{route('showpost')}}" method="POST">
          @csrf
          <div class="form-group">
            <label for="post-title" class="text-muted mb-1"><small>Title</small></label>
            <input value="{{old('title')}}" name="title" id="post-title" class="form-control form-control-lg form-control-title" type="text" placeholder="Title" autocomplete="off" required />
            @error('title')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>
    
          <div class="form-group">
            <label for="post-body" class="text-muted mb-1"><small>Body Content</small></label>
            <textarea name="body" id="post-body" class="body-content tall-textarea form-control" type="text" placeholder="Your Text">{{old('body')}}</textarea>
            @error('body')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>
    
          <button class="btn btn-primary">Save New Post</button>
        </form>
      </div>
    </div>
  </div>
  </div>
  @endsection