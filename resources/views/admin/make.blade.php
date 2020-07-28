@extends('layouts.app')
@section('content')
<h1>Make Report</h1>

<form class="form-horizontal" method="POST" action="{{ route('make') }}">
    {{ csrf_field() }}

    <input class="form-control form-control-lg" type="text" name="city" placeholder="Insert City Name">
    <br>
    <button class="btn btn-primary">Make Report</button>
</form>
@endsection