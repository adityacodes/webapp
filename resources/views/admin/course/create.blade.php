@extends('admin.layouts.apanel')

@section('title',' Create New course')

@section('header',' Create New course')

@section('content')
    <div class="row">
    	<div class="card">
                 
                <div class="content">
                <h4>
			    	{!! Form::open(array('route' => $globalvar['routestore'], 'class' => 'form-horizontal form-bordered', 'data-parsley-validate' => '', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off')) !!}

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

			                    <div class="form-group">
			                    	{!! Html::linkRoute($globalvar['routeindex'], 'Cancel', '', array('class' =>'btn pull-down btn-warning btn-lg col-lg-2 col-md-offset-2 text-center')) !!}
				                    {!! Form::submit('Create '.$globalvar['mainname'], array('class' => 'btn pull-down btn-success btn-lg col-lg-2 col-md-offset-3 col-xs-offset-3 text-center', 'id' => 'submit'  )) !!}
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
