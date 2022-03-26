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
        <div class="card-header">Edit Address</div>

        <div class="card-body">
            
        <form action="{{url('contact/update/'.$contacts->id)}}" method="POST">

            @csrf
            {{-- <input type="hidden" name="old_image" value="{{$sliders->image}}"> --}}
            <div class="form-group">
              <label for="exampleInputEmail1">Update Address</label>
              <input type="text" class="form-control" name="address" value="{{$contacts->address}}" id="exampleInputEmail1" aria-describedby="emailHelp" style="height: 15%"/>
              {{-- <input type="file" class="form-control" name="brand_image" value="{{$brands->brand_image}}" id="exampleInputEmail1" aria-describedby="emailHelp"> --}}
              {{-- <img src="{{ asset($brands->brand_image) }}" style="width:400px height:200px" alt=""> --}}
              @error('address')
                  <span class="text-danger">{{$message}}</span>
              @enderror
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">Update email</label>
                <input type="email" class="form-control" name="email" value="{{$contacts->email}}" id="exampleInputEmail1" aria-describedby="emailHelp" style="height: 15%"/>
                {{-- <input type="file" class="form-control" name="brand_image" value="{{$brands->brand_image}}" id="exampleInputEmail1" aria-describedby="emailHelp"> --}}
                {{-- <img src="{{ asset($brands->brand_image) }}" style="width:400px height:200px" alt=""> --}}
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>



            <div class="form-group">
                <label for="exampleInputEmail1">Update Phone</label>
                <input type="number" class="form-control" name="phone" value={{$contacts->phone}} id="exampleInputEmail1" aria-describedby="emailHelp">
                {{-- <input type="file" class="form-control" name="brand_image" value="{{$brands->brand_image}}" id="exampleInputEmail1" aria-describedby="emailHelp"> --}}
                {{-- <img src="{{ asset($brands->brand_image) }}" style="width:400px height:200px" alt=""> --}}
                @error('phone')
                    <span class="text-danger">{{$message}}</span>
                @enderror
              </div>



            
            <br>
            <button type="submit" class="btn btn-primary">Update Contact</button>
          </form>
        </div>
</div>

    </div>
</div>
</div>
@endsection