@extends('layouts.app')

@section('content')
<div class="container">
    <div class = "col-md-12">
    	@foreach ($products  as $product)
    		<div class = "col-md-3" >
    			<div class = "product-image">
    				<img src="{{ asset("assets/images/productImages/".$product['image']) }}" width="300">
    				<h5 class = "text-center">{{ $product['name'].-$product['price']."դրամ" }} </h5>
    				<button class = "btn btn-success add-to-card" data-key= {{ $product['id'] }}>Պատվիրել</button>
    			</div>
    		</div>
    	@endforeach
    </div>
</div>
@endsection
