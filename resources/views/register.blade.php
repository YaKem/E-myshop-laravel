@extends('master')

@section('content')

<div class="container min-vh-100">
    <div class="row">
        <div class="col-sm-4 mx-auto">
            <form action="{{ url('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">User Name</label>
                    <input type="text" name="name" class="form-control" id="username" placeholder="User Name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection