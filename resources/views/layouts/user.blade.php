<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="This is a online examination system">
	<meta name="keywords" content="Exam system|exam|exams">
	<link rel="icon" href="#/uploads/settings/I8GYi9XN7OrjAi2.png" type="image/x-icon">
	<title>@yield('title') | User Panel</title>
	<!-- Bootstrap Core CSS --> 
	<link href="{{asset('user/css/bootstrap.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('user/css/bootstrap-datepicker.min.css')}}">
	<link href="{{asset('user/css/sweetalert.css')}}" rel="stylesheet" type="text/css">

		
    <link href="{{asset('user/css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

	<!-- Morris Charts CSS --> 
	<link href="{{asset('user/css/morris.css')}}" rel="stylesheet">
	<!-- Custom CSS --> 
	<link href="{{asset('user/css/sb-admin.css')}}" rel="stylesheet">
	<!-- Custom Fonts --> 
	<link href="{{asset('user/css/custom-fonts.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user/css/materialdesignicons.css')}}" rel="stylesheet" type="text/css">

	@yield('stylesheets')
	{{-- <link href="{{asset('font-awesome.min.css')}}" rel="stylesheet" type="text/css"> --}}

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --> 
	
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// --> 
		<!--[if lt IE 9]> 
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> 
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> 
	<![endif]--> 
</head>
<body cz-shortcut-listen="true">
<div id="wrapper" class="no-right-sidebar">
	<!-- Navigation --> 
	<nav class="navbar navbar-custom navbar-fixed-top " role="navigation">
		<!-- Brand and toggle get grouped for better mobile display --> 
		<div class="navbar-header"> 
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> 
				<span class="sr-only">Toggle navigation</span> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 
			</button> 
			<a class="navbar-brand" href="{{url('user/dashboard')}}">
			<ul class="list-inline">
				<li><img width="100" height="50" src="{{asset('gtp.jpg')}}" alt="Global Tech Promoters"></li>
				<li><h4>GLOBAL TECH PROMOTERS</h4></li>
			</ul>
			 
			</a> 
		</div>
		<!-- Top Menu Items --> 
		<ul class="nav navbar-right top-nav">
			<li class="dropdown profile-menu">
				<div class="dropdown-toggle top-profile-menu" data-toggle="dropdown">
					<div class="username">
						<h2>{{Auth::user()->name}}</h2>
					</div>
					<div class="profile-img"> <img src="{{asset('21757.jpeg')}}" alt=""> </div>
					<div class="mdi mdi-menu-down"></div>
				</div>
				<ul class="dropdown-menu">
					<li>
						<a href="{{url('user/profile')}}">
							<sapn>My Profile</sapn>
						</a>
					</li>
					<li>
						<a href="{{url('user/change-password')}}">
							<sapn>Change Password</sapn>
						</a>
					</li>
					<li>
						<a href="{{url('user/settings')}}">
							<sapn>Settings</sapn>
						</a>
					</li>
					<li>
						<a href="{{url('user/feedback')}}">
							<sapn>Feedback</sapn>
						</a>
					</li>
					<li>
						<a href="{{url('user/logout')}}">
							<sapn>Logout</sapn>
						</a>
					</li>
				</ul>
			</li>
		</ul>
		<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens --> <!-- /.navbar-collapse --> 
	</nav>
	<aside class="left-sidebar">
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav side-nav ">
				<li class="{{Request::is('user/dashboard') ? 'active':''}}"> <a href="{{url('user/dashboard')}}"> <i class="icon-home"></i> Dashboard </a> </li>
				<li class="{{Request::is('user/courses') ? 'active':''}}"> <a href="{{url('user/courses')}}"> <i class="fa fa-th-list"></i> Courses </a> </li>
				<li>
					<a data-toggle="collapse" data-target="#exams"><i class=" icon-exams"></i> Exams </a> 
					<ul id="exams" class="collapse sidemenu-dropdown">
						<li><a href="{{url('user/exam/categories')}}"> <i class="fa fa-random"></i>Categories</a></li>
						<li><a href="{{url('user/exam/list')}}"> <i class="fa fa-list-ol"></i>Exam Series</a></li>
					</ul>
				</li>
				<li class="{{Request::is('user/analysis/*') ? 'active':''}}">
					<a data-toggle="collapse" data-target="#analysis"> <i class="fa fa-bar-chart" aria-hidden="true"></i> Analysis </a> 
					<ul id="analysis" class="collapse sidemenu-dropdown">
						<li>
							<a href="#{{url('user/analysis/by-course')}}"> 
								<i class="fa fa-key"></i>By Course
							</a>
						</li>
						<li>
							<a href="#{{url('user/analysis/by-exam')}}"> 
								<i class="fa fa-suitcase"></i>By Exam
							</a>
						</li>
						<li>
							<a href="#{{url('user/analysis/exam-attempts')}}"> 
								<i class="fa fa-history"></i>History 
							</a>
						</li>
					</ul>
				</li>
				<li class="{{Request::is('user/messages') ? 'active':''}}"> 
					<a href="{{url('user/messages')}}">
						<i class="fa fa-comments-o" aria-hidden="true"></i> Messages 
					</a> 
				</li>
				<li> 
					<a href="#/payments/list/charles">
						<i class="icon-history"></i> Subscriptions 
					</a> 
				</li>
				<li class="{{Request::is('user/notifications') ? 'active':''}}"> 
					<a href="{{url('user/notifications')}}">
						<i class="fa fa-bell-o" aria-hidden="true"></i> Notifications 
					</a> 
				</li>
			</ul>
		</div>
	</aside>

		<div id="page-wrapper">
				@yield('content')
		<!-- /#page-wrapper --> 
		</div>
	<!-- /#wrapper --> 

		<!-- jQuery --> 
		<script async="" src="{{asset('user/js/analytics.js')}}"></script>
		<script src="{{asset('user/js/jquery-1.12.1.min.js')}}"></script> 

		<!-- Bootstrap Core JavaScript --> 
		<script src="{{asset('user/js/bootstrap.min.js')}}"></script> 
		<!--JS Control--> 
		<script src="{{asset('user/js/main.js')}}"></script> 
		<script src="{{asset('user/js/sweetalert-dev.js')}}"></script> 
		<link rel="stylesheet" href="{{asset('user/css/alertify.core.css')}}">
		<link rel="stylesheet" href="{{asset('user/css/alertify.default.css')}}" id="toggleCSS">
		<script src="{{asset('user/js/alertify.js')}}"></script> 
		<script type="text/javascript" src="{{asset('user/js/Chart.js')}}"></script> 

		@yield('scripts')
</body>
</html>