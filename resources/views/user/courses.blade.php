@extends('layouts.user')

@section('title', 'Course List')

@section('stylesheets')


@endsection


@section('content')

<div class="container-fluid">
	<!-- /.row -->
	<div class="panel panel-custom">
		<div class="panel-heading">
			<h3>Course List</h3>
		</div>
		<div class="panel-body packages">

			<div class="row library-items">

				@foreach($courses as $course)
					<div class="col-md-3">
						<div class="library-item mouseover-box-shadow">
							<a href="{{url('user/'.$course->slug.'/modules')}}">
								<div class="item-image">
									<img src="{{asset('uploads/course/'.$course->image)}}" alt="">
								</div>
								
								<div class="item-details">
									<h3>{{strtoupper($course->name)}}</h3>
									<ul>
										<li><i class="icon-bookmark"></i>{{$course->modules}} Modules</li>
										<li><i class="icon-eye"></i> View</li>
									</ul>

								</div>
							</a>
						</div>
					</div>

				@endforeach

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

@section('scripts')




@endsection