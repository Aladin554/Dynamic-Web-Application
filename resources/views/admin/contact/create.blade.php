@extends('admin.admin_master')
@section('admin')


<div class="col-lg-6">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Basic Form Controls</h2>
        </div>
        <div class="card-body">
            <form action="{{route('store.contact')}}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Address</label>
                    <input type="text" class="form-control" name="address" id="exampleFormControlInput1" placeholder="address">
                    
                </div>
                
                
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="text" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Email">
                    
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Phone</label>
                    <input type="text" class="form-control" name="phone" id="exampleFormControlInput1" placeholder="Phone">
                    
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </div>
            </form>
        </div>
    </div>

    

@endsection