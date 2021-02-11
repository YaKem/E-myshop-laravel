@extends('master')

@section('content')

<div class="custom-order">
    <div class="row">
        <div class="col-sm-10">
            <div class="trending-wrapper">               
                <h4 class="text-center">Cart List</h4>
                <a class="btn btn-success" href="{{ url('/ordernow') }}">Order Now</a>
                @foreach($orders as $order)
                    <div class="p-2 row border-bottom border-2">
                        <div class="col-sm-3">
                            <a href="{{ url('detail/' . $order->id) }}">
                                <img class="trend-image" src="{{ $order->gallery }}" alt="">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <h2>Name : {{ $order->name }}</h2>
                                <h5>Delivery Status : {{ $order->status }}</h5>
                                <h5>Address : {{ $order->address }}</h5>
                                <h5>Payment Status : {{ $order->payment_status }}</h5>
                                <h5>Payment Method : {{ $order->payment_method }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection