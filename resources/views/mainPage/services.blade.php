@extends('mainPage.layouts.main')

@section('content')

<!--==============================Content=================================-->
<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - March 10, 2014!</div>
  <div class="container_12">
    <div class="grid_12">
      <h2>{{ __('lang.Products')}}</h2>
      To learn more and download .psd files of this <span class="col1"><a href="http://blog.templatemonster.com/free-website-templates/">free theme</a></span>, visit TemplateMonster blog. <br>
      Find a wide range of Interior and <span class="col1"><a href="http://www.templatemonster.com/category/interior-furniture/" rel="nofollow">Furniture Templates</a></span> in the same name category at TemplateMonster. 
    </div>
    <div class="clear cl1"></div>
    <div class="serv">
    <div class="grid_4">
      <img src="template/images/livingroom.jpg" alt="" class="servise_img">
      <div class="text1"><a href="{{route('livingroomfur')}}">{{ __('lang.Livingroom Furniture')}} </a></div>Adipiscing elin mollis eratttis neq acilisis, sit amet ultrecies erat rutrumsucilisis 
      <div class="alright"><a href="{{route('livingroomfur')}}" class="btn">{{ __('lang.More')}}</a></div>
    </div>
    <div class="grid_4">
      <img src="template/images/bedroom.jpg" alt="" class="servise_img">
      <div class="text1"><a href="{{route('bedroomfur')}}">{{ __('lang.Bedroom Furniture')}} </a></div>Ulla vel uivra Nuctoreoagna sodale felis, quis malesuada nibh odio ut veliroin 
      <div class="alright"><a href="{{route('bedroomfur')}}" class="btn">{{ __('lang.More')}}</a></div>
    </div>
    <div class="grid_4">
      <img src="template/images/kitchen.jpg" alt="" class="servise_img">
      <div class="text1"><a href="{{route('kitchenfur')}}">{{ __('lang.Kitchen Furniture')}}</a></div>Mollis eratttis neq acilisis, sit amet ultrecies erat rutrumsucilisis  felis, quis malesuada 
      <div class="alright"><a href="{{route('kitchenfur')}}" class="btn">{{ __('lang.More')}}</a></div>
    </div>
    <div class="clear cl1"></div>
    <div class="grid_4">
      <img src="template/images/babyroom.jpg" alt="" class="servise_img">
      <div class="text1"><a href="{{route('babyroomfur')}}">{{ __('lang.Babyroom Furniture')}} </a></div>Mollis eratttis neq acilisis, sit amet ultrecies erat rutrumsucilisis retolomi neryt nolo
      <div class="alright"><a href="{{route('babyroomfur')}}" class="btn">{{ __('lang.More')}}</a></div>
    </div>
    <div class="grid_4">
      <img src="template/images/indoor.jpg" alt="" class="servise_img">
      <div class="text1"><a href="{{route('lobbyfur')}}">{{ __('lang.Lobby Furniture')}} </a></div>Adipiscing elin mollis eratttis neq. Gacilisis, sit amet ultrecies erat rutrumsucilisis 
      <div class="alright"><a href="{{route('lobbyfur')}}" class="btn">{{ __('lang.More')}}</a></div>
    </div>
    <div class="grid_4">
      <img src="template/images/offise.jpg" alt="" class="servise_img">
      <div class="text1"><a href="{{route('offisefur')}}">{{ __('lang.Offise Furniture')}} </a></div>Kmollis eratttis neq Gacilisis, sit amet ultrecies erat rutrumsucilisis gna sodale felis, quis 
      <div class="alright"><a href="{{route('offisefur')}}" class="btn">{{ __('lang.More')}}</a></div>
    </div>
    <div class="clear cl1"></div>
    <div class="grid_4">
      <img src="template/images/bathroom.jpg" alt="" class="servise_img">
      <div class="text1"><a href="{{route('bathroomfur')}}">{{ __('lang.Bathroom Furniture')}}</a></div>Ratttis neq acilisis, sit amet ultrecies eraterolo rutrumsucilisis ale felis, quis malesuada
      <div class="alright"><a href="{{route('bathroomfur')}}" class="btn">{{ __('lang.More')}}</a></div>
    </div>
    </div>
  </div>
</div>

@endsection