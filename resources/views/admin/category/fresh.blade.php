<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="container">
        <div class="row">
<div class="col-md-8">
    <div class="card">

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{session('success')}}</strong>
          </div>
          @endif

        <div class="card-header">All Category</div>
    
        <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col"> User ID</th>
      <th scope="col">Category name</th>
      <th scope="col">Created_AT</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($categories as $category)
    <tr>
      <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
      <td>{{$category->user->name}}</td>
      <td>{{$category->category_name}}</td>
      <td>
        
        @if($category->created_at==NULL)
        <span class="text-danger">No Data Set</span>
        @else
        {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}
      
      @endif
      </td>
      
      <td><a href="{{url('category/edit/'.$category->id)}}" class="btn btn-info">Edit</a>
        <a href="{{url('category/tdelete/'.$category->id)}}" class="btn btn-danger">Tdelete</a>
      </td>

    </tr>
   @endforeach
  </tbody>
</table>
{{$categories->links()}}
</div>
</div>

<div class="col-md-4">
    <div class="card">
        <div class="card-header">Add Category</div>

        <div class="card-body">
        <form action="{{route('store.category')}}" method="POST">

            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Category name</label>
              <input type="text" class="form-control" name="category_name" id="exampleInputEmail1" aria-describedby="emailHelp">
              @error('category_name')
                  <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Add Category</button>
          </form>
        </div>
</div>

    </div>
</div>















<div class="container">
  <div class="row">
<div class="col-md-8">
<div class="card">

  
  <div class="card-header">All Category</div>

  <table class="table">
<thead>
<tr>
<th scope="col">ID</th>
<th scope="col"> User ID</th>
<th scope="col">Category name</th>
<th scope="col">Created_AT</th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody>

@foreach($trash as $category)
<tr>
<th scope="row">{{$categories->firstItem()+$loop->index}}</th>
<td>{{$category->user->name}}</td>
<td>{{$category->category_name}}</td>
<td>
  
  @if($category->created_at==NULL)
  <span class="text-danger">No Data Set</span>
  @else
  {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}

@endif
</td>

<td><a href="{{url('category/restore/'.$category->id)}}" class="btn btn-info">Restore</a>
  <a href="{{url('category/pdelete/'.$category->id)}}" class="btn btn-danger">PDelete</a>
</td>

</tr>
@endforeach
</tbody>
</table>
{{$trash->links()}}
</div>
</div>

<div class="col-md-4">


</div>
</div>









</div>
</x-app-layout>
