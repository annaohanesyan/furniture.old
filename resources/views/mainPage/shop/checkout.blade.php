@extends('mainPage.layouts.main')

@section('content')
<div class="content">
    <div class="container_12">
        <div class="row cart_item">
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-4">
                <h1>Checkout</h1>
                <h4>Your Total: ${{$total}}</h4>
                
                <form action="{{route('checkout')}}" method="post" id="payment-form">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control payment_form" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" name = "address" class="form-control payment_form" required>
                            </div>
                        </div>


                        <div class="form-row">
                            <label for="card-element">
                            Credit or debit card
                            </label>
                            <div id="card-element">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="card-name">Card Holder Name</label>
                                        <input type="text" id="card-name" name = "cardName" class="form-control payment_form" required>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="card-number">Credit Card Number</label>
                                        <input type="text" id="card-number" name = "number" class="form-control payment_form" required>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row digital-info">
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="card-expiry-month">Expiration Month</label>
                                                <input type="text" id="card-expiry-month" name = "month" class="form-control payment_form2" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="card-expiry-year">Expiration Year</label>
                                                <input type="text" id="card-expiry-year" name = "year" class="form-control payment_form2" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="card-cvc">CVC</label>
                                        <input type="text" id="card-cvc" name = "cvc" class="form-control payment_form" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Used to display Element errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="stripeToken" id="stripeToken" />
                    <button type="submit" class="btn-checkout" id="checkout-form">Buy Now</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


