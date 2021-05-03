@extends('mainPage.layouts.main')

@section('content')

<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - March 10, 2014!</div>
  <div class="container_12">
    <div class="grid_12">
      <h2>{{ __('lang.Contacts')}}</h2>
            <div class="map">
            <figure class=" ">
                <iframe src="http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=Armenia,+Ar...eni&ll=40.649974,-73.950005&spn=0.01628,0.025663&z=14&iwloc=A&output=embed"></iframe>
            </figure>
              
          </div>
    </div>  
    <div class="clear"></div>
    <div class="grid_3">
      <h3 class="head1">{{ __('lang.Find Us')}}</h3>
      
      <p class="contact_text">Ohanesyans Furniture<br>
      {{ __('lang.Adress1')}} <br>
      {{ __('lang.Adress2')}}</p>
      Viber:+374 93 39 59 30<br>
      Telephone:+374 93 39 59 30<br>
      E-mail: <a href="#" class="col1">furnitureohanesyans@gmail.com</a>
    </div>
    <div class="grid_9">
      <h3 class="head1">{{ __('lang.Contact Form')}}</h3>
          <div class="success_wrapper">
              @if($message = Session::get('message_sent'))
                  <div class="alert alert-success" role="alert">
                        {{ $message }}
                  </div>
              @endif
          </div><br/>
          <form enctype="multipart/form-data" class="contact_form" method="post" action="{{route('send_mail')}}">
              @csrf       
                  <label class="name">
                      <strong>{{ __('lang.Name')}}</strong>
                      <input type="text" name="name" class= "contact_msg"/>
                  </label><br/>
                    
                  <label class="email">
                      <strong>{{ __('lang.E-mail')}}</strong>
                      <input type="text" name="email" class= "contact_msg"/>
                  </label><br/>
                  <label class="phone">
                      <strong>{{ __('lang.Phone')}}</strong>
                      <input type="text" name="phone" class= "contact_msg" /> 
                  </label><br/>
                  <label class="message">
                      <strong>{{ __('lang.Message')}}</strong>
                      <textarea name="message" class= "contact_msg2" ></textarea>
                  </label><br/>
                  <div>
                      <div class="clear"></div>
                      <div class="btns">
                          <button type="submit" class="button_cont">{{ __('lang.Send')}}</button>
                      </div>
                  </div>
          </form>   
    </div>
  </div>
</div>

@endsection