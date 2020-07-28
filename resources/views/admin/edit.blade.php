@extends('layouts.app')
@section('content')

<div align="right">
    <a href="{{ route('admin.index')}}" class="btn btn-default">Back</a>
</div> 
<br>

<form method="post" action="{{route('admin.update', $data->id)}}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {{ method_field('PATCH') }}
    <div class="form-group">
        <label for="" class="col-md-4 text-right">Enter Name</label>
        <div class="col-md-8">
        <input type="text" name="title" class="form-control input-lg" value="{{$data->title}}" />

        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="form-group">
        <label for="" class="col-md-4 text-right">Enter Description</label>
        <div class="col-md-8">
            <input type="text" name="description" class="form-control input-lg" value="{{$data->description}}">
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="form-group">
        <label for="" class="col-md-4 text-right">Enter Price</label>
        <div class="col-md-8">
            <input type="number" name="price" class="form-control input-lg" value="{{$data->price}}">
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="form-group">
        <label for="" class="col-md-4 text-right">Enter Image</label>
        <div class="col-md-8">
            <input type="file" name="image">
            <img src="{{ URL::to('/')}}/images/{{$data->imagePath}}" class="img-thumbnail" width="75" />
            <input type="hidden" name="hidden_image" value="{{$data->imagePath}}">
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="form-group text-center">
        <input type="submit" name="update" class="btn btn-success input-lg" value="Update">
    </div>
</form>

@endsection