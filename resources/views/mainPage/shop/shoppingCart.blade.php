@extends('mainPage.layouts.main')

@section('content')

<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - March 10, 2014!</div>
  <div class="container_12">
        @if(Session::has('success'))
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                <div id="charge-message" class="alert alert-successs">
                    {{Session::get('success')}}
                </div>
            </div>
        @endif
        <div id="charge-errors" class="alert alert-danger {{!Session::has('error' ? 'hidden' : '')}}">
                    {{Session::get('error')}}
        </div>
        @if(Session::has('cart'))
            <div class="row cart_item">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                    <ul class="list-group">
                    
                        @foreach($products as $product)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 ">
                                        <div><img src="../../images/{{$product['item']['image']}}" class="cart_image"></div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 ">
                                        <span class="badge">{{$product['qty']}}</span>
                                        <strong>Name:</strong><span>{{$product['item']['name']}}</span><br />
                                        <strong>Price:</strong><span class="label label-success cart_item_price">{{$product['price']}}</span>
                                        
                                        <div class="btn-group">
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <i class="fa fa-adjust" style="font-size:18px; color:#009b97"><a class="dropdown-item" href="#">Reduce by 1</a></i><br />
                                                <i class="fa fa-adjust" style="font-size:18px; color:#009b97"><a class="dropdown-item" href="#">Reduce by all</a></i><br />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <hr />
                        @endforeach
                    
                    </ul>
                </div>
            </div>
            <div class="row cart_item">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                   <strong>Total:{{$totalPrice}}
                </div>
                <hr />
            </div>
            <div class="row cart_item">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                   <a href="{{route('checkout')}}" type="button" class="btn-checkout">Checkout</a>
                   <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                </div>
            </div>
        @else
        <div class="row cart_item">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                   <h2>No Items In Cart!</h2>
                </div>
            </div>
        @endif
  </div>
</div>

@endsection