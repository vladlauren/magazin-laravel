@extends('layouts.app')
@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div align="right">
    <a href="{{ route('admin.index')}}" class="btn btn-default">Back</a>
</div>
<form method="post" action="{{route('admin.store')}}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <div class="form-group">
        <label for="" class="col-md-4 text-right">Enter Name</label>
        <div class="col-md-8">
            <input type="text" name="title" class="form-control input-lg" />

        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="form-group">
        <label for="" class="col-md-4 text-right">Enter Description</label>
        <div class="col-md-8">
            <input type="text" name="description" class="form-control input-lg">
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="form-group">
        <label for="" class="col-md-4 text-right">Enter Price</label>
        <div class="col-md-8">
            <input type="number" name="price" class="form-control input-lg">
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="form-group">
        <label for="" class="col-md-4 text-right">Enter Image</label>
        <div class="col-md-8">
            <input type="file" name="image">
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="form-group text-center">
        <input type="submit" name="add" class="btn btn-success input-lg" value="Add">
    </div>
</form>
@endsection