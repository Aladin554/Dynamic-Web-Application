@extends('admin.admin_master')
@section('admin')
    
    <div class="py-12">
        <div class="container">
        <div class="row">
<h4>Home Slider</h4>
<a href="{{route('add.contact')}}"><button class="btn btn-info">Add Contact</button></a>
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
      <th scope="col" style="width: 15%">Address</th>
      <th scope="col" style="width: 25%">Email</th>
      <th scope="col" style="width: 15%">Phone</th>
      <th scope="col" style="width: 15%">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i=1)
    @foreach($contacts as $contact)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$contact->address}}</td>
      <td>{{$contact->email}}</td>
      <td>{{$contact->phone}}</td>
      
      
      <td><a href="{{url('contact/edit/'.$contact->id)}}" class="btn btn-info">Edit</a>
        <a href="{{url('contact/delete/'.$contact->id)}}" onclick="
          return confirm('Are you sure for delete')" class="btn btn-danger">Delete</a>
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