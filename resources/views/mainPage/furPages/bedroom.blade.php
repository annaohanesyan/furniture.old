@extends('mainPage.layouts.main')

@section('content')

<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - March 10, 2014!</div>
  <div class="container_12">
    <div class="grid_12" style="margin-bottom:20px">
      <h3>{{ __('lang.Bedroom Furniture')}}</h3>
    </div>
    <div class="clear"></div>
    <div class="gallery">
        
        @foreach ($bed_furnitures as $bed_furniture)
          <div class="grid_4 views_count" data-id="{{$bed_furniture->id}}" data-name="Bedfurniture">
              <a href="{{route('bedroomShow', $bed_furniture->id)}}" class="gal servise_img"><img src="images/{{ $bed_furniture->image}}" alt=""></a>     
          </div>
        @endforeach
       
    </div>
  </div>
</div>
    

@endsection


