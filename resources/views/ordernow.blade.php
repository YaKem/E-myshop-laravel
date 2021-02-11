@extends('master')

@section('content')

<div class="custom-product">
    <div class="row">
        <div class="col-sm-10">
            <table class="table">
                <tbody>
                  <tr>
                    <td>Amount</td>
                    <td>{{ $total }}</td>
                  </tr>
                  <tr>
                    <td>Tax</td>
                    <td>$ 0</td>
                  </tr>
                  <tr>
                    <td>Delivery</td>
                    <td>$ 10</td>
                  </tr>
                  <tr>
                      <td>Total Amount</td>
                      <td>{{ $total + 10 }}</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
    <div class="mt-3 row">
        <div class="col-sm-10">
            <form action="{{ url('/orderplace') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="textarea" class="form-control" name="address" placeholder="Enter your address">
                </div>
                <div class="mt-2 form-group">
                    <h4>Payment Method</h4>
                    <div class="mt-1 form-check">
                        <input id="choice1" type="radio" value="cash" name="payment" class="form-check-input">
                        <label for="choice1" class="form-check-label">online payment</label>
                    </div>
                    <div class="mt-1 form-check">
                        <input id="choice2" type="radio" value="cash" name="payment" class="form-check-input">
                        <label for="choice2" class="form-check-label">EMI payment</label>
                    </div>
                    <div class="mt-1 form-check">
                        <input id="choice3" type="radio" value="cash" name="payment" class="form-check-input">
                        <label for="choice3" class="form-check-label">Payment on Delivery</label>
                    </div>
                </div>
                <button type="submit" class="my-3 btn btn-default">Order Now</button>
            </form>
        </div>
    </div>
</div>

@endsection