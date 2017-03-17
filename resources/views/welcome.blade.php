@extends('layouts.auth')

@section('title', 'Home')

@section('stylesheets')

  <link href="{{asset('user/css/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('user/css/owl.theme.default.css')}}" rel="stylesheet">

  <style type="text/css">
    .item{
      border: 4px solid black; border-radius: 10px;

    }
  </style>
@endsection

@section('content')

<body class="login-screen" background="{{asset('img/base-top.jpg')}}">

      <div class="login-content">

        <div class="logo text-center"><img src="{{asset('img/gtp.png')}}" alt="" height="150" width="211">
        <div class="text-center"><h2>Global Tech Promoters</h2></div>
        </div>
        <div class="col-md-6" >
              <div class="owl-carousel" >

              <div class="item">
                <img src="{{asset('img/cst.jpeg')}}">
              </div>
              <div class="item">
                <img src="{{asset('img/21757.jpeg')}}">
              </div>
              <div class="item">
                 <img src="http://www.septembersea.com/images/Sunrises%20to%20Sunsets/Website%20Psychedelic%20Sunset.jpg">
              </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="menus">
              LOGIN HERE
            </div>  
          <form method="POST" action="{{url('user/login')}}" accept-charset="UTF-8" name="loginForm" novalidate="" class="loginform ng-valid-minlength ng-dirty ng-valid-parse ng-valid ng-valid-required">
                  {{Form::token()}}

                  <div class="input-group">

                      <span class="input-group-addon" id="basic-addon1">
                          <i class="icon icon-user"></i>
                      </span>



                      <input class="form-control ng-untouched ng-dirty ng-valid-parse ng-valid ng-valid-required" ng-model="email" required="true" id="email" placeholder="Username/Email" 
                      ng-class="{&quot;has-error&quot;: loginForm.email.$touched &amp;&amp; loginForm.email.$invalid}" 
                      name="email" type="text">

                      <div class="validation-error ng-inactive" ng-messages="loginForm.email.$error">
                          <!-- ngMessage: required -->
                          <!-- ngMessage: email -->
                      </div>
                  </div>

                  <div class="input-group">

                      <span class="input-group-addon" id="basic-addon1"><i class="icon icon-lock"></i></span>

                      <input class="form-control instruction-call ng-untouched ng-valid-minlength ng-dirty ng-valid-parse ng-valid ng-valid-required" placeholder="Password" ng-model="registration.password" required="true" id="password" ng-class="{&quot;has-error&quot;: loginForm.password.$touched &amp;&amp; loginForm.password.$invalid}" ng-minlength="5" name="password" type="password" value="">

                      <div class="validation-error ng-inactive" ng-messages="loginForm.password.$error">

                          <!-- ngMessage: required -->

                          <!-- ngMessage: minlength -->

                      </div>



                  </div>

                  <div class="text-center buttons">

                      <button type="submit" id="submit_button" class="btn button btn-success btn-lg" ng-disabled="!loginForm.$valid">Login</button>

                      <div class="social-logins">
                          <a href="#/auth/facebook" class="btn btn-lg btn-facebook btn-full"><i class="fa fa-facebook"></i> Login With Facebook</a>


                          <a href="#/auth/google" class="btn btn-lg btn-google-plus btn-full"><i class="fa fa-google-plus"></i>  Login With Google</a>
                          
                          <div class="alert alert-info margintop30">
                              <strong>Note: </strong>
                              Social Logins Are Only For Student Accounts
                          </div>
                      </div>

                  </div>
          </form>

        </div>
          


    </div>
    
        <div class="row">

          <div class="col-md-6"></div>
          <div class="col-md-6"></div>

        </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('user/js/owl.carousel.min.js')}}"></script>
    {{-- <script type="text/javascript" src="{{asset('user/js/Chart.js')}}"></script>  --}}
<script type="text/javascript">
  $(document).ready(function(){
    $(".owl-carousel").owlCarousel({
    loop:true,
        items:1,
        margin:30,
            responsiveClass:true,
        stagePadding:30,
        smartSpeed:450,
    autoplay: true,
    });
  });

</script>
@endsection