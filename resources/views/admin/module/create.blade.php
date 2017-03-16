@extends('admin.layouts.apanel')

@section('title',' Create New Module')

@section('header',' Create New Module')

@section('content')
    <div class="row">
    	<div class="card">
                 
                <div class="content">
                <h4>
			    	{!! Form::open(array('route' => $globalvar['routestore'], 'class' => 'form-horizontal form-bordered', 'data-parsley-validate' => '', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off')) !!}

			    				<div class="form-group">
									<label class="col-md-3 control-label">{{$globalvar['mainname']}} Title:</label>
									<div class="col-md-6">
										<div class="input-group input-group-icon">
											<span class="input-group-addon">
												<span class="icon"><i class="fa fa-user"></i></span>
											</span>
											{!! Form::text('title', null, array('class' => 'form-control border-input', 'id' => 'title', 'placeholder' => 'Enter title here','maxlength' => '255' )) !!}
											<input type="{{$globalvar['type']}}" class="form-control border-input" id="title" name="title" placeholder="Enter title here." maxlength="" minlength="" >
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Slug:</label>
									<div class="col-md-6">
										<div class="input-group input-group-icon">
											<span class="input-group-addon">
												<span class="icon"><i class="fa fa-user"></i></span>
											</span>
											{!! Form::text('slug', null, array('class' => 'form-control border-input', 'id' => 'slugbacklog', 'placeholder' => 'Enter slug here', 'required' => '','minlength'=>'5','maxlength' => '255' )) !!}
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">{{$globalvar['mainname']}} Image:</label>
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
													{!! Form::file('image', null, array('class' => 'form-control border-input', 'id' => 'image', 'placeholder' => 'Enter notice image here', 'required' => '' )) !!}
												</span>
												<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Question:</label>
									<div class="col-md-6">
										<div class="input-group input-group-icon">
											{!! Form::textarea('subject', null, array('class' => 'form-control border-input textarea-wysihtml5', 'id' => 'subject', 'style' => 'width: 100%; height: 100px' , 'placeholder' => 'Enter question here.', 'required' => '' )) !!}
											<span class="input-group-addon">
												<span class="icon"><i class="fa fa-user"></i></span>
											</span>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Answer:</label>
									<div class="col-md-6">
										<div class="input-group input-group-icon">
											{!! Form::textarea('body', null, array('class' => 'form-control border-input textarea-wysihtml5', 'id' => 'body', 'style' => 'width: 100%; height: 200px' , 'placeholder' => 'Enter answer here.', 'required' => '' )) !!}
											<span class="input-group-addon">
												<span class="icon"><i class="fa fa-user"></i></span>
											</span>
										</div>
									</div>
								</div>

						    	<div class="form-group">
			                        <label class="col-lg-3 control-label" for="textarea-wysihtml5"></label>
			                        <div class="col-lg-3 col-xs-8">
			                        	
			                        </div>
			                    </div>
			                    <div class="form-group">
			                    	{!! Html::linkRoute($globalvar['routeindex'], 'Cancel', '', array('class' =>'btn pull-down btn-warning btn-lg col-lg-2 col-md-offset-2 text-center')) !!}
				                    {!! Form::submit('Create'.$globalvar['mainname'], array('class' => 'btn pull-down btn-success btn-lg col-lg-2 col-md-offset-3 col-xs-offset-3 text-center', 'id' => 'submit'  )) !!}
				                </div>
					{!! Form::close() !!}
					</h4>
		    	</div>                     
		    
		    <div class="footer"></div>
        </div>
	</div>


@endsection

@section('scripts')

	<!--  Checkbox, Radio & Switch Plugins -->
	{{-- <script src="assets/js/bootstrap-checkbox-radio.js"></script> --}}
@endsection
