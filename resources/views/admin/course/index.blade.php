@extends('admin.layouts.apanel')

@section('title',' All Courses')

@section('header',' All Courses')

@section('content')

<div class="row">

			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a>
					</div>
	
					<h2 class="panel-title">

						{{$globalvar['indexpagetitle']}}

						<a href="{{ route($globalvar['routecreate']) }}" class="btn btn-success col-md-offset-9">
							<i class="glyphicon glyphicon-plus"></i> NEW COURSE
						</a>
			            <div >
			            	<b>{{$globalvar['totalitems']}} : </b> 
			            	<span class="badge label-success">{{$courses->total()}}</span>
			            </div>
					</h2>
				</header>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover mb-none">
							<thead>
								<tr>
									@foreach($indexcolumns as $indexcolumn)
										<th>{{$indexcolumn}}</th>
									@endforeach
								</tr>
							</thead>
							<tbody>
		                    	@foreach ($courses as $course)
			                        <tr style="font-size: 18px;">
				                            <td>{{ $course->id }}</td>
				                            <td>{{ $course->course_id }}</td>
				                            <td>{{ $course->name }}</td>
				                            <td>{{ $course->slug }}</td>
				                            <td>{{ $course->modules }}</td>
				                            <td>{{ date('M j, Y H:i:s', strtotime($course->created_at)) }}</td>
			                            <td class="actions">
			                                <a href="{{ route($globalvar['routeshow'], $course->id)}}">
			                                    <button class="btn btn-md btn-primary">
			                                        <i class="fa fa-eye" aria-hidden="true"></i>
			                                        View
			                                    </button>
			                                </a>
			                                <a href="{{ route($globalvar['routeedit'], $course->id) }}">
			                                    <button class="btn btn-md btn-warning">
			                                        <i class="fa fa-pencil"></i>
			                                        Edit
			                                    </button>
			                                </a>
			                            @if($course->published == 0)
			                                
			                                	<a onclick="return confirm('Are you sure you want to publish this notice {{$course->title }}?');" href="{{ route($globalvar['routepublish'], $course->id)}}">
												    <button class="btn btn-md btn-success">
				                                        <i class="fa  fa-bolt"></i>
				                                        Publish
				                                    </button>
												</a>
			                                
			                            @else
			                                <a onclick="return confirm('Are you sure you want to unpublish this notice {{$course->title }}?');" href="{{ route($globalvar['routeunpublish'], $course->id)}}">
			                                    <button class="btn btn-md btn-warning">
			                                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
			                                        UnPublish
			                                    </button>
				                            </a>
			                            @endif
			                            </td>
			                        </tr>
			                    @endforeach
							</tbody>
						</table>
						<div class="text-center">
		                	{!! $courses->render() !!}
		                </div>
					</div>
				</div>
			</section>

	</div>    

@endsection
