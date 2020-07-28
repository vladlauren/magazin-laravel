@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h3 class="panel-heading">Raport privind vanzarea cartilor pe orase:</h3>
                    <ul>
                            @foreach($users as $user)
                                <li><b>{{$user->totalBooks }}</b> /buc in orasul <b>{{$user->city_name }}</b></li>
                                
                            @endforeach
                        
                    </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h3 class="panel-heading">Persoanele care au cumparat cele mai multe carti sunt:</h3>
                    <ul>
                            @foreach($tables as $table)
                            <li> <b>{{ $table->name}} </b>a cumparat<b> {{ $table->total_books}}</b> carti  </li>
                                
                            @endforeach
                        
                    </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h3 class="panel-heading">Cele mai bine vandute carti sunt</h3>
                    <ul>
                            @foreach($sales as $sale)
                            <li> Cartea <b>{{ $sale->title}}</b> cu pretul <b>{{ $sale->price}} </b>RON,  a fost vanduta in <b>{{ $sale->total_sales}}</b> exemplare </li>
                                
                            @endforeach
                        
                    </ul>
            </div>
        </div>
    </div>
</div>
@endsection