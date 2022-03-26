@extends('admin.admin_master')
@section('admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          
        </h2>
        
    </x-slot>

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{session('success')}}</strong>
          </div>
          @endif

    <div class="py-12">
        <div class="container">
        <div class="row">
<div class="col-md-8">
    <div class="card">

        

        <div class="card-header">All brand</div>
    
        <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col"> brand name</th>
      <th scope="col">brand image</th>
      <th scope="col">Created_AT</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($brands as $brand)
    <tr>
      <th scope="row">{{$brands->firstItem()+$loop->index}}</th>
      <td>{{$brand->brand_name}}</td>
      <td><img src="{{asset($brand->brand_image)}}" style="height: 40px; weight:70px;"></td>
      <td>
        
        @if($brand->created_at==NULL)
        <span class="text-danger">No Data Set</span>
        @else
        {{Carbon\Carbon::parse($brand->created_at)->diffForHumans()}}
      
      @endif
      </td>
      
      <td><a href="{{url('brand/edit/'.$brand->id)}}" class="btn btn-info">Edit</a>
        <a href="{{url('brand/tdelete/'.$brand->id)}}" onclick="
          return confirm('Are you sure for delete')" class="btn btn-danger">Tdelete</a>
      </td>

    </tr>
   @endforeach
  </tbody>
</table>
{{$brands->links()}}
</div>
</div>

<div class="col-md-4">
    <div class="card">
        <div class="card-header">Add brand</div>

        <div class="card-body">
        <form action="{{route('store.brand')}}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">brand name</label>
              <input type="text" class="form-control" name="brand_name" id="exampleInputEmail1" aria-describedby="emailHelp">
              @error('brand_name')
                  <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">brand Image</label>
                <input type="file" class="form-control" name="brand_image" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('brand_image')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
            <br>
            <button type="submit" class="btn btn-primary">Add brand</button>
          </form>
        </div>
</div>

    </div>
</div>


</div>
@endsection