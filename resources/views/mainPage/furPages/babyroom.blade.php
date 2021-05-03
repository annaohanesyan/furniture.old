@extends('mainPage.layouts.main')

@section('content')

<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - March 10, 2014!</div>
  <div class="container_12">
    <div class="grid_12">
      <h2>{{ __('lang.Babyroom Furniture')}}</h2>
    </div>
    <div class="clear"></div>
    <div class="gallery">
            @foreach ($baby_furnitures as $baby_furniture)
                <div class="grid_4 views_count" data-id="{{$baby_furniture->id}}" data-name="Babyfurniture">
                    <a href="{{route('babyroomShow', $baby_furniture->id)}}" class="gal servise_img" ><img src="images/{{ $baby_furniture->image}}" alt=""></a>
                
                </div>
            @endforeach
          
    </div>
  </div>
</div>
    

@endsection
