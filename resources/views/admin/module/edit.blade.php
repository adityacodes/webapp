@extends('admin.layouts.apanel')

@section('title','Edit Module')

@section('header','Edit Module')

@section('content')
<div class="row">
    <section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a>
					</div>
					<h2 class="panel-title">
						{{$globalvar['editpagetitle']}}
					</h2>

				</header>            
		    	<!-- Content goes here -->
		    	<div class="panel-body">
		    	<fieldset>
    					{!! Form::model($module, ['route' => [$globalvar['routeupdate'], $module->id], 'class' => 'form-horizontal', 'method' => 'PUT', 'data-parsley-validate' => '', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) !!}
    	
	    			<div class="col-md-8">
	        

			            <div class="content-box-header">
					        <div class="panel-title"><h3><b>{{$globalvar['editpagetitle']}}</b></h3></div>
					    </div>

			            <div class="content-box-large box-with-header">
			            	@foreach($formfields as $formfield)

					    					@if($formfield['type'] == 'text')

					    						<div class="form-group">
													<label class="col-md-3 control-label">{{$formfield['label']}} :</label>
													<div class="col-md-6">
														<div class="input-group input-group-icon">
															<span class="input-group-addon">
																<span class="icon"><i class="fa {{$formfield['icon']}}"></i></span>
															</span>
															{!! Form::text($formfield['name'], $formfield['value'], $formfield['options'] ) !!}

														</div>
													</div>
												</div>
					    					@endif

					    					@if($formfield['type'] == 'file')

					    							<div class="form-group">
														<label class="col-md-3 control-label">{{$formfield['label']}} :</label>
														<div class="col-md-6">
															<div class="fileupload fileupload-new" data-provides="fileupload"><input type="hidden" value="" name="">
																<div class="input-append">
																	<div class="uneditable-input">
																		<i class="fa fa-file fileupload-exists"></i>
																		<span class="fileupload-preview"></span>
																	</div>
																	<span class="btn btn-default btn-file">
																		<span class="fileupload-exists">Change</span>
																		<span class="fileupload-new">Select file</span>
																		{!! Form::file($formfield['name'], null, array('class' => 'form-control border-input', 'id' => $formfield['id'], 'required' => '' )) !!}
																	</span>
																	<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
																</div>
															</div>
														</div>
													</div>
											@endif

					    					@if($formfield['type'] == 'textarea')

					    						<div class="form-group">
													<label class="col-md-3 control-label">{{$formfield['label']}} :</label>
													<div class="col-md-6">
														<div class="input-group input-group-icon">
															{!! Form::textarea($formfield['name'], $formfield['value'], array('class' => 'form-control border-input textarea-wysihtml5', 'id' => $formfield['id'], 'style' => $formfield['style'] , 'placeholder' => $formfield['placeholder'], 'required' => '' )) !!}
															<span class="input-group-addon">
																<span class="icon"><i class="fa {{$formfield['icon']}}"></i></span>
															</span>
														</div>
													</div>
												</div>


					    					@endif


					    					@if($formfield['type'] == 'select')

					    						<div class="form-group">
														<label class="col-md-3 control-label" for="inputSuccess">{{$formfield['label']}} :</label>
														<div class="col-md-6">
															{!!	Form::select($formfield['name'], $formfield['coptions'], $formfield['value'], $formfield['options']) !!}
														</div>
												</div>

											@endif





					    			@endforeach
			            </div>
	    			</div>

	    			<div class="col-md-4">
	        
				            <div class="content-box-header">
						        <div class="panel-title"><h3><b>STATUS</b></h3></div>
						    </div>
			            	<div class="content-box-large box-with-header">

				            	<div class="well">
				            		<p><b>Created at :</b>{{ date('M j, Y H:ia', strtotime($module->created_at)) }}</p><br/>
				            		<p><b>Updated at :</b>{{ date('M j, Y H:ia', strtotime($module->updated_at)) }}</p><br/>

				            	</div>

				            	<div>
				            		{!! Html::linkRoute($globalvar['routeindex'], 'Cancel', array($module->id), array('class' =>'btn btn-primary btn-block')) !!}
				            		
					            	{!! Form::submit('Update', array('class' => 'btn btn-success btn-block', 'id' => 'submit'  ))  !!}
				            	</div>
	            			</div>
	        		</div>
	    
	    		</fieldset>
	    	</div>
	    {!! Form::close() !!}

	<div class="clearfix"></div>
</div>



@endsection

