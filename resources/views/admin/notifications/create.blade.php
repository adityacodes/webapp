 @extends('layouts.admin')

@section('title',' Create New notifications')

@section('content')
    <div class="row">
        <div class="card">

                <div class="col-lg-12">
               		 <div class="card tab-content">  
			    		<div class="header">
			                <div class="icon-big icon-success col-md-1 col-xs-3">
			                        <i class="ti-pencil"></i>
			                           
			                </div>
			                <h4 class="title" style="font-weight: bold;">CREATE NEW notifications
								<button type="button" class="btn btn-primary pull-right" onclick="window.location='{{ route("admin.notifications.index") }}'">Cancel</button>
			                </h4>
			                <p class="category">Items marked <sup class="required">*</sup> are required.</p>
			            </div>
                 
		                <div class="content">
		                	<h4>
					    	{!! Form::open(array('route' => 'admin.notifications.store', 'class' => 'form-horizontal', 'data-parsley-validate' => '', 'autocomplete' => 'off')) !!}
					                    <div class="form-group">
								    		<label class="col-lg-4 control-label" for="NEW_subject">NEW Subject : <sup class="required">*</sup></label>
								    		<div class="col-lg-4">

	                                            <div class="input-group border-input">                           
	                                                <span class="input-group-addon">
	                                                    <i class="ti-comment-alt"></i>
	                                                </span>
								    				{!! Form::text('subject', null, array('class' => 'form-control border-input', 'id' => 'NEW_subject', 'placeholder' => 'Enter NEW subject here', 'required' => '','minlength'=>'5','maxlength' => '255' )) !!}
								    			</div>
								    		</div>
								    	</div>

						            	<div class="form-group">
								    		<label class="col-lg-4 control-label" for="NEW_message">NEW Message :<sup class="required">*</sup></label>
								    		<div class="col-lg-4">

	                                            <div class="input-group border-input">                           
	                                                <span class="input-group-addon">
	                                                    <i class="ti-comment-alt"></i>
	                                                </span>
								    				{!! Form::textarea('message', null, array('class' => 'form-control border-input', 'id' => 'title', 'placeholder' => 'Enter NEW message here here', 'required' => '')) !!}
								    			</div>
								    		</div>
								    	</div>
					                    <div class="form-group">
						                    {!! Form::submit('Create notifications', array('class' => 'btn pull-down btn-success btn-lg col-lg-8 col-md-offset-2 col-xs-offset-3 text-center', 'id' => 'submit'  )) !!}
						                </div>
							{!! Form::close() !!}
							</h4>
				    	</div>
				    </div>
				</div>                     
        </div>
	</div>


@endsection
