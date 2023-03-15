{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach ($posts as $post)
                    
                <div class="card-header">{{ $post->title }}</div>

                <div class="card-body">
                    {{ $post->body }}
                </div>

                <div class="card-footer">
                    Posted by {{ $post->AdminName }} on {{ $post->created_at->format('F j, Y') }}
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection --}}


{{-- //Alternate --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($posts as $post)
            <div class="card">
                <div class="card-header">{{$post->id}}</div>

                <div class="card-body">
                    @if (count($posts) > 0)
                        <div class="list-group">
                                {{-- <a href="{{ route('posts.show', $post) }}" class="list-group-item list-group-item-action"> --}}
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $post->title }}</h5>
                                        <small>{{ $post->created_at->format('F j, Y') }}</small>
                                    </div>
                                    <p class="mb-1">{{ $post->body }}</p>
                                    <small>Posted by {{ $post->AdminName }}</small>
                                </a>
                        </div>
                    @else
                        <p>No posts found.</p>
                    @endif
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
