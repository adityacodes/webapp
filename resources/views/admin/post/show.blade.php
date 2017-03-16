@extends('admin.layouts.apanel')

@section('title','Post')

@section('header')

{{strtoupper($post->title)}}

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
	
						<h2 class="panel-title">{{strtoupper($post->title)}}</h2>
					</div>
				</div>
				<div class="panel-body">
	                    
	                        <h4 >
						    	<table class="table table-hover table-bordered" >
	                                <tbody>

	                                    <tr>
	                                        <td>1</td>
	                                        <td>Post ID</td>
	                                        <td>
	                                        	{{ $post->id}}
	                                        </td>
	                                    </tr>
	                                    
	                                    <tr>
	                                        <td>1</td>
	                                        <td>Post Image</td>
	                                        <td>
	                                        	<img width="150" height="100" src="{{ url('/uploads/post') }}/{{$post->image}}">
	                                        </td>
	                                    </tr>

	                                    <tr>
	                                        <td>2</td>
	                                        <td>Question</td>
	                                        <td>
	                                        	{{ $post->body}}
	                                        </td>
	                                    </tr>

	                                    <tr>
	                                        <td>3</td>
	                                        <td>Answer</td>
	                                        <td>
	                                        	{{ $post->body}}
	                                        </td>
	                                    </tr>
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

						<h2 class="panel-title">{{strtoupper($post->title)}}</h2>
					</div>
				</div>
                
            	<div class="panel-body">
                    <div class="well">
	            		<p><b>URL:</b>
	            		<a target="_blank" style="word-wrap: break-word;" href="{{ url('/post') }}/{{ $post->slug }}">{{ url('/post/'.$post->slug) }}
	            		</a></p><br/>
	            		<p><b>Created at:</b>{{ date('M j, Y H:iA', strtotime($post->created_at)) }}</p><br/>
	            		<p><b>Updated at:</b>{{ date('M j, Y H:iA', strtotime($post->updated_at)) }}</p><br/>

	            	</div>

	            	<div>
	            	
	            		<a class="action" href="{{ route('gtpadmin.post.edit', $post->id) }}">
	            			<button class="btn btn-primary btn-block"><i class="ti-pencil"></i> Edit</button>
	            		</a><br/>
	            		{!! Form::open(['route' => ['gtpadmin.post.destroy', $post->id], 'method' =>'DELETE', 'style' => 'margin-top: -15px;']) !!}
		            			<button class="btn btn-danger btn-block"><i class="ti-close"></i> Delete</button>
	            		{!! Form::close() !!}<br/>
	            		<a class="action" href="{{ route('gtpadmin.post.index') }}">
	            			<button style="margin-top:-15px;" class="btn btn-default btn-block"><i class="ti-book"></i> See all Posts</button>
	            		</a>
	            	</div>                  

        		</div>
        </div>
	</div>

@endsection