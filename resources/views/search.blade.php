@extends('master')

@section('content')

<div class="custom-product">
    <div class="row">
        <div class="col-sm-4">
            <a href="#">Filter</a>
        </div>
        <div class="col-sm-4">
            <div class="trending-wrapper">
                <h3 class="my-3 text-center">Trending results</h3>
                <div class="d-flex flex-wrap justify-content-between trend-result">
                    <h4>Result for Products</h4>
                    @foreach($results as $result)
                        <div class="searched-item">
                            <a href="{{ url('detail/' . $result->id) }}">
                                <img class="trend-image" src="{{ $result->gallery }}" alt="">
                                <div>
                                    <h2>{{ $result->name }}</h2>
                                    <h5>{{ $result->description }}</h5>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection