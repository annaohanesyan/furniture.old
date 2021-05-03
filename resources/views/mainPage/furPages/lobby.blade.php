@extends('mainPage.layouts.main')

@section('content')

<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - March 10, 2014!</div>
  <div class="container_12">
    <div class="grid_12">
      <h2>{{ __('lang.Lobby Furniture')}}</h2>
    </div>
    <div class="clear"></div>
    <div class="gallery">
        @foreach ($lobby_furnitures as $lobby_furniture)
            <div class="grid_4 views_count" data-id="{{$lobby_furniture->id}}" data-name="Lobbyfurniture">
                <a href="{{route('lobbyShow', $lobby_furniture->id)}}" class="gal servise_img"><img src="images/{{ $lobby_furniture->image}}" alt=""></a>
            </div>
        @endforeach
          
    </div>
  </div>
</div>
    

@endsection
