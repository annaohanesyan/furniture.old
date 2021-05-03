<header>  
  <div class="container_12">
    <div class="grid_12">
        <h1>
        <a href="/">
          <img src="{{asset('template/images/logo2.jpeg')}}" alt="Your Happy Family" class="logo">
        </a>
      </h1>
        <div class="menu_block ">
          <nav class="horizontal-nav full-width horizontalNav-notprocessed">
            <ul class="sf-menu">
                 <li class="active_link {{ request()->is('/*') ? 'current' : '' }}"><a href="/" style="font-size:20px">{{ __('lang.Home')}}</a></li>
                 <li class="active_link {{ Request::routeIs('services.index') ? 'current' : '' }}"><a href="{{route('services.index')}}" style="font-size:20px">{{ __('lang.Products')}}</a></li>
                 <li class="active_link {{ Request::routeIs('about.index') ? 'current' : '' }}"><a href="{{route('about.index')}}" style="font-size:20px" >{{ __('lang.About us')}}</a></li>
                 <li class="active_link {{ Request::routeIs('contact') ? 'current' : '' }}"><a href="{{ route('contact')}}" style="font-size:20px" >{{ __('lang.Contacts')}}</a></li>
                 <li class="active_link {{ Request::routeIs('product.shoppingCart') ? 'current' : '' }}">
                   <a href="{{route('product.shoppingCart')}}" style="font-size:28px; margin-top:5px" >
                      <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                      <span class="badge2">{{ Session::has('cart') ? Session::get('cart')->totalQty : ""}}</span>
                   </a>
                </li>
                 <li class="active_link wind_disp"><a href="{{asset('locale/arm')}}" id="arm" style="font-size: 22px; position:relative">Arm</a>
                    <div class="window">
                      <a href="{{asset('locale/en')}}" id="en">En</a>
                        
                    </div>
                </li> <br/>
                 
               </ul>
            </nav>
           <div class="clear"></div>
        </div>
      </div>      
   </div>
</header>
