<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Back-Office RH</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        <style>
            .full-height {
                /*height: 100vh!important;*/
            }

            .flex-center {
                /*align-items: center!important;
                display: flex!important;
                justify-content: center!important;*/
            }

            .position-ref {
                /*position: relative!important;*/
            }

            .top-right {
                position: absolute!important;
                right: 10px!important;
                top: 18px!important;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
            <div class="container body-content">
              <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">S'identifier</a>
                            <a href="{{ route('register') }}">S'inscrire</a>
                        @endauth
                    </div>
                @endif
              </div>
              <div class="text-wrapper" style="margin-top:10vh;">
                <h1 style="font-family: fantasy;">Back Office of My Genesis</h1>
                <p class="body-intro" style="font-family: cursive;">Made by <b>inoui.</b>agency</p>
                <a href="#" class="button" style="display:none;">Download Now!</a>
              </div>
              <div class="phone-wrapper">
                <a href="#" class="arrow-left"><img src="http://dev.themaninblue.com/canva/learntocode/images/arrow-left.svg"></a>
                <div class="phone">
                  <img src="http://dev.themaninblue.com/canva/learntocode/images/iphone.png" alt="iPhone mockup">
                  <ul class="carousel">
                    <li><img src="{{ asset('img/1.jpg') }}" alt="Screen"></li>
                    <li><img src="{{ asset('img/2.jpg') }}" alt="Screen"></li>
                    <li><img src="{{ asset('img/3.jpg') }}" alt="Screen"></li>
                    <li><img src="{{ asset('img/4.jpg') }}" alt="Screen"></li>
                  </ul>
                </div>
                <a href="#" class="arrow-right"><img src="http://dev.themaninblue.com/canva/learntocode/images/arrow-right.svg"></a>
              </div>
            </div>

            <div class="mask" style="display:none;">
              <div class="dialog">
                <h2>Get the awesome!</h2>
                <p>There's only one more thing you have to do before you can get the awesome, and that's give us your email address:</p>
                <form>
                  <input type="email" />
                  <input class="button" type="submit" value="Gimme!" />
                </form>
              </div>
            </div>

            <footer>
              <!-- <ul>
                <li><a href="#">Terms &amp; conditions</a></li>
                <li><a href="#">Privacy policy</a></li>
              </ul> -->
            </footer>
    </body>
</html>
<script>
init();


function init() {
  document.querySelector('.text-wrapper .button').addEventListener('click', clickButton);
  document.querySelector('.mask').addEventListener('click', clickMask);
  document.querySelector('.arrow-left').addEventListener('click', clickArrowLeft);
  document.querySelector('.arrow-right').addEventListener('click', clickArrowRight);
}


function clickButton(event) {
  document.querySelector('.mask').classList.add('on');
  event.preventDefault();
}


function clickMask(event) {
  if (event.target == this) {
    this.classList.remove('on');
  }
}


function clickArrowLeft(event) {
  var carousel = document.querySelector('.carousel');

  if (carousel.classList.contains('page4')) {
    carousel.classList.remove('page4');
  }
  else if (carousel.classList.contains('page3')) {
    carousel.classList.remove('page3');
  }
  else if (carousel.classList.contains('page2')) {
    carousel.classList.remove('page2');
  }

  event.preventDefault();
}


function clickArrowRight(event) {
  var carousel = document.querySelector('.carousel');

  if (carousel.classList.contains('page2')) {
    carousel.classList.add('page3');
  }
  else {
 carousel.classList.add('page2');
  }

  event.preventDefault();
}
</script>