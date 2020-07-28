@extends('layouts.app')
@section('content')

<h1>Administration</h1>

<div align="right">
<a href="{{ route('admin.create') }}" class="btn btn-success btn-sm"> Add</a>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif
<table class="table table-bordered table-striped">
    <tr>
        <th width="10%">Image</th>
        <th width="20%">Name</th>
        <th width="35%">Description</th>
        <th width="10%">price</th>
        <th width="20%">Action</th>
    </tr>
    @foreach($data as $row)
        <tr>
        <td><img src="{{ URL::to('/')}}/images/{{$row->imagePath}}" class="img-thumbnail" width="75" /></td>
        <td>{{ $row->title}}</td>
        <td>{{$row->description}}</td>
        <td>{{ $row->price}} Ron</td>
        <td>
        
        <form action="{{ route('admin.destroy', $row->id)}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{ method_field('DELETE') }}
            <a href="{{ route('admin.show', $row->id)}}" class="btn btn-success">Show</a>
            <a href="{{ route('admin.edit', $row->id)}}" class="btn btn-warning">Update</a>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </td>
        </tr>
    @endforeach
</table>
{!! $data->links() !!}
@endsection