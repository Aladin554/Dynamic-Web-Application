@extends('admin.admin_master')
@section('admin')

    
    <div class="py-12">
        <div class="container">
        <div class="row">


<div class="col-md-8">
    <div class="card">
        <div class="card-header">Edit About</div>

        <div class="card-body">
            
        <form action="{{url('homeabout/update/'.$homeabout->id)}}" method="POST">

            @csrf
            {{-- <input type="hidden" name="old_image" value="{{$sliders->image}}"> --}}
            <div class="form-group">
              <label for="exampleInputEmail1">Update Title</label>
              <input type="text" class="form-control" name="title" value="{{$homeabout->title}}" id="exampleInputEmail1" aria-describedby="emailHelp" style="height: 15%"/>
              {{-- <input type="file" class="form-control" name="brand_image" value="{{$brands->brand_image}}" id="exampleInputEmail1" aria-describedby="emailHelp"> --}}
              {{-- <img src="{{ asset($brands->brand_image) }}" style="width:400px height:200px" alt=""> --}}
              @error('title')
                  <span class="text-danger">{{$message}}</span>
              @enderror
            </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1">Short Description</label>
                <textarea class="form-control" name="short_dis" value="{{$homeabout->short_dis}}" id="exampleFormControlTextarea1"  rows="3"></textarea>
                {{-- <input type="file" class="form-control" name="brand_image" value="{{$brands->brand_image}}" id="exampleInputEmail1" aria-describedby="emailHelp"> --}}
                {{-- <img src="{{ asset($brands->brand_image) }}" style="width:400px height:200px" alt=""> --}}
                @error('short_dis')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>



            <div class="form-group">
                <label for="exampleFormControlTextarea1">Long Description</label>
                <textarea class="form-control" name="long_dis" value={{$homeabout->long_dis}} id="exampleFormControlTextarea1"  rows="3"></textarea>
                {{-- <input type="file" class="form-control" name="brand_image" value="{{$brands->brand_image}}" id="exampleInputEmail1" aria-describedby="emailHelp"> --}}
                {{-- <img src="{{ asset($brands->brand_image) }}" style="width:400px height:200px" alt=""> --}}
                @error('long_dis')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>



            
            <br>
            <button type="submit" class="btn btn-primary">Update Home About</button>
          </form>
        </div>
</div>

    </div>
</div>
</div>
@endsection