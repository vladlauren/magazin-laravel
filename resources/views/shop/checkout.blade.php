@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
        <h1>Checkout</h1>
        <h4>Yout Total Ron {{$total}}</h4>
        <form action="{{route('checkout')}}" method="post" id="checkout-form">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="name">Card Holder Name</label>
                        <input type="text" id="card-name" class="form-control" >
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="name">Credit Card Number</label>
                        <input type="text" id="card-number" class="form-control" >
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="name">Expiration Month</label>
                        <input type="text" id="card-expiry-month" class="form-control" >
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="name">Expiration Year</label>
                        <input type="text" id="card-expiry-year" class="form-control" >
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="name">CVC</label>
                        <input type="text" id="card-cvc" class="form-control" >
                    </div>
                </div>
            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-success">Buy Now</button>
        </form>
    </div>
</div>
@endsection