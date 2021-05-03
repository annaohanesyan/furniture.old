@extends('mainPage.layouts.main')

@section('slider')

<div class="container_12">
  <div class="grid_12">
    <div class="slider_wrapper ">
       <div class="camera_wrap" id="camera_wrap">
            <div data-thumb="template/images/thumb.png" data-src="template/images/slide.jpg">
                <div class="caption fadeFromBottom">
                {{ __('lang.slider1')}}
                </div>
            </div>
            <div data-thumb="template/images/thumb1.jpg" data-src="template/images/slide1.jpg">
                <div class="caption fadeFromBottom">
                {{ __('lang.slider2')}}
                </div>
            </div>
            <div data-thumb="template/images/thumb2.png" data-src="template/images/slide2.jpg">
                <div class="caption fadeFromBottom">
                {{ __('lang.slider3')}}
                </div>
            </div>
            <div data-thumb="template/images/thumb3.png" data-src="template/images/slide3.jpg">
                <div class="caption fadeFromBottom">
                {{ __('lang.slider4')}}
                </div>
            </div>           
        </div>
    </div>
  </div>
</div>
@endsection


@section('content')

<!--==============================Content=================================-->
<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - March 10, 2014!</div>
  <div class="container_12">
    <div class="grid_12 center">
      <h3>{{ __('lang.featured works')}}</h3>
      <section class="tt-grid-wrapper">
        <ul class="tt-grid tt-effect-stackback tt-effect-delay">
          
          <li><a href="#"><img src="template/images/feat1.jpg" alt="img01"></a></li>
          <li><a href="#"><img src="template/images/feat2.jpg" alt="img02"></a></li>
          <li><a href="#"><img src="template/images/feat3.jpg" alt="img03"></a></li>
          <li><a href="#"><img src="template/images/feat4.jpg" alt="img04"></a></li>
          <li><a href="#"><img src="template/images/feat5.jpg" alt="img05"></a></li>
          <li><a href="#"><img src="template/images/feat6.jpg" alt="img06"></a></li>
        </ul>
        <nav>
          <a class="tt-current"></a><a></a><a></a><a></a>
        </nav>
      </section>
      <div class="clear"></div>
      <div class="alright">
      <a href="#" class="btn">{{ __('lang.More')}}</a>
      </div>
    </div>
  </div>
  <div class="hor"></div>
  <div class="container_12">
    
    <div class="grid_3">
      <h4>{{ __('lang.Products')}}</h4>
      <ul class="list">
        <li><a href="{{route('livingroomfur')}}">{{ __('lang.Livingroom Furniture')}}</a></li>
        <li><a href="{{route('bedroomfur')}}">{{ __('lang.Bedroom Furniture')}}</a></li>
        <li><a href="{{route('kitchenfur')}}">{{ __('lang.Kitchen Furniture')}}</a></li>
        <li><a href="{{route('babyroomfur')}}">{{ __('lang.Babyroom Furniture')}}</a></li>
        <li><a href="{{route('lobbyfur')}}">{{ __('lang.Lobby Furniture')}}</a></li>
        <li><a href="{{route('offisefur')}}">{{ __('lang.Offise Furniture')}} </a></li>
        <li><a href="{{route('bathroomfur')}}">{{ __('lang.Bathroom Furniture')}}</a></li>
      </ul>
    </div>
    <div class="grid_3 marg_left">
      <h4>{{ __('lang.Services')}}</h4>
      <ul class="list">
      <li><a href="{{route('livingroomfur')}}">{{ __('lang.Order design')}}</a></li>
        <li><a href="{{route('bedroomfur')}}">{{ __('lang.Furniture making')}}</a></li>
        <li><a href="{{route('kitchenfur')}}">{{ __('lang.Furniture repair')}}</a></li>
        <li><a href="{{route('babyroomfur')}}">{{ __('lang.Free shipping')}}</a></li>
        <li><a href="{{route('lobbyfur')}}">{{ __('lang.Free installation')}}</a></li>
      </ul>
    </div>
    <div class="grid_3 marg_left2">
      <h4>{{ __('lang.Contacts')}}</h4>
      <ul class="list">
        <li><i style="font-size:24px" class="fa ic_marg">&#xf2bc;</i><a href="{{ route('contact')}}">{{ __('lang.Adress1')}}{{ __('lang.Adress2')}}</a></li>
        <li><i style="font-size:24px" class="fa ic_marg2">&#xf095;</i><a href="{{ route('contact')}}">+374 93 39 59 30</a></li>
        <li><i style="font-size:24px" class="fa ic_marg3">&#xf0e0;</i><a href="{{ route('contact')}}">furnitureohanesyans@gmail.com</a></li>
      </ul>    
    </div>
  </div>
</div>

@endsection