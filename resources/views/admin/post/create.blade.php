@extends('user')

@section('title',' Create New Post')

@section('content')
    <div class="row">
    	<div class="card">
    		<div class="header">
                <div class="icon-big icon-success col-md-1 col-xs-3">
                        <i class="ti-pencil"></i>
                           
                </div>
                <h4 class="title" style="font-weight: bold;">CREATE NEW POST</h4>
                <p class="category">Items marked <sup class="required">*</sup> are required.</p>
            </div>
                 
                <div class="content">
                <h4>
			    	{!! Form::open(array('route' => 'admin.post.store', 'class' => 'form-horizontal', 'data-parsley-validate' => '', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off')) !!}
			                    <div class="form-group">
			                    	<div class="col-md-3">
						    			<label class="control-label pull-right" for="title">Notice Title:</label>
						    		</div>
						    		<div class="col-md-6">
						    			{!! Form::text('title', null, array('class' => 'form-control border-input', 'id' => 'title', 'placeholder' => 'Enter title here','maxlength' => '255' )) !!}
						    		</div>
						    	</div>
						    	<div class="form-group">
						    		<label class="col-lg-3 control-label" for="slugbacklog">http://cetbtnp.com/notice/</label>
						    		<div class="col-lg-3">
						    			{!! Form::text('slug', null, array('class' => 'form-control border-input', 'id' => 'slugbacklog', 'placeholder' => 'Enter slug here', 'required' => '','minlength'=>'5','maxlength' => '255' )) !!}
						    		</div>
						    	</div>

						    	<div class="form-group">
						    		<label class="col-lg-3 control-label" for="post_image">Notice Image :</label>
						    		<div class="col-lg-3">
						    			{!! Form::file('post_image', null, array('class' => 'form-control border-input', 'id' => 'post_image', 'placeholder' => 'Enter notice image here', 'required' => '' )) !!}
						    		</div>
						    	</div>

						    	<div class="form-group">
						    		<label class="col-lg-3 control-label" for="tyear">Tenth Year Must be > than:</label>
						    		<div class="col-lg-4">
						    			{!! Form::text('tenthyear', null, array('class' => 'form-control border-input', 'id' => 'tyear', 'placeholder' => 'Enter value here', 'required' => '','minlength'=>'4')) !!}
						    		</div>
						    	</div>
						    	<div class="form-group">
						    		<label class="col-lg-3 control-label" for="tpercent">Tenth Percentage Must be > than:</label>
						    		<div class="col-lg-4">
						    			{!! Form::text('tenthpercent', null, array('class' => 'form-control border-input', 'id' => 'tpercent', 'placeholder' => 'Enter tenth Percentage Requirement', 'required' => '' )) !!}
						    		</div>
						    	</div>
						    	<div class="form-group">
						    		<label class="col-lg-3 control-label" for="tboard">Tenth Board:</label>
						    		<div class="col-lg-4">
						    			{!! Form::text('tenthboard', null, array('class' => 'form-control border-input', 'id' => 'tboard', 'required' => '' )) !!}
						    		</div>
						    	</div>
						    	<div class="form-group">
						    		<label class="col-lg-3 control-label" for="twyeardpyear">Twelth Year Must be > than:</label>
						    		<div class="col-lg-4">
						    			{!! Form::text('twelthyear', null, array('class' => 'form-control border-input', 'id' => 'twyeardpyear', 'placeholder' => 'Enter Min Requirement of Twelth Pass Year ', 'required' => '','minlength'=>'4' )) !!}
						    		</div>
						    	</div>
						    	<div class="form-group">
						    		<label class="col-lg-3 control-label" for="twpercentage">Twelth Percentage Must be > than:</label>
						    		<div class="col-lg-4">
						    			{!! Form::text('twelthpercent', null, array('class' => 'form-control border-input', 'id' => 'twpercentage', 'placeholder' => 'Enter value here', 'required' => '' )) !!}
						    		</div>
						    	</div>
						    	<div class="form-group">
						    		<label class="col-lg-3 control-label" for="twboard">Twelth Board:</label>
						    		<div class="col-lg-4">
						    			{!! Form::text('twelthboard', null, array('class' => 'form-control border-input', 'id' => 'twboard' )) !!}
						    		</div>
						    	</div>
						    	<div class="form-group">
						    		<label class="col-lg-3 control-label" for="dpyear">Diploma Passing Year Must be > than:</label>
						    		<div class="col-lg-4">
						    			{!! Form::text('diplomayear', null, array('class' => 'form-control border-input', 'id' => 'dpyear', 'placeholder' => 'Enter value here', 'required' => '' )) !!}
						    		</div>
						    	</div>
						    	<div class="form-group">
						    		<label class="col-lg-3 control-label" for="dpercentage">Diploma Percentage Must be > than:</label>
						    		<div class="col-lg-4">
						    			{!! Form::text('diplomapercent', null, array('class' => 'form-control border-input', 'id' => 'dpercentage', 'placeholder' => 'Enter value here', 'required' => '' )) !!}
						    		</div>
						    	</div>
						    	<div class="form-group">
						    		<label class="col-lg-3 control-label" for="dboard">Diploma Board:</label>
						    		<div class="col-lg-4">
						    			{!! Form::text('diplomaboard', null, array('class' => 'form-control border-input', 'id' => 'dboard' )) !!}
						    		</div>
						    	</div>
						    	<div class="form-group">
						    		<label class="col-lg-3 control-label" for="cgpa">CGPA:</label>
						    		<div class="col-lg-4">
						    			{!! Form::text('cgpa', null, array('class' => 'form-control border-input', 'id' => 'cgpa', 'placeholder' => 'Enter Min CGPA Requirement', 'required' => '' )) !!}
						    		</div>
						    	</div>
						    	<div class="form-group">
						    		<label class="col-lg-3 control-label" for="backlog">Active BackLog:</label>
						    		<div class="col-lg-4">
						    			{!! Form::text('backlog', null, array('class' => 'form-control border-input', 'id' => 'backlog', 'placeholder' => 'Enter value here', 'required' => '' )) !!}
						    		</div>
						    	</div>

						    	<div class="form-group">
			                        <label class="col-lg-2 control-label" for="textarea-wysihtml5">Notice Text:</label>
			                        <div class="col-lg-8 col-xs-8">
			                        	{!! Form::textarea('body', null, array('class' => 'form-control border-input textarea-wysihtml5', 'id' => 'body', 'style' => 'width: 100%; height: 200px' , 'placeholder' => 'Enter notice here', 'required' => '' )) !!}
			                        </div>
			                    </div>
			                    <div class="form-group">
				                    {!! Form::submit('Create Post', array('class' => 'btn pull-down btn-success btn-lg col-lg-8 col-md-offset-2 col-xs-offset-3 text-center', 'id' => 'submit'  )) !!}
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
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>
@endsection
