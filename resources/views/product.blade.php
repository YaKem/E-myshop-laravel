@extends('master')

@section('content')

<div class="container custom-product">
    <div id="carouselExampleDark" class="mt-3 carousel carousel-dark slide w-50 mx-auto" data-bs-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @foreach($products as $product)
                <div class="carousel-item {{ $product->id == 1 ? 'active' : '' }}" data-bs-interval="10000">
                    <a href="{{ url('detail/' . $product->id) }}">
                        <img src="{{ url($product->gallery) }}" class="img-fluid d-block slider-img" alt="{{ $product->title }}">
                        <div class="carousel-caption d-none d-md-block bg-secondary">
                            <h5 class="text-white">{{ $product->name }}</h5>
                            <p class="text-white">{{ $product->description }}</p>
                        </div>
                    </a>
                </div>
            @endforeach          
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
    <div class="trending-wrapper">
        <h3 class="my-3 text-center">Trending Products</h3>
        <div class="d-flex flex-wrap justify-content-between trend-product">
            @foreach($products as $product)
                <a href="{{ url('detail/' . $product->id) }}">
                    <div>
                        <img class="trend-image" src="{{ $product->gallery }}" alt="">
                        <div>
                            <h3>{{ $product->name }}</h3>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>

@endsection