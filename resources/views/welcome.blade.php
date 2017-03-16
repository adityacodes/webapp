@extends('layouts.auth')


@section('stylesheets')
    <link rel="stylesheet" href="{{asset('lpage/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('lpage/css/bootstrap-responsive.min.css')}}">
    <link rel="stylesheet" href="{{asset('lpage/css/nivo-slider.css')}}">
    <link rel="stylesheet" href="{{asset('lpage/css/prettyPhoto.css')}}">
    <link rel="stylesheet" href="{{asset('lpage/css/flexslider.css')}}">
    <link rel="stylesheet" href="{{asset('lpage/css/layout.css')}}">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
    
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js')}}"></script>
    <![endif]-->
    
    <noscript><link rel="stylesheet" href="{{asset('lpage/css/no-js.css')}}"></noscript>
    
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('lpage/images/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{asset('lpage/images/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('lpage/images/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('lpage/images/apple-touch-icon-114x114.png')}}">
@endsection


@section('content')

<div id="header">
  <div class="container">
   
    <div class="logo text-center"><img src="{{asset('gtp.jpg')}}" alt="" height="250" width="151">
        <div class="header"><h1>Global Tech Promoters</h1></div>
        </div> <!-- Logo  URL -->
   
   
   <p></p>
  </div> <!-- End container -->
 </div> <!-- End header -->
 
 <div id="top">
  <div class="container">
   <div class="row">
   
    <div class="slider span8">
     <div class="nivoSlider">
      <img src="{{asset('lpage/images/slider/1.jpg')}}" alt="Image" class="screenshoot-primary">
      <img src="{{asset('lpage/images/slider/2.jpg')}}" alt="Image">
      <img src="{{asset('lpage/images/slider/3.jpg')}}" alt="Image">
      <img src="{{asset('lpage/images/slider/4.jpg')}}" alt="Image">
     </div>
    </div> <!-- End slider -->
  
    <div class="span4 text">
     <h4>Log In!</h4>
     <p></p>
     <form id="register-form" method="post">
      <input type="text" name="Username" placeholder="Username*" />
      <input type="text" name="Password" placeholder="Password" />
      <input type="submit" name="submit" value="Login" class="btn"  style="margin-bottom: 8px" />
      <input type="submit" name="submit" value="Sign Up" class="btn" />

     </form>
    </div> <!-- End text -->
   
   </div> <!-- End row -->
  </div> <!-- End container -->
 </div> <!-- End top -->
 
 <div id="main">
  <div class="container">
  
   <div class="features">
    <div class="header">
     <h2>Our Best Features</h2>
     <p></p>
    </div>
    
    <div class="row">
     <div class="span6 item"> <!-- one -->
      <img src="{{asset('lpage/images/features/Computer.png')}}" alt="Icon" />
      <div class="content">
       <h4>Platform for Non-Technical Officer to be technical person with security advantage</h4>
       <p></p>
      </div>
     </div>
     <div class="span6 item"> <!-- two -->
      <img src="{{asset('lpage/images/features/Paste.png')}}" alt="Icon" />
      <div class="content">
       <h4>Get certificate of certified computer lpage by global tech promoter</h4>
       <p></p>
      </div>
     </div>
    </div> <!-- End row -->
    
    <div class="row">
     <div class="span6 item"> <!-- one -->
      <img src="{{asset('lpage/images/features/Template.png')}}" alt="Icon" />
      <div class="content">
       <h4>Ask your queries to our cyber security experts directly</h4>
       <p></p>
      </div>
     </div>
   </div> <!-- End features -->
   
   <div class="sep-border"></div> <!-- separator -->
   
   <div class="projects">
    <div class="header">
     <h2>Process</h2>
     <p>Aenean dictum pharetra nibh, sodales luctus felis aliquet at.</p>
    </div>
    
  
   </div> <!-- End projects -->
   
   <div class="sep-border"></div> <!-- separator -->
   
   <div class="testimonials">
    <div class="header">
     <h2>Top Ten Performers</h2>
     <p></p>
    </div>
    
    <div class="row">
    <marquee attribute_name="attribute_value">
     <div class="span3 item"> <!-- one -->
      <img src="{{asset('lpage/images/testimonials/1.png')}}" alt="Avatar" />
      <p>Suspendisse ornare luctus tempus nulla nec orci erat, sed consequat lacus dum curabitur vel odio eu sapien fermentum placerat pharetra ac lectus ut erat sapien, lobortis nec mattis eget, tempus sit.</p>
      <div class="name">
       <span>John Doen</span>
      </div>
     </div>
     <div class="span3 item"> <!-- two -->
      <img src="{{asset('lpage/images/testimonials/1.png')}}" alt="Avatar" />
      <p>Suspendisse ornare luctus tempus nulla nec orci erat, sed consequat lacus dum curabitur vel odio eu sapien fermentum placerat pharetra ac lectus ut erat sapien, lobortis nec mattis eget, tempus sit.</p>
      <div class="name">
       <span>John Doen</span>
      </div>
     </div>
     <div class="span3 item"> <!-- three -->
      <img src="{{asset('lpage/images/testimonials/1.png')}}" alt="Avatar" />
      <p>Suspendisse ornare luctus tempus nulla nec orci erat, sed consequat lacus dum curabitur vel odio eu sapien fermentum placerat pharetra ac lectus ut erat sapien, lobortis nec mattis eget, tempus sit.</p>
      <div class="name">
       <span>John Doen</span>
      </div>
     </div>
     <div class="span3 item"> <!-- four -->
      <img src="{{asset('lpage/images/testimonials/1.png')}}" alt="Avatar" />
      <p>Suspendisse ornare luctus tempus nulla nec orci erat, sed consequat lacus dum curabitur vel odio eu sapien fermentum placerat pharetra ac lectus ut erat sapien, lobortis nec mattis eget, tempus sit.</p>
      <div class="name">
       <span>John Doen</span>
      </div>
     </div>
     </marquee>
    </div> <!-- End row -->
   </div> <!-- End testimonials -->
   
  </div> <!-- End container -->
 </div> <!-- End main -->
 
 <div class="buynow">
  <div class="container">
   <a href="#" class="btn" style="margin-bottom: 8px" >15+ cyber Security</a>
   <a href="#" class="btn" style="margin-bottom: 8px" >5 Modules</a>
   <a href="#" class="btn" style="margin-bottom: 8px" >150+ questions</a><br>
   <a href="#" class="btn" style="margin-bottom: 8px" >1 exam</a>
   <a href="#" class="btn" style="margin-bottom: 8px" >3 Attempts</a>
   <a href="#" class="btn" style="margin-bottom: 8px" >1 certificate</a><br>
   <a href="#" class="btn" style="margin-bottom: 8px" >Direct question and answers</a>

  </div> <!-- End container -->
 </div> <!-- End buynow -->
 
 <div id="footer">
  <div class="container">
   
 
   
   <div class="sep-border"></div> <!-- separator -->
   <div class="copyright">&copy; Copyright 2013 Dots Theme. All rights reserved.</div> <!-- Copyright text -->
   
  </div> <!-- End container -->
 </div> <!-- End footer -->
 
 <a href="#" class="scrollup" title="Back to Top!">Scroll</a>
 
@endsection

@section('scripts')
   <script type="text/javascript" src="{{asset('lpage/js/jquery-1.8.3.min.js')}}"></script>
    <script type='text/javascript' src="{{asset('lpage/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('lpage/js/jquery-easing.js')}}"></script>
    <script type='text/javascript' src="{{asset('lpage/js/jquery.nivo.slider.pack.js')}}"></script>
    <script type='text/javascript' src="{{asset('lpage/js/jquery.placeholder.min.js')}}"></script>
    <script type='text/javascript' src="{{asset('lpage/js/jquery.prettyPhoto.js')}}"></script>
    <script type='text/javascript' src="{{asset('lpage/js/jquery.flexslider-min.js')}}"></script>
    <script type='text/javascript' src="{{asset('lpage/js/jquery.backstretch.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('lpage/js/main.js')}}"></script>

@endsection