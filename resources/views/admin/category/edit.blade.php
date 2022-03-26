<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="container">
        <div class="row">


<div class="col-md-4">
    <div class="card">
        <div class="card-header">Add Category</div>

        <div class="card-body">
        <form action="{{url('category/update/'.$categories->id)}}" method="POST">

            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Category name</label>
              <input type="text" class="form-control" name="category_name" value={{$categories->category_name}} id="exampleInputEmail1" aria-describedby="emailHelp">
              @error('category_name')
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
</x-app-layout>
