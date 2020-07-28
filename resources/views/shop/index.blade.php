@extends('layouts.app')
@section('content')
@foreach($products->chunk(3) as $productChunk)
<div class="row>">
  @foreach($productChunk as $product)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
    <img src="{{ URL::to('/')}}/images/{{$product->imagePath}}" class="img-responsive center" >
      <div class="caption">
        <h3>{{$product->title}}</h3>
        <p class="card-text">{{$product->description}}</p>
        <div class="clearfix">
          
<a href="{{ route('product.addToCart', ['id' => $product->id])}}" class="btn btn-success" role="button" id="click_button">Add to cart</a>
          <p class="pull-right price">Ron {{$product->price}}</p>


        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endforeach




@endsection

<script src="{{ asset('js/app.js') }}"></script>
<script>
 
</script>