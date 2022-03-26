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
    <div class="card-group">
@foreach ($images as $img)
<div class="col-md-4 mt-5">

    <div class="card">
        <img src="{{asset($img->image)}}" alt="">
    </div>
</div>
    
@endforeach
        
         

</div>
</div>

<div class="col-md-4">
    <div class="card">
        <div class="card-header">Add brand</div>

        <div class="card-body">
        <form action="{{route('store.image')}}" method="POST" enctype="multipart/form-data">

            @csrf
            
            <div class="form-group">
                <label for="exampleInputEmail1">brand Image</label>
                <input type="file" class="form-control" name="image[]" id="exampleInputEmail1" aria-describedby="emailHelp" multiple="">
                @error('image')
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
