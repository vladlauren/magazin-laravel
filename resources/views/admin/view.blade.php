@extends('layouts.app')
@section('content')

<div class="jumbotron text-center">
    <div align="right">
        <a href="{{ route('admin.index')}}" class="btn btn-default">Back</a>
    </div>
    <br>
<img src="{{ URL::to('/')}}/images/{{$data->imagePath}}" width="275" class="img-thumbnail" alt="">
<h3> Name - {{$data->title}}</h3>
<h3> Description - {{$data->description}}</h3>
<h3> Price - {{$data->price}}</h3>
</div>
@endsection