@extends('admin.layouts.apanel')

@section('title')

{{$globalvar['mainname']}}

@endsection

@section('header')

{{$globalvar['mainname'].' - '.$course->id}}

@endsection


@section('content')

	<div class="row">
	    <div class="col-md-8 col-lg-8 col-xl-8">
			<section class="panel">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="panel-actions">
							<a href="#" class="fa fa-caret-down"></a>
							<a href="#" class="fa fa-times"></a>
						</div>
	
						<h2 class="panel-title">{{$globalvar['mainname'].' - '.$course->id}}</h2>
					</div>
				</div>
				<div class="panel-body">
	                    
	                        <h4 >
						    	<table class="table table-hover table-bordered" >
	                                <tbody>
	                                	<?php $i=1; ?>
	                                	@foreach($dbresources as $resource => $value)

	                                		@if($resource != 'image')
			                                    <tr>
			                                        <td>{{$i}}</td>
			                                        <td>{{$value}}</td>
			                                        <td>
			                                        	{{ $course->$resource}}
			                                        </td>
			                                    </tr>
			                                @else
			                                	<tr>
			                                        <td>{{$i}}</td>
			                                        <td>{{$value}}</td>
			                                        <td>
			                                        	<img width="150" height="100" src="{{ url('/uploads/course') }}/{{$course->image}}">
			                                        </td>
			                                    </tr>
			                                @endif
			                                <?php $i++; ?>
	                                   	@endforeach
	                                </tbody>
	                             </table>
						    </h4>                    

	            </div>
			</section>
		</div>

        <div class="col-md-4 col-lg-4" >
        	<section class="panel">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="panel-actions">
							<a href="#" class="fa fa-caret-down"></a>
							<a href="#" class="fa fa-times"></a>
						</div>

						<h2 class="panel-title">STATUS</h2>
					</div>
				</div>
                
            	<div class="panel-body">
                    <div class="well">
	            		<p><b>URL:</b>
	            		<a target="_blank" style="word-wrap: break-word;" href="{{ url('/course') }}/{{ $course->slug }}">{{ url('/'.$globalvar['mainweb'].'/'.$course->slug) }}
	            		</a></p><br/>
	            		<p><b>Created at:</b>{{ date('M j, Y H:iA', strtotime($course->created_at)) }}</p><br/>
	            		<p><b>Updated at:</b>{{ date('M j, Y H:iA', strtotime($course->updated_at)) }}</p><br/>

	            	</div>

	            	<div>
	            	
	            		<a class="action" href="{{ route($globalvar['routeedit'], $course->id) }}">
	            			<button class="btn btn-primary btn-block"><i class="ti-pencil"></i> Edit</button>
	            		</a><br/>
	            		{!! Form::open(['route' => [$globalvar['routedestroy'], $course->id], 'method' =>'DELETE', 'style' => 'margin-top: -15px;']) !!}
		            			<button class="btn btn-danger btn-block"><i class="ti-close"></i> Delete</button>
	            		{!! Form::close() !!}<br/>
	            		<a class="action" href="{{ route($globalvar['routeindex']) }}">
	            			<button style="margin-top:-15px;" class="btn btn-default btn-block"><i class="ti-book"></i> See all {{$globalvar['mainname']}}s</button>
	            		</a>
	            	</div>                  

        		</div>
        </div>
	</div>

@endsection