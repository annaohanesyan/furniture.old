@extends('mainPage.layouts.main')

@section('content')

<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - March 10, 2014!</div>
  <div class="container_12">
    <h2>{{ $kitchenfurnitures->name }}</h2>
    <div class="row item_desc">
     
      <div class="col" style="float:left; margin-right:20px;">
        <img src="../../images/{{ $kitchenfurnitures->image}}" alt="" class="sing_page_img">
        <div class="likes">
          <table>
            <tbody>
              <tr>
                <td>
                  <time datetime="2014-01-01">
                    <span class="fa fa-calendar icon_cal_marg"></span>
                    {{ $kitchenfurnitures->created_at->format('j F Y')}}
                  </time>
                </td>
                
                <td>
                  <div class="fa fa-eye icon_marg"></div>{{ $kitchenfurnitures->views }}
                  <div class="fa fa-thumbs-up icon_marg like" data-id = "{{ $kitchenfurnitures->id }}" data-name = "Kitchenfurniture">{{ $kitchenfurnitures->likes }}</div>
                  <div class="fa fa-shopping-cart icon_marg shop_cart" data-id = "{{ $kitchenfurnitures->id }}" data-name = "Kitchenfurniture"> 
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col fur_description">
          <div class="div_items">
            <strong >{{ __('lang.Name')}}</strong>
            <span>{{ $kitchenfurnitures->name }}</span><br />
          </div>
          <div class="div_items">
            <strong>{{ __('lang.Description')}}</strong>
            <span>{{ $kitchenfurnitures->description }}</span><br />
          </div>
          <div class="div_items">
            <strong>{{ __('lang. Price')}}</strong>
            <span>{{ $kitchenfurnitures->price }}</span><br />
          </div>
          <div class="div_items">
            <strong>{{ __('lang.Color ')}}</strong>
            <span>{{ $kitchenfurnitures->color }}</span><br />
          </div>

          <form>
              <input type="text" name="comments" placeholder="Your Message" class= "comment"/>
              <input type="hidden" id = "fur_id" value= "{{ $kitchenfurnitures->id }}">
              <a onclick="send_message()"><i style="font-size:24px" class="fa" id = "send_message">&#xf1d9;</i></a>
          </form>
      </div>
  </div>
     
                
                
          
   
  </div>
</div>
    

@endsection
