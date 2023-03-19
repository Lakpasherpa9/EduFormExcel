@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('admin.update.password') }}" name='change-password'>
                @csrf
            
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" id="current_password" name="current_password" class="form-control">
                </div>
            
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" id="new_password" name="new_password" class="form-control">
                </div>
            
                <div class="form-group">
                    <label for="new_password_confirmation">Confirm New Password</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control">
                </div>
            
                <button type="submit" class="btn btn-primary">Update Password</button>
                @if(session()->has('success'))
                      <div class="alert alert-success">
                   {{ session()->get('success') }}
                     </div>
                    @endif
                    
               
            </form>
        </div>
    </div>
</div>
@endsection 
            