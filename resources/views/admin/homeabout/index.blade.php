@extends('admin.admin_master')
@section('admin')
    
    <div class="py-12">
        <div class="container">
        <div class="row">
<h4>Home About</h4>

<a href="{{route('add.homeabout')}}"><button class="btn btn-info">Add Slider</button></a>
<br><br>
<div class="col-md-12">
    <div class="card">

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{session('success')}}</strong>
          </div>
          @endif

        <div class="card-header">All slider</div>
    
        <table class="table">
  <thead>
    <tr>
      <th scope="col" style="width: 5%">ID</th>
      <th scope="col" style="width: 15%">Title</th>
      <th scope="col" style="width: 25%">Short Description</th>
      <th scope="col" style="width: 15%">Long Description</th>
      <th scope="col" style="width: 15%">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i=1)
    @foreach($homeabout as $about)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$about->title}}</td>
      <td>{{$about->short_dis}}</td>
      <td>{{$about->long_dis}}</td>
      
      
      
      <td><a href="{{url('homeabout/edit/'.$about->id)}}" class="btn btn-info">Edit</a>
        <a href="{{url('homeabout/delete/'.$about->id)}}" onclick="
          return confirm('Are you sure for delete')" class="btn btn-danger">delete</a>
      </td>

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