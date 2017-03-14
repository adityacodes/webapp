@extends('layouts.auth')

@section('stylesheets')
<style type="text/css">
      .bs-wizard {margin-top: 40px;}

      /*Form Wizard*/
      .bs-wizard {border-bottom: solid 1px #e0e0e0; padding: 0 0 10px 0;}
      .bs-wizard > .bs-wizard-step {padding: 0; position: relative;}
      .bs-wizard > .bs-wizard-step + .bs-wizard-step {}
      .bs-wizard > .bs-wizard-step .bs-wizard-stepnum {color: #595959; font-size: 16px; margin-bottom: 5px;}
      .bs-wizard > .bs-wizard-step .bs-wizard-info {color: #999; font-size: 14px;}
      .bs-wizard > .bs-wizard-step > .bs-wizard-dot {position: absolute; width: 30px; height: 30px; display: block; background: #fbe8aa; top: 45px; left: 50%; margin-top: -15px; margin-left: -15px; border-radius: 50%;} 
      .bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {content: ' '; width: 14px; height: 14px; background: #fbbd19; border-radius: 50px; position: absolute; top: 8px; left: 8px; } 
      .bs-wizard > .bs-wizard-step > .progress {position: relative; border-radius: 0px; height: 8px; box-shadow: none; margin: 20px 0;}
      .bs-wizard > .bs-wizard-step > .progress > .progress-bar {width:0px; box-shadow: none; background: #fbe8aa;}
      .bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {width:100%;}
      .bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {width:50%;}
      .bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {width:0%;}
      .bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {width: 100%;}
      .bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {background-color: #f5f5f5;}
      .bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {opacity: 0;}
      .bs-wizard > .bs-wizard-step:first-child  > .progress {left: 50%; width: 50%;}
      .bs-wizard > .bs-wizard-step:last-child  > .progress {width: 50%;}
      .bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot{ pointer-events: none; }
      /*END Form Wizard*/
    </style>
@endsection

@section('content')

<div class="container login-content" style="padding-top: 50px">
<div class="logo text-center"><img src="{{asset('img/gtp.png')}}" alt="" height="150" width="211">
        <div class="text-center"><h2>Global Tech Promoters</h2></div>
        </div>
      <div class="row container">
      <div class="col-md-1"></div>
      <div id="carousel-example-generic" class="carousel slide col-md-6 panel panel-default" data-ride="carousel" style="height: 300px">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="{{asset('img/cs.jpeg')}}" style="width: 800px; height: 300px" alt="Learn to be secure...">
            <div class="carousel-caption">
              Learn to be secure...
            </div>
          </div>
          <div class="item">
            <img src="{{asset('img/21757.jpeg')}}" style="width: 800px; height: 300px" alt="...">
            <div class="carousel-caption">
              Your account may be hacked by hacker,know to secure...
            </div>
          </div>
          
          <div class="item">
            <img src="{{asset('img/cst.jpeg')}}" style="width: 800px; height: 300px" alt="...">
            <div class="carousel-caption">
              Safety for your own in cyber world
            </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      
      <div class="col-md-5 " style="border-width: 5px; border-color: black">
        <div class="panel panel-warning">
        <div class="panel-heading" style="padding-top: 50px">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Username</span>
          <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
        </div>
        <div>&nbsp;</div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Password</span>
          <input type="text" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
        </div><br><br><br>
        <div class="text-center buttons">

            <button type="submit" id="submit_button" class="btn btn-success" ng-disabled="!loginForm.$valid">Login</button>
            <button type="submit" id="submit_button" class="btn btn-success" ng-disabled="">Sign up</button>
        </div>
        </div>
      </div></div>
    </div>  <br>
    <div class="row container text-center">
      <h2>Top Ten Performers</h2>
      <marquee attribute_name="attribute_value">
        <div class="col-lg-2 col-sm-3 text-center img-center">
               <img class="img-circle img-responsive img-center center-block" src="{{asset('21757.jpeg')}}" alt="">
               <h3>John Smith</h3>
        </div>
        <div class="col-lg-2 col-sm-3 text-center">
               <img class="img-circle img-responsive img-center center-block" src="{{asset('21757.jpeg')}}" alt="">
               <h3>John Smith</h3>
        </div>
        <div class="col-lg-2 col-sm-3 text-center">
               <img class="img-circle img-responsive img-center center-block" src="{{asset('21757.jpeg')}}" alt="">
               <h3>John Smith</h3>
        </div>
        <div class="col-lg-2 col-sm-3 text-center">
               <img class="img-circle img-responsive img-center center-block" src="{{asset('21757.jpeg')}}" alt="">
               <h3>John Smith </h3>
        </div>
        <div class="col-lg-2 col-sm-3 text-center">
               <img class="img-circle img-responsive img-center center-block" src="{{asset('21757.jpeg')}}" alt="">
               <h3>John Smith
                   
               </h3>
        </div>
        <div class="col-lg-2 col-sm-3 text-center">
               <img class="img-circle img-responsive img-center center-block" src="{{asset('21757.jpeg')}}" alt="">
               <h3>John Smith
                   
               </h3>
        </div>
      </marquee>
    </div>
    <div class="row container">
      <div class="row bs-wizard" style="border-bottom:0;">
                
                <div class="col-xs-2 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Register</div>
                </div>
                
                <div class="col-xs-2 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Learn</div>
                </div>
                
                <div class="col-xs-2 bs-wizard-step active"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Exam</div>
                </div>
                
                <div class="col-xs-2 bs-wizard-step disabled"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Step 4</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"> Certificate</div>
                </div>

                <div class="col-xs-2 bs-wizard-step disabled"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Step 5</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center"> Secure your identity</div>
                </div>
            </div>
    </div>
    <div>&nbsp;</div>
    <div class="container">
    <ul>
      <li><h3 style="color: blue">Platform for Non-Technical Officer to be technical person with security advantage</h3 ></li>
      <li><h3 style="color: blue">Get certificate of certified computer user by global tech promoter</h3 ></li>
      <li><h3 style="color: blue">Ask your queries to our cyber security experts directly</h3 ></li>
    </ul>
      
    </div>
    <div>&nbsp;</div>
    <div class="row container text-center">
      <div class="buttons">
        <button class="btn button btn-warning" style="margin-bottom: 8px"type="submit">15+ cyber Security officers</button>
        <button class="btn button btn-warning" style="margin-bottom: 8px"type="submit">5 Modules</button>
        <button class="btn button btn-warning" style="margin-bottom: 8px"type="submit">150+ questions</button><br>
        <button class="btn button btn-warning" style="margin-bottom: 8px"type="submit">1 exam</button>
        <button class="btn button btn-warning" style="margin-bottom: 8px"type="submit">3 Attempts</button>
        <button class="btn button btn-warning" style="margin-bottom: 8px"type="submit">1 certificate</button><br>
        <button class="btn button btn-warning" style="margin-bottom: 8px"type="submit">Direct question and answers</button>
      </div>
    </div>
    <div class="footer">
      
    </div>
  </div>
@endsection
