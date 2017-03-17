@extends('admin.layouts.apanel')

@section('title',' Create New Post')

@section('header',' Create New Post')

@section('content')
    <div class="row">
                 <section class="panel">
					<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a>
					</div>
					<h2 class="panel-title">
						{{$globalvar['createpagetitle']}}
					</h2>

					</header>
					<div class="panel-body">
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
													{!! Form::textarea($formfield['name'], $formfield['value'], $formfield['options']) !!}
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

				</section>                     
		    
	</div>


@endsection

@section('scripts')

	<script type="text/javascript">
	
$(document).ready(function() {

		$("#course_id").change(function(){
			requestResource();
		});

		$("#course_id").click(function(){
			requestResource();
		});

		function requestResource() 
		{ 

			var token = $('input[name="_token"]').val();
			$.ajax({
				url: '{{ url('gtpadmin/posted/modulesbycourse') }}',
				type: 'PUT',
				data: "id=" + $("#course_id :selected").val() + "&_token=" + token, 
				success: function(result){
						$('#module_id').empty();
						var obj = JSON.parse(result);
						$.each(obj, function(key, value) {
						    $('#module_id').append($("<option/>", {
						        value: value.id,
						        text: value.name
						    }));
						});
    				}
			})
		}
});

</script>

@endsection
