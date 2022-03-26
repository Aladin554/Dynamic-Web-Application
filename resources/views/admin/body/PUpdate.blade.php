@extends('admin.admin_master')
@section('admin')

<div class="card-body">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Update Profile</h2>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{session('success')}}</strong>
          </div>
          @endif

<form method="POST" action="{{route('profile.update')}}"  enctype="multipart/form-data">
    @csrf
    
    <div class="form-group">
        <label for="exampleFormControlInput3">Change Image</label>
        <input type="file" class="form-control"  name="profile_photo_path" value="{{$user['profile_photo_path']}}">

       
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput3">Change Name</label>
        <input type="text" class="form-control"  name="name" value="{{$user['name']}}">

       
    </div>


    <div class="form-group">
        <label for="exampleFormControlPassword3">Change Email</label>
        <input type="email" class="form-control"  name="email" value="{{$user['email']}}" >

    </div>


    <button type="submit" class="btn btn-primary btn-default">Update</button>
    
</form>
</div>

@endsection