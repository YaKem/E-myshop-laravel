@extends('master')

@section('content')

<div class="custom-product">
    <div class="row">
        <div class="col-sm-10">
            <div class="trending-wrapper">               
                <h4 class="text-center">Cart List</h4>
                @foreach($products as $product)
                    <div class="p-2 row border-bottom border-2">
                        <div class="col-sm-3">
                            <a href="{{ url('detail/' . $product->id) }}">
                                <img class="trend-image" src="{{ $product->gallery }}" alt="">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <h2>{{ $product->name }}</h2>
                                <h5>{{ $product->description }}</h5>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-warning">Remove to Cart</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection