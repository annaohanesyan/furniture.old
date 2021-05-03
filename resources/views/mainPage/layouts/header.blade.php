<!DOCTYPE html>
<html lang="{{str_replace('_','-',app()->getLocale())}}">
     <head>
     <title>Home</title>
     <meta charset="utf-8">
     <meta name = "format-detection" content = "telephone=no" />
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <link rel="icon" href="{{asset('template/images/favicon.ico')}}">
     <link rel="shortcut icon" href="{{asset('template/images/favicon.ico')}}" />
     <link rel="stylesheet" href="{{asset('template/css/camera.css')}}">
    <link rel="stylesheet"  href="{{asset('template/css/component.css')}}" />
     <link rel="stylesheet" type="text/css" href="{{asset('template/css/tooltipster.css')}}" />
     <link rel="stylesheet" href="{{asset('template/css/style.css')}}">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     
     <script src="https://js.stripe.com/v3/"></script>
     
     <script src="{{asset('template/js/jquery.js')}}"></script>
     
     <script src="{{asset('template/js/index.js')}}"></script>
     <script src="{{asset('template/js/checkout.js')}}"></script>
     
     <script src="{{asset('template/js/jquery-migrate-1.2.1.js')}}"></script>
     <script src="{{asset('template/js/script.js')}}"></script> 
     <script src="{{asset('template/js/superfish.js')}}"></script>
     <script src="{{asset('template/js/TMForm.js')}}"></script>
     <script src="{{asset('template/js/jquery.ui.totop.js')}}"></script>
     <script src="{{asset('template/js/jquery.equalheights.js')}}"></script>
     <script src="{{asset('template/js/jquery.mobilemenu.js')}}"></script>
     <script src="{{asset('template/js/jquery.easing.1.3.js')}}"></script>
      <script src="{{asset('template/js/jquery.tooltipster.js')}}"></script>
     <script src="{{asset('template/js/camera.js')}}"></script>
     <!--[if (gt IE 9)|!(IE)]><!-->
     <script src="{{asset('template/js/jquery.mobile.customized.min.js')}}"></script>
     <!--<![endif]-->
    <script src="{{asset('template/js/modernizr.custom.js')}}"></script>
     <script>
       $(document).ready(function(){
        jQuery('#camera_wrap').camera({
            loader: 'pie',
            pagination: true ,
            minHeight: '200',
            thumbnails: true,
            height: '40.85106382978723%',
            caption: true,
            navigation: true,
            fx: 'mosaic'
          });
        $().UItoTop({ easingType: 'easeOutQuart' });
               $('.tooltip').tooltipster();

        });
     </script>

    <!--[if lt IE 9]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
         </a>
      </div>
      <script src="js/html5shiv.js"></script>
      <link rel="stylesheet" media="screen" href="css/ie.css">


    <![endif]-->
     </head>
     
     <body class="page1" id="top">