@extends('admin.layouts.apanel')

@section('title', 'Admin Dashboard')

@section('header', 'Dashboard')

@section('content')

<div class="row">
		<div class="col-md-6 col-lg-12 col-xl-6">
			<div class="row">
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel panel-featured-left panel-featured-primary">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-primary">
										<i class="fa fa-life-ring"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Courses</h4>
										<div class="info">
											<strong class="amount">{{$gvariable['coursecount']}}</strong>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel panel-featured-left panel-featured-secondary">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-secondary">
										<i class="fa fa-usd"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Module Count</h4>
										<div class="info">
											<strong class="amount">{{$gvariable['modulescount']}}</strong>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel panel-featured-left panel-featured-tertiary">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-tertiary">
										<i class="fa fa-shopping-cart"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Post Count</h4>
										<div class="info">
											<strong class="amount">{{$gvariable['postcount']}}</strong>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel panel-featured-left panel-featured-quartenary">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-quartenary">
										<i class="fa fa-user"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Exam Count</h4>
										<div class="info">
											<strong class="amount">{{$gvariable['examcount']}}</strong>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				<div class="col-md-12 col-lg-6 col-xl-6">
					<section class="panel panel-featured-left panel-featured-quartenary">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div class="summary-icon bg-quartenary">
										<i class="fa fa-trash-o" aria-hidden="true"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Trash Count</h4>
										<div class="info">
											<strong class="amount">{{$gvariable['trashcount']}}</strong>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>


				
			</div>
		</div>
	</div>



@endsection