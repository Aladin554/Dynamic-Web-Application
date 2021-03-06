@extends('admin.admin_master')
@section('admin')
    
    <div class="py-12">
        <div class="container">
        <div class="row">
<h4>Home Slider</h4>
<a href="{{route('add.slider')}}"><button class="btn btn-info">Add Slider</button></a>
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
      <th scope="col" style="width: 15%">Slider Title</th>
      <th scope="col" style="width: 25%">Description</th>
      <th scope="col" style="width: 15%">Slider Image</th>
      <th scope="col" style="width: 15%">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i=1)
    @foreach($sliders as $slider)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$slider->title}}</td>
      <td>{{$slider->description}}</td>
      <td><img src="{{asset($slider->image)}}" style="height: 40px; weight:70px;"></td>
      
      
      <td><a href="{{url('slider/edit/'.$slider->id)}}" class="btn btn-info">Edit</a>
        <a href="{{url('slider/delete/'.$slider->id)}}" onclick="
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