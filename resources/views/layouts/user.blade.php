<!DOCTYPE html> <!-- saved from url=(0039)#/dashboard --> 
<html lang="en" dir="ltr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="This is a online examination system">
	<meta name="keywords" content="Exam system|exam|exams">
	<link rel="icon" href="#/uploads/settings/I8GYi9XN7OrjAi2.png" type="image/x-icon">
	<title> Dashboard</title>
	<!-- Bootstrap Core CSS --> 
	<link href="{{asset('user/css/bootstrap.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('user/css/bootstrap-datepicker.min.css')}}">
	<link href="{{asset('user/css/sweetalert.css')}}" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- Morris Charts CSS --> 
	<link href="{{asset('user/css/morris.css')}}" rel="stylesheet">
	<!-- Custom CSS --> 
	<link href="{{asset('user/css/sb-admin.css')}}" rel="stylesheet">
	<!-- Custom Fonts --> 
	<link href="{{asset('user/css/custom-fonts.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user/css/materialdesignicons.css')}}" rel="stylesheet" type="text/css">
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
			<a class="navbar-brand" href="#/"><img src="{{asset('t7M3eILDtoYYN0f.png')}}" alt="Menorah OES">
			</a> 
		</div>
		<!-- Top Menu Items --> 
		<ul class="nav navbar-right top-nav">
			<li class="dropdown profile-menu">
				<div class="dropdown-toggle top-profile-menu" data-toggle="dropdown">
					<div class="username">
						<h2>Charles</h2>
					</div>
					<div class="profile-img"> <img src="{{asset('21757.jpeg')}}" alt=""> </div>
					<div class="mdi mdi-menu-down"></div>
				</div>
				<ul class="dropdown-menu">
					<li>
						<a href="#/student/bookmarks/charles">
							<sapn>My Bookmarks</sapn>
						</a>
					</li>
					<li>
						<a href="#/users/edit/charles">
							<sapn>My Profile</sapn>
						</a>
					</li>
					<li>
						<a href="#/users/change-password/charles">
							<sapn>Change Password</sapn>
						</a>
					</li>
					<li>
						<a href="#/users/settings/charles">
							<sapn>Settings</sapn>
						</a>
					</li>
					<li>
						<a href="#/feedback/send">
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
	<div class="alert alert-info demo-alert"> &nbsp;&nbsp;&nbsp;
		<a href="#/dashboard#" class="close" data-dismiss="alert" aria-label="close">×</a> 
		<strong>Info!</strong> CRUD Operations Are Disabled In Demo Version 
	</div>
	<aside class="left-sidebar">
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav side-nav ">
				<li class="active"> <a href="#/"> <i class="icon-home"></i> Dashboard </a> </li>
				<li>
					<a data-toggle="collapse" data-target="#exams"><i class=" icon-exams"></i> Exams </a> 
					<ul id="exams" class="collapse sidemenu-dropdown">
						<li><a href="#/exams/student/categories"> <i class="fa fa-random"></i>Categories</a></li>
						<li><a href="#/exams/student-exam-series/list"> <i class="fa fa-list-ol"></i>Exam Series</a></li>
					</ul>
				</li>
				<li>
					<a data-toggle="collapse" data-target="#analysis"> <i class="fa fa-bar-chart" aria-hidden="true"></i> Analysis </a> 
					<ul id="analysis" class="collapse sidemenu-dropdown">
						<li>
							<a href="#/student/analysis/subject/charles"> 
								<i class="fa fa-key"></i>By Subjcet
							</a>
						</li>
						<li>
							<a href="#/student/analysis/by-exam/charles"> 
								<i class="fa fa-suitcase"></i>By Exam
							</a>
						</li>
						<li>
							<a href="#/exams/student/exam-attempts/charles"> 
								<i class="fa fa-history"></i>History 
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a data-toggle="collapse" data-target="#lms"><i class="icon-school-hub"></i> Lms </a> 
					<ul id="lms" class="collapse sidemenu-dropdown">
						<li>
							<a href="#/learning-management/categories"> 
								<i class="fa fa-random"></i>Categories</a>
							</li>
							<li>
								<a href="#/learning-management/series"> 
									<i class="fa fa-list-ol"></i>Series
								</a>
							</li>
						</ul>
					</li>
					<li> 
						<a href="#/messages">
							<i class="fa fa-comments-o" aria-hidden="true"></i> Messages 
						</a> 
					</li>
					<li> 
						<a href="#/payments/list/charles">
							<i class="icon-history"></i> Subscriptions 
						</a> 
					</li>
					<li> 
						<a href="#/notifications/list">
							<i class="fa fa-bell-o" aria-hidden="true"></i> Notifications 
						</a> 
					</li>
				</ul>
			</div>
		</aside>

		<div id="page-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<ol class="breadcrumb">
							<li>Dashboard</li>
						</ol>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="card card-blue text-xs-center">
							<div class="card-block">
								<h4 class="card-title">29</h4>
								<p class="card-text">Quiz Categories</p>
							</div>
							<a class="card-footer text-muted" href="#/exams/student/categories"> View All </a> 
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-yellow text-xs-center">
							<div class="card-block">
								<h4 class="card-title">96</h4>
								<p class="card-text">Quizzes</p>
							</div>
							<a class="card-footer text-muted" href="#/exams/student/exams/all"> View All </a> 
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-green text-xs-center">
							<div class="card-block">
								<h4 class="card-title">14</h4>
								<p class="card-text">Subjects</p>
							</div>
							<a class="card-footer text-muted" href="#/student/analysis/subject/charles"> View Analysis </a> 
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-primary dsPanel">
							<div class="panel-body">

							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-primary dsPanel">
							<div class="panel-body">
								#
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.container-fluid --> 
		</div>
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

	<script type="text/javascript"> 
		var ctx = document.getElementById("myChart0").getContext("2d"); var myChart = new Chart(ctx, {type: 'pie', animation:{animateScale:true, }, data: {labels: ["Correct","Wrong","Not Answered"], datasets: [{label: ["lbl"], data: [1900,4992,4327], backgroundColor: ["rgba(73,237,107,0.2)","rgba(103,151,20,0.2)","rgba(248,205,127,0.2)"], borderColor: ["rgba(73,237,107,0.2)","rgba(103,151,20,0.2)","rgba(248,205,127,0.2)"], borderWidth: 1 }, ], }, options: {scales: {}, title: {display: true, text: 'Overall Performance'}, } }); var ctx = document.getElementById("myChart1").getContext("2d"); var myChart = new Chart(ctx, {type: 'bar', animation:{animateScale:true, }, data: {labels: ["Aptitude Quiz","Quiz on Quant","SBI PO","SBI Cleark","Group I","Group II","Group III","Quiz on Gate","Quiz on GK","Gate","Logical Reasoning","Routers","Java","Sql Commands","Ages","M.Tech Entrance","EAMCET Exam","GMAT","RBI Test","Common Admission Test","C Skills Test","OSI Model"," TCP\/IP Model","Quiz on LAN","Phases","Process Modeling","Access Control","Information Security"," Interpolation","Plotting","Verbs","Active Voice","Quiz on GK","Algebra","Mathes Basics","Mysql","Quiz on C operators","B.Tech entrance test","Quiz on NDA","General Quiz","Test Quiz","Demo Quiz"], datasets: [{label: "Performance", data: ["100.00","71.43","51.43","51.22","44.44","5.71","10.64","18.75","12.96","9.72","8.82","0.00","0.00","0.00","57.14","62.50","3.39","24.19","33.33","39.68","4.76","17.65","0.00","0.00","40.91","43.75","31.82","8.00","42.31","15.00","13.33","29.63","48.89","35.71","42.55","68.00","43.24","23.08","1.49","42.86","0.00","53.33"], backgroundColor: ["rgba(184,32,215,0.2)","rgba(220,239,92,0.2)","rgba(5,217,111,0.2)","rgba(115,113,169,0.2)","rgba(130,94,64,0.2)","rgba(12,104,203,0.2)","rgba(177,19,17,0.2)","rgba(184,32,215,0.2)","rgba(45,84,217,0.2)","rgba(39,78,190,0.2)","rgba(13,173,229,0.2)","rgba(103,128,176,0.2)","rgba(105,46,134,0.2)","rgba(199,139,154,0.2)","rgba(118,45,170,0.2)","rgba(125,134,183,0.2)","rgba(198,200,110,0.2)","rgba(33,23,170,0.2)","rgba(143,55,149,0.2)","rgba(255,81,242,0.2)","rgba(76,216,135,0.2)","rgba(130,94,64,0.2)","rgba(161,57,140,0.2)","rgba(64,246,161,0.2)","rgba(83,124,36,0.2)","rgba(5,195,113,0.2)","rgba(146,194,79,0.2)","rgba(150,65,141,0.2)","rgba(221,168,255,0.2)","rgba(57,101,77,0.2)","rgba(253,216,185,0.2)","rgba(19,69,146,0.2)","rgba(168,130,136,0.2)","rgba(113,113,163,0.2)","rgba(67,221,37,0.2)","rgba(190,88,232,0.2)","rgba(214,218,33,0.2)","rgba(95,176,178,0.2)","rgba(95,49,34,0.2)","rgba(208,81,237,0.2)","rgba(237,65,96,0.2)","rgba(9,170,234,0.2)"], borderColor: ["rgba(184,32,215,1)","rgba(220,239,92,1)","rgba(5,217,111,1)","rgba(115,113,169,1)","rgba(130,94,64,1)","rgba(12,104,203,1)","rgba(177,19,17,1)","rgba(184,32,215,1)","rgba(45,84,217,1)","rgba(39,78,190,1)","rgba(13,173,229,1)","rgba(103,128,176,1)","rgba(105,46,134,1)","rgba(199,139,154,1)","rgba(118,45,170,1)","rgba(125,134,183,1)","rgba(198,200,110,1)","rgba(33,23,170,1)","rgba(143,55,149,1)","rgba(255,81,242,1)","rgba(76,216,135,1)","rgba(130,94,64,1)","rgba(161,57,140,1)","rgba(64,246,161,1)","rgba(83,124,36,1)","rgba(5,195,113,1)","rgba(146,194,79,1)","rgba(150,65,141,1)","rgba(221,168,255,1)","rgba(57,101,77,1)","rgba(253,216,185,1)","rgba(19,69,146,1)","rgba(168,130,136,1)","rgba(113,113,163,1)","rgba(67,221,37,1)","rgba(190,88,232,1)","rgba(214,218,33,1)","rgba(95,176,178,1)","rgba(95,49,34,1)","rgba(208,81,237,1)","rgba(237,65,96,1)","rgba(9,170,234,1)"], borderWidth: 1 }, ], }, options: {scales: {}, title: {display: true, text: 'Best Performance In All Quizzes'}, legend: {display: false } } }); 
	</script>; 
</body>
</html>