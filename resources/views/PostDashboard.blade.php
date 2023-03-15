

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <script>
            <script>
    $(document).ready(function() {
        $('.delete-post').click(function() {
            var postId = $(this).data('post-id');
            if (confirm('Are you sure you want to delete this post?')) {
                $.ajax({
                    url: '/posts/' + postId,
                    type: 'DELETE',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function() {
                        alert('Post deleted successfully!');
                        location.reload();
                    },
                    error: function() {
                        alert('There was an error deleting the post.');
                    }
                });
            }
        });
    });
</script>

          </script>

<body>
<div class="container">

                 {{-- <div class="col-md-10 blogShort post">
                     <h1>{{$post->title}}</h1><article><p> Notice 1</p></article>
                 </div> --}}
            {{-- @foreach ($posts as $post)
            <div class="col-md-10 blogShort post">
                <h1>{{$post->title}}</h1>
                <article><p>{{$post->body}}</p></article>
            </div>
            @endforeach      --}}
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Title</th>
                      <th>Body</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($posts as $post)
                      <tr>
                          <td>{{ $post->AdminName }}</td>
                          <td>{{ $post->title }}</td>
                          <td>{{ $post->body }}</td>
                          <td>
                            <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                              @csrf
                              @method('DELETE')
                              {{-- <a href="{{ route('posts.edit', $post->id) }}">Edit</a> --}}
                              <button type="submit" class="btn btn-danger delete-post" >Delete</button>
                          </form>                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
          
          
                 
                  {{-- <div class="col-md-10 blogShort post">
                     <h1>Title 3</h1>
                     <article><p>
                            Notice 3
                         </p></article>
                 </div> --}}
                 
               <div class="col-md-12 gap10"></div>
             </div>
</div>

</body>
</div>
</div>
</div>
@endsection