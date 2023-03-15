<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title> @yield('title') - {{ config('app.name') }} </title>
  <link rel="icon" href="{{ asset('images/3163173.png') }}" type="image/png">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

  <!-- Embed CSS -->
  <link rel="stylesheet" href="{{ asset('common/css/normalize.min.css') }}">
  <link rel="stylesheet" href="{{ asset('common/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('common/css/bootstrap-theme.min.css') }}">
  <link rel="stylesheet" href="{{ asset('common/css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('common/css/fontawesome/css/all.css') }}">
  <link rel="stylesheet" href="{{ asset('common/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('common/css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('common/css/sweetalert2.min.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&family=Montserrat&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @if(Request::route()->getName() != 'show_cart')
  <link rel="stylesheet" href="{{ asset('css/minicart.css') }}">
  @endif
  @yield('css')
  <style>
    #button {
  display: inline-block;
  background-color: #FF9800;
  width: 50px;
  height: 50px;
  text-align: center;
  border-radius: 4px;
  position: fixed;
  bottom: 30px;
  right: 30px;
  transition: background-color .3s, 
    opacity .5s, visibility .5s;
  opacity: 0;
  visibility: hidden;
  z-index: 1000;
  padding: 10px;
  border-radius: 100%;
}
#button::after {
  content: "\f077";
  font-family: FontAwesome;
  font-weight: normal;
  font-style: normal;
  font-size: 2em;
  line-height: 50px;
  color: #fff;
}
#button:hover {
  cursor: pointer;
  background-color: #333;
}
#button:active {
  background-color: #555;
}
#button.show {
  opacity: 1;
  visibility: visible;
}
#header{
  display: flex;
  align-items: center;
  right: 0;
  left: 0;
  position: fixed;
  height: 115px;
  z-index: 100;
  transition: all 0.3s ease;

}
.nav-up {
    transform: translateY(-115px);
    transition: all 0.5s ease;
    width: 100%;
  }
  .site-content{
    margin-top: 115px;
  }
  </style>
</head>
<body>
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v4.0'
        });
      };

      (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <!-- Your customer chat code -->
    <div class="fb-customerchat"
      attribution=setup_tool
      page_id="106507137419133"
      theme_color="#ff3300"
      logged_in_greeting="{{ __('message.welcome') }}"
      logged_out_greeting="{{ __('message.welcome') }}">
    </div>

    <!-- Header -->
    @include('layouts.header')

    <div class="container-fuild">
      <!-- Site Content -->
      <div class="site-content ">
        @yield('content')
      </div>
    </div>

    @if(Request::route()->getName() != 'show_cart')
    <!-- MiniCart display -->
    @include('layouts.minicart')
    @endif

    <!-- Footer -->
    @include('layouts.footer')
    <a id="button"><svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 32 32"><path d="M 16 5.6875 L 1.59375 20.09375 L 2.28125 20.8125 L 6.1875 24.71875 L 6.90625 25.40625 L 16 16.3125 L 25.09375 25.40625 L 25.8125 24.71875 L 29.71875 20.8125 L 30.40625 20.09375 Z M 16 8.53125 L 27.5625 20.125 L 25.125 22.5625 L 16.71875 14.1875 L 16 13.5 L 15.28125 14.1875 L 6.875 22.5625 L 4.4375 20.125 Z"/></svg></a>


    <!-- Embed Scripts -->
    <script src="{{ asset('common/js/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('common/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('common/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('common/js/sweetalert2.min.js') }}"></script>

    <!-- Custom Scripts -->
    <script src="{{ asset('js/custom.js') }}"></script>
    @if(Request::route()->getName() != 'show_cart')
    <script src="{{ asset('js/minicart.js') }}"></script>
    @endif
    @yield('js')
    <script>
      var btn = $('#button');
    
    $(window).scroll(function() {
      if ($(window).scrollTop() > 300) {
        btn.addClass('show');
      } else {
        btn.removeClass('show');
      }
    });
    
    btn.on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({scrollTop:0}, '300');
    });


    // Hide header on scroll down
var didScroll;
var lastScrollTop = 0;
var delta = 0;
var navbarHeight = $('#header').outerHeight();
console.log(navbarHeight);

$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
});

function hasScrolled() {
    var st = $(this).scrollTop();

    // Make scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;

    // If scrolled down and past the navbar, add class .nav-up.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('#header').addClass('nav-up');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            $('#header').removeClass('nav-up').addClass('bachground');
        }
        if(st==0) {
            $('#header').removeClass('bachground');
        }
    }
    lastScrollTop = st;
}
     </script>
</body>
</html>
