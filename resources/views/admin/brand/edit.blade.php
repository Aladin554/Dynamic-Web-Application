@extends('admin.admin_master')
@section('admin')

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
        <div class="card-header">Add Category</div>

        <div class="card-body">
        <form action="{{url('brand/update/'.$brands->id)}}" method="POST" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="old_image" value="{{$brands->brand_image}}">
            <div class="form-group">
              <label for="exampleInputEmail1">Update name</label>
              <input type="text" class="form-control" name="brand_name" value={{$brands->brand_name}} id="exampleInputEmail1" aria-describedby="emailHelp">
              {{-- <input type="file" class="form-control" name="brand_image" value="{{$brands->brand_image}}" id="exampleInputEmail1" aria-describedby="emailHelp"> --}}
              {{-- <img src="{{ asset($brands->brand_image) }}" style="width:400px height:200px" alt=""> --}}
              @error('brand_name')
                  <span class="text-danger">{{$message}}</span>
              @enderror
            </div>



            <div class="form-group">
                <label for="exampleInputEmail1">Update Image</label>
                <input type="file" class="form-control" name="brand_image" value={{$brands->brand_image}} id="exampleInputEmail1" aria-describedby="emailHelp">
                {{-- <input type="file" class="form-control" name="brand_image" value="{{$brands->brand_image}}" id="exampleInputEmail1" aria-describedby="emailHelp"> --}}
                {{-- <img src="{{ asset($brands->brand_image) }}" style="width:400px height:200px" alt=""> --}}
                @error('brand_image')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>



            <div class="from-group">

                <img src="{{ asset($brands->brand_image) }}" style="width:400px height:200px" >
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Update Category</button>
          </form>
        </div>
</div>

    </div>
</div>
</div>
@endsection