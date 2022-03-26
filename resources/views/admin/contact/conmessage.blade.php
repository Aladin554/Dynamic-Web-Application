@extends('admin.admin_master')
@section('admin')
    
    <div class="py-12">
        <div class="container">
        <div class="row">
<h4>Home Message</h4>
<br>
@if(session('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{session('success')}}</strong>
          </div>
          @endif
<div class="col-md-12">
    <div class="card">


        <div class="card-header">All Message</div>
    
        <table class="table">
  <thead>
    <tr>
      <th scope="col" style="width: 5%">ID</th>
      <th scope="col" style="width: 15%">Name</th>
      <th scope="col" style="width: 25%">Email</th>
      <th scope="col" style="width: 15%">Subject</th>
      <th scope="col" style="width: 15%">Message</th>
      <th scope="col" style="width: 15%">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i=1)
    @foreach($contacts as $contact)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$contact->name}}</td>
      <td>{{$contact->email}}</td>
      <td>{{$contact->subject}}</td>
      <td>{{$contact->message}}</td>
      
      
      <td> <a href="{{url('delete/message/'.$contact->id)}}" onclick="
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