@extends('layout.post')

</head>
<body>
<div class="container">

                 {{-- <div class="col-md-10 blogShort post">
                     <h1>{{$post->title}}</h1><article><p> Notice 1</p></article>
                 </div> --}}
            @foreach ($post as $post)
            <div class="col-md-10 blogShort post">
                <h1>{{$post->title}}</h1>
                <article><p>{{$post->body}}</p></article>
            </div>
            @endforeach     
                 
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
</html>