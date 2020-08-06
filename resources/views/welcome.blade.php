@extends('layout.layout')
@section('style')
<style type="text/css">
/* progressbar */
  .progress-wrap {
    display: none;
    vertical-align: middle;
    height: 15px;
    width: 60px
  }

  .progress-wrap.loading {
    display: inline-block;
  }

  .progress-wrap .progress-bar {
    position: relative;
    background-color: transparent;
    padding: 0;
    width: 400px;
    margin-right: 0;
    height: 30px;
    display: inline-block
  }

  .progress-wrap .progress-inner {
    display: block;
    height: 100%;
    width: 100%;
    border-radius: 20px;
    background-color: #f0a3a3;
    background-image: -moz-linear-gradient(top, #f0a3a3, #ff0197);
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #f0a3a3), color-stop(1, #ff0197));
    background-image: -webkit-linear-gradient(#f0a3a3, #ff0197);
    -webkit-box-shadow: inset 0 2px 9px rgba(255, 255, 255, 0.3), inset 0 -2px 6px rgba(0, 0, 0, 0.4);
    -moz-box-shadow: inset 0 2px 9px rgba(255, 255, 255, 0.3), inset 0 -2px 6px rgba(0, 0, 0, 0.4);
    box-shadow: inset 0 2px 9px rgba(255, 255, 255, 0.3), inset 0 -2px 6px rgba(0, 0, 0, 0.4);
    position: relative;
    overflow: hidden
  }

  .progress-wrap .progress-inner:after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    background-image: -webkit-gradient(linear, 0 0, 100% 100%, color-stop(.25, rgba(255, 255, 255, .2)), color-stop(.25, transparent), color-stop(.5, transparent), color-stop(.5, rgba(255, 255, 255, .2)), color-stop(.75, rgba(255, 255, 255, .2)), color-stop(.75, transparent), to(transparent));
    background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, .2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%, transparent 75%, transparent);
    z-index: 1;
    -webkit-background-size: 50px 50px;
    -moz-background-size: 50px 50px;
    -webkit-animation: moveProgress 2s linear infinite;
    -webkit-border-top-right-radius: 8px;
    -webkit-border-bottom-right-radius: 8px;
    -moz-border-radius-top-right: 8px;
    -moz-border-radius-bottom-right: 8px;
    border-top-right-radius: 8px;
    border-bottom-right-radius: 8px;
    -webkit-border-top-left-radius: 20px;
    -webkit-border-bottom-left-radius: 20px;
    -moz-border-radius-top-left: 20px;
    -moz-border-radius-bottom-left: 20px;
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
    overflow: hidden
  }

  @keyframes moveProgress {
    0% {
      background-position: 0 0
    }

    100% {
      background-position: 50px 50px
    }
  }
}
</style>
@endsection
@section('content')
<div class="progress-wrap loading">
  <div class="progress-bar">
    <div class="progress-inner">Synchronizing jobs...</div>
  </div>
</div>
<div class="content">
  <div class="container body-content">
    <div class="text-wrapper">
      <h1 style="font-family: fantasy;">Back Office of My Genesis</h1>
      <p class="body-intro" style="font-family: cursive;">Made by <b>inoui.</b>agency</p>
      <a href="#" class="button" style="display:none;">Download Now!</a>
    </div>
    <div class="phone-wrapper">
      <a href="#" class="arrow-left"><img src="http://dev.themaninblue.com/canva/learntocode/images/arrow-left.svg"></a>
      <div class="phone">
        <img src="http://dev.themaninblue.com/canva/learntocode/images/iphone.png" alt="iPhone mockup">
        <ul class="carousel">
          <li><img src="{{ secure_asset('img/1.jpg') }}" alt="Screen"></li>
          <li><img src="{{ secure_asset('img/2.jpg') }}" alt="Screen"></li>
          <li><img src="{{ secure_asset('img/3.jpg') }}" alt="Screen"></li>
          <li><img src="{{ secure_asset('img/4.jpg') }}" alt="Screen"></li>
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
</div>

<footer>
  <!-- <ul>
    <li><a href="#">Terms &amp; conditions</a></li>
    <li><a href="#">Privacy policy</a></li>
  </ul> -->
</footer>
@endsection
@section('script')
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

$.ajaxSetup({
     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
 });
 // Initialize Firebase
var config = {
    apiKey: "AIzaSyD4wDis1nZv-K1vlnHc34hcmLAYX2xQRa4",
    authDomain: "mygenesis-2adb3.firebaseapp.com",
    databaseURL: "https://mygenesis-2adb3.firebaseio.com",
    projectId: "mygenesis-2adb3",
    storageBucket: "mygenesis-2adb3.appspot.com",
    messagingSenderId: "760817321870",
    appId: "1:760817321870:web:ac7e7192b3e5a57c3ec6df",
    measurementId: "G-SZ2TVRNXCN"
};
firebase.initializeApp(config);
$(".progress-wrap").css("display","block");
$(".content").css("display","none");
//remove exist jobs data to create new jobs data
firebase.database().ref('jobs').remove();
// firebase.database().ref('jobs/').once('value', function(snapshot) {
//   var value = snapshot.val();
//   if(value){
//     firebase.database().ref('jobs').remove();
//   }
// });
//getting jobs from softy
$.ajax({
    type:'POST',
    url:'{{ url("get-jobs") }}',
    contentType: false,
    processData: false,
    success: function (jobs) {
      const obj = JSON.parse(jobs);
      var job_id = 0;
      $.each(obj, function (i) {
        $.each(obj[i], function (key, val) {
          //each job starts with 'DATE' parameter. At this time generate uniuque job id to divide each jobs
          if(key == 'date'){
            job_id = firebase.database().ref('jobs').push().key;
            firebase.database().ref('jobs/'+job_id).set({
                date: '',
                title: '',
                id: '',
                contract_type: '',
                description: '',
                position: '',
                profile: '',
                url: '',
                location: '',
                postcode: '',
                country: '',
                salary: '',
                rome: '',
            }, function(error) {
                if(error)
                    alert(error);
            });
          }
          firebase.database().ref('jobs/'+job_id+'/'+key).set(val);
        });
      });
      $(".progress-wrap").css("display","none");
      $(".content").css("display","block");
    },
    error: function () {
        alert("Getting jobs was failed.")
    }
});
</script>
@endsection