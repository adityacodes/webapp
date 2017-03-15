@extends('layouts.admin')

@section('title','Notice')

@section('content')

	<div class="row">
        <div class="card">
		    <div class="col-lg-12">
		    	<div class="col-md-8">
			    	<div class="card">

		                    <div class="header">
		                        <h3 class="title"><strong>Notification Details</strong></h3>
		                        <hr>
		                    </div>
		                    
		                    <div class="content" >
		                    	<h4>
			                    	<table class="table table-hover table-bordered" >
		                                <tbody>
		                                	<tr>
		                                		<th>Sl. No.</th>
		                                		<th>Table Attributes</th>
		                                		<th colspan="2">Table Values</th>	
		                                	</tr>
		                                    <tr>
		                                        <td>1</td>
		                                        <td>Subject: </td>
		                                        <td colspan="2">{{ $notifications->subject }}</td>
		                                    </tr>
		                                    <tr>
		                                        <td>2</td>
		                                        <td>Message: </td>
		                                        <td colspan="2">{{ $notifications->message }}</td>
		                                    </tr>
						                </tbody>
						            </table>	
								</h4>                     

		                        <div class="footer">
		                            <hr>
		                            <div class="stats">
		                                <i class="ti-timer"></i> Notice will be shown in main page after this.
		                            </div>
		                        </div>
		                    </div>
		            </div>
	            </div>

	            <div class="col-md-4" >
	            	<div class="card">

	                    <div class="header">
	                        <h4 class="title">{{ucwords(strtolower('TITLE :'))}} {{strtoupper($notifications->notice_subject)}}</h4>
	                        <h4>{{ucwords(strtolower('NOTICE CHANGES :'))}}</h4>
	                        <hr>
	                    </div>
	                    
	                    <div class="content" >
	                        <div class="well">
			            		<p>
			            			<b>Created at:</b>
			            			{{ date('M j, Y H:iA', strtotime($notifications->created_at)) }}
			            		</p>
			            			<br/>
			            		<p>
			            			<b>Updated at:</b>
			            				{{ date('M j, Y H:iA', strtotime($notifications->updated_at)) }}
			            		</p><br/>

			            	</div>

			            	<div>
			            	
			            		<a class="action" href="{{ route('admin.notifications.edit', $notifications->id) }}">
			            			<button class="btn btn-primary btn-block"><i class="ti-pencil"></i> Edit</button>
			            		</a><br/>
			            		{!! Form::open(['route' => ['admin.notifications.destroy', $notifications->id], 'method' =>'DELETE', 'style' => 'margin-top: -15px;']) !!}
				            			<button class="btn btn-danger btn-block"><i class="ti-close"></i> Delete</button>
			            		{!! Form::close() !!}<br/>
			            		<a class="action" href="{{ route('admin.notifications.index') }}">
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
	</div>
@endsection