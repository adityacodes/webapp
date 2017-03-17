<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">

		<title>@yield('title') | GTP-Admin</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/magnific-popup/magnific-popup.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/pnotify/pnotify.custom.css')}}" />


		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="{{asset('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" />
		<link rel="stylesheet" href="{{asset('assets/vendor/morris/morris.css')}}" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{asset('assets/stylesheets/theme.css')}}" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{asset('assets/stylesheets/skins/default.css')}}" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{asset('assets/stylesheets/theme-custom.css')}}">

		<!-- Head Libs -->
		<script src="{{asset('assets/vendor/modernizr/modernizr.js')}}"></script>

		@yield('stylesheets')

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="../" class="logo">
						{{-- <img src="{{asset('assets/images/logo.png')}}" height="35" alt="Porto Admin" /> --}}
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<form action="pages-search-results.html" class="search nav-form">
						<div class="input-group input-search">
							<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form>
			
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<i class="fa fa-user fa-2x"></i>
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name">{{Auth::guard('admin')->user()->name}}</span>
								<span class="role">administrator</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="{{url('gtpadmin/profile')}}"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="{{url('gtpadmin/logout')}}"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li class="{{Request::is('gtpadmin/dashboard') ? 'nav-active':''}}">
										<a href="{{url('/gtpadmin/dashboard')}}">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>

									<li class="{{Request::is('gtpadmin/course') ||
											Request::is('gtpadmin/course/*') ? 'nav-active':''}}">
												<a href="{{url('/gtpadmin/course')}}">
													 <i class="fa fa-cubes" aria-hidden="true"></i>
													 <span>Courses</span>
												</a>
									</li>

									<li class="{{Request::is('gtpadmin/module') || Request::is('gtpadmin/module/*') ? 'nav-active':''}}">

										<a href="{{url('/gtpadmin/module')}}">
											<i class="fa fa-list-alt" aria-hidden="true"></i>
											 <span>Modules</span>
										</a>
									</li>
									<li class="{{Request::is('gtpadmin/post') ||
												Request::is('gtpadmin/post/*') ? 'nav-active':''}}">
										
										<a href="{{url('/gtpadmin/post')}}">
											<i class="fa fa-list" aria-hidden="true"></i>
											 <span>Post</span>
										</a>
									</li>
									<li class="{{Request::is('gtpadmin/trash') ||
												Request::is('gtpadmin/trash/*') ? 'nav-active':''}}">
										
										<a href="{{url('/gtpadmin/trash')}}">
											<i class="fa  fa-trash-o" aria-hidden="true"></i>
											 <span>Trash</span>
										</a>
									</li>

									


								</ul>
							</nav>
				
							<hr class="separator" />
						</div>
				
					</div>
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>@yield('header')</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="{{url('gtpadmin/dashboard')}}">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>@yield('header')</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					@yield('content')
				</section>
			</div>

			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close visible-xs">
							Collapse <i class="fa fa-chevron-right"></i>
						</a>
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<h6>Date</h6>
								<div data-plugin-datepicker  data-date-start-date="2017.03.17" data-plugin-skin="dark" ></div>
		
							</div>
			
						</div>
					</div>
				</div>
			</aside>
		</section>

		<!-- Vendor -->
		<script src="{{asset('assets/vendor/jquery/jquery.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
		<script src="{{asset('assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
		<script src="{{asset('assets/vendor/magnific-popup/magnific-popup.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
		
		<!-- Specific Page Vendor -->
		<script src="{{asset('assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-appear/jquery.appear.js')}}"></script>

		<script src="{{asset('assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="{{asset('assets/javascripts/theme.js')}}"></script>
		
		<!-- Theme Custom -->
		<script src="{{asset('assets/javascripts/theme.custom.js')}}"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{asset('assets/javascripts/theme.init.js')}}"></script>


		<!-- Examples -->
		{{-- <script src="{{asset('assets/javascripts/dashboard/examples.dashboard.js')}}"></script> --}}

		<script src="{{asset('assets/vendor/pnotify/pnotify.custom.js')}}"></script>

		<script>
		@if(Session::has('success'))

			new PNotify({
				title: 'Success',
				text: '{{Session::get('success')}}',
				type: 'success',
				shadow: true
			});

		@endif
		@if(Session::has('warning'))
			new PNotify({
				title: 'Warning',
				text: '{{Session::get('warning')}}',
				type: 'warning',
				shadow: true
			});
		@endif

		@if(count($errors) > 0)
				  @foreach($errors->all() as $error)
				  	new PNotify({
						title: 'Error',
						text: '{{ $error }}',
						type: 'error',
						shadow: true
					});
				  @endforeach
		@endif
		</script>

		@yield('scripts')
	</body>
</html>