<!doctype html>
<html lang="en">
   <head>
      <title>Laravel 8 Send Email with PDF Attachment</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   </head>
   <body>
      <div class="container">
      @if(session('success'))
         <div class="alert alert-success">
           {{session('success')}}
         </div>
       @endif
   <form action="" method="" ></form>
         <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-12 m-auto">
               <table>
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Program</th>
                        <th>Semester</th>
                     </tr>
                  </thead>
                 
                     <tr>
{{--                     
                     <td>{{$data->id}}</td>
                     <td>{{$data->name}}</td>
                     <td>{{$data->program}}</td>
                     <td>{{$data->semester}}</td> --}}
                    
                     <td>15</td>
                     <td>Sachin</td>
                     <td>BE Computer</td>
                     <td>8</td>
                     </tr>
                
                  </tbody>
               </table>
            </div>
         </div>
      </form>
      {{-- <form action="{{route('admitCard',['id'=>$data->id,'email'=>$data->email]) }}" method="POST"></form>
         {{-- <div>
            {{-- <a href="{{route('admitCard',['id'=>$data->id,'email'=>$data->email]) }}" class="btn btn-success">Confirm</a> --}}
            {{-- <a href="{{route('admitCard',['data'=>$data]) }}" class="btn btn-success">Confirm</a>
          </div>  --}}
          {{-- <button>Confirm</button>  --}}
      </div>
   </body>
</html>