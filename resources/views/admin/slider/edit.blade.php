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
        <div class="card-header">Edit Slider</div>

        <div class="card-body">
            
        <form action="{{url('slider/update/'.$sliders->id)}}" method="POST" enctype="multipart/form-data">

            @csrf
            {{-- <input type="hidden" name="old_image" value="{{$sliders->image}}"> --}}
            <div class="form-group">
              <label for="exampleInputEmail1">Update Title</label>
              <input type="text" class="form-control" name="title" value="{{$sliders->title}}" id="exampleInputEmail1" aria-describedby="emailHelp" style="height: 15%"/>
              {{-- <input type="file" class="form-control" name="brand_image" value="{{$brands->brand_image}}" id="exampleInputEmail1" aria-describedby="emailHelp"> --}}
              {{-- <img src="{{ asset($brands->brand_image) }}" style="width:400px height:200px" alt=""> --}}
              @error('title')
                  <span class="text-danger">{{$message}}</span>
              @enderror
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">Update Description</label>
                <input type="text" class="form-control" name="description" value="{{$sliders->description}}" id="exampleInputEmail1" aria-describedby="emailHelp" style="height: 15%"/>
                {{-- <input type="file" class="form-control" name="brand_image" value="{{$brands->brand_image}}" id="exampleInputEmail1" aria-describedby="emailHelp"> --}}
                {{-- <img src="{{ asset($brands->brand_image) }}" style="width:400px height:200px" alt=""> --}}
                @error('description')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>



            <div class="form-group">
                <label for="exampleInputEmail1">Update Image</label>
                <input type="file" class="form-control" name="image" value={{$sliders->image}} id="exampleInputEmail1" aria-describedby="emailHelp">
                {{-- <input type="file" class="form-control" name="brand_image" value="{{$brands->brand_image}}" id="exampleInputEmail1" aria-describedby="emailHelp"> --}}
                {{-- <img src="{{ asset($brands->brand_image) }}" style="width:400px height:200px" alt=""> --}}
                @error('image')
                    <span class="text-danger">{{$message}}</span>
                @enderror
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