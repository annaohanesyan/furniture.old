@extends('mainPage.layouts.main')

@section('content')

<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - March 10, 2014!</div>
  <div class="container_12">
    <div class="grid_12">
      <h2>{{ __('lang.Bathroom Furniture')}}</h2>
    </div>
    <div class="clear"></div>
    <div class="gallery">
        @foreach ($bath_furnitures as $bath_furniture)
            <div class="grid_4 views_count" data-id="{{$bath_furniture->id}}" data-name="Bathfurniture">
                <a href="{{route('bathroomShow', $bath_furniture->id)}}" class="gal servise_img"><img src="images/{{ $bath_furniture->image}}" alt=""></a>
            </div>
        @endforeach
    </div>
  </div>
</div>
    

@endsection
