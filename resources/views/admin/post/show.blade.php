@extends('user')

@section('title','Post')

@section('content')

	<div class="row">
		    <div class="col-lg-12">
		    	<div class="col-md-8">
			    	<div class="card">

		                    <div class="header">
		                        <h4 class="title">TITLE :  {{strtoupper($post->title)}}</h4>
		                        <h4>POST DETAILS :</h4>
		                        <hr>
		                    </div>
		                    
		                    <div class="content" >
		                        <h4 >
							    	<table class="table table-hover table-bordered" >
		                                <tbody>
		                                    
		                                    <tr>
		                                        <td>1</td>
		                                        <td>Post Image</td>
		                                        <td><</td>
		                                        <td>
		                                        	<img width="150" height="100" src="{{ url('/uploads/post') }}/{{$post->image}}">
		                                        </td>
		                                    </tr>
		                                </tbody>
		                             </table>
							    </h4>

									    	<p>{{ $post->body}}</p>                     

		                        <div class="footer">
		                            <hr>
		                            <div class="stats">
		                                <i class="ti-timer"></i> Campaign sent 2 days ago
		                            </div>
		                        </div>
		                    </div>
		            </div>
	            </div>

	            <div class="col-md-4" >
	            	<div class="card">

	                    <div class="header">
	                        <h4 class="title">TITLE :  {{strtoupper($post->title)}}</h4>
	                        <h4>NOTICE TEXT :</h4>
	                        <hr>
	                    </div>
	                    
	                    <div class="content" >
	                        <div class="well">
			            		<p><b>URL:</b>
			            		<a target="_blank" style="word-wrap: break-word;" href="{{ url('/notice') }}/{{ $post->slug }}">{{ url('/notice/'.$post->slug) }}
			            		</a></p><br/>
			            		<p><b>Created at:</b>{{ date('M j, Y H:iA', strtotime($post->created_at)) }}</p><br/>
			            		<p><b>Updated at:</b>{{ date('M j, Y H:iA', strtotime($post->updated_at)) }}</p><br/>

			            	</div>

			            	<div>
			            	
			            		<a class="action" href="{{ route('admin.post.edit', $post->id) }}">
			            			<button class="btn btn-primary btn-block"><i class="ti-pencil"></i> Edit</button>
			            		</a><br/>
			            		{!! Form::open(['route' => ['admin.post.destroy', $post->id], 'method' =>'DELETE', 'style' => 'margin-top: -15px;']) !!}
				            			<button class="btn btn-danger btn-block"><i class="ti-close"></i> Delete</button>
			            		{!! Form::close() !!}<br/>
			            		<a class="action" href="{{ route('admin.post.index') }}">
			            			<button style="margin-top:-15px;" class="btn btn-default btn-block"><i class="ti-book"></i> See all Notices</button>
			            		</a>
			            	</div>                  

	                        <div class="footer">
	                            <hr>
	                            <div class="stats">
	                                <i class="ti-timer"></i> Campaign sent 2 days ago
	                            </div>
	                        </div>
	                    </div>
	            	</div>
	            </div>
			</div>
	</div>
@endsection