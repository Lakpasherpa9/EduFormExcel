 @extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Filter Students</div>

                <div class="card-body">
                    <form method="GET" action="{{route('viewstudents')}}">
                        <div class="form-group row">
                            <label for="faculty" class="col-md-4 col-form-label text-md-right">Faculty</label>

                            <div class="col-md-6">
                                <select id="faculty" name="faculty" class="form-control">
                                            <option value="">-- Select Faculty --</option>
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty  ->faculty }}">{{ $faculty->faculty}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    <div class="form-group row">
                            <label for="faculty" class="col-md-4 col-form-label text-md-right">Program</label>
                        <div class="col-md-6">
                            <select id="program" name="program" class="form-control">
                                <option value="">-- Select Program --</option> --}}
                                @foreach($programs as $program)
                                    <option value="{{ $program->program }}">{{ $program->program}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>    
                        <div class="form-group row">
                            <label for="semester" class="col-md-4 col-form-label text-md-right">Semester</label>

                            <div class="col-md-6">
                                <select id="semester" name="semester" class="form-control">
                                    <option value="">-- Select Semester --</option>
                                        @foreach($semesters as $semester)
                                            <option value="{{ $semester->semester }}">{{ $semester->semester }}</option>
                                        @endforeach
                                </select>
                            </div>
                            
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Filter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <br>

            <div class="card">
                <div class="card-header">Students</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>StudentID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Faculty</th>
                                <th>Program</th>
                                <th>Semester</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $student)
                                <tr>    
                                    <td>{{$student->studentid }}</td>
                                    <td>{{$student->name }}</td>
                                    <td>{{$student->email }}</td>
                                    <td>{{$student->faculty }}</td>
                                    <td>{{$student->program}}</td>
                                    <td>{{$student->semester}} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
{{--  --}}