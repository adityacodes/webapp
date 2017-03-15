@extends('layouts.user')

@section('title', 'Messages')

@section('content')


<div class="container-fluid">
	<!-- /.row -->
	<div class="panel panel-custom">
		<div class="panel-heading">
			<h3>CHAT WITH OUR CYBER SECURITY EXPERTS</h3>
		</div>
		<div class="panel-body packages">

			<div class="row library-items">
				<div class="col-lg-3 col-sm-6 text-center">
					<div class="library-item mouseover-box-shadow">
						<a href="#/exams/student/exams/sbi">
							<div class="item-image">
								<div class="label-danger  label-band">Free</div>
								<img class="img-circle" src="{{asset('/profile.jpg')}}" alt="">
							</div>
							<div class="item-details">
								<h3>EXPERT 1</h3>
								<ul>
									<li><i class="icon-bookmark"></i>Experience</li>
									<li><i class="icon-eye"></i> View</li>
								</ul>

							</div>
						</a>
					</div>
				</div>

				{{-- <div class="col-md-3">
					<div class="library-item mouseover-box-shadow">
						<a href="#/exams/student/exams/sbi">
							<div class="item-image">
								<img src="#/uploads/exams/categories/1-catimage.png" alt="">
							</div>
							<div class="item-details">
								<h3>SBI</h3>
								<ul>
									<li><i class="icon-bookmark"></i> 4 Quizzes</li>
									<li><i class="icon-eye"></i> View</li>
								</ul>

							</div>
						</a>
					</div>
				</div> --}}


			</div>
			{{-- Pagination Here --}}
		</div>
	</div>
</div>




@endsection