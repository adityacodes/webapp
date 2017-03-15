@extends('user')

@section('title','Edit Post')

@section('content')
<div class="row">
    <div class="col-lg-12">
    	<div class="card">
		    <div class="header">
		    	<!-- Title here -->
		        <h4 class="title">Choose Notice :</h4>
		        <hr>
		    </div>          
		    <div class="content" >              
		    	<!-- Content goes here -->
		    	<fieldset>
    	{!! Form::model($post, ['route' => ['admin.post.update', $post->id], 'class' => 'form-horizontal', 'method' => 'PUT', 'data-parsley-validate' => '', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) !!}
    	
	    <div class="col-md-8">
	        

	            <div class="content-box-header">
			        <div class="panel-title"><h3><b>NOTICE BOARD</b></h3></div>
			    </div>

	            <div class="content-box-large box-with-header">
	            	<div class="form-group">
			    		<label class="col-md-2 control-label" for="title">Notice Title:</label>
			    		<div class="col-lg-10">
			    			{!! Form::text('title', null, array('class' => 'form-control border-input', 'id' => 'title', 'placeholder' => 'Enter title here', 'required' => '', 'maxlength' => '255' )) !!}
			    		</div>
			    	</div>
			    	<div class="form-group">
			    		<label class="col-lg-4 control-label" for="slugbacklog">http://cetbtnp.com/notice/</label>
			    		<div class="col-lg-4">
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
			    		<label class="col-lg-4 control-label" for="tyear">Tenth Year Must be > than:</label>
			    		<div class="col-lg-4">
			    			{!! Form::text('tenthyear', null, array('class' => 'form-control border-input', 'id' => 'tyear', 'placeholder' => 'Enter value here', 'required' => '','minlength'=>'4')) !!}
			    		</div>
			    	</div>
			    	<div class="form-group">
			    		<label class="col-lg-4 control-label" for="tpercent">Tenth Percentage Must be > than:</label>
			    		<div class="col-lg-4">
			    			{!! Form::text('tenthpercent', null, array('class' => 'form-control border-input', 'id' => 'tpercent', 'placeholder' => 'Enter tenth Percentage Requirement', 'required' => '' )) !!}
			    		</div>
			    	</div>
			    	<div class="form-group">
			    		<label class="col-lg-4 control-label" for="tboard">Tenth Board:</label>
			    		<div class="col-lg-4">
			    			{!! Form::text('tenthboard', null, array('class' => 'form-control border-input', 'id' => 'tboard', 'required' => '' )) !!}
			    		</div>
			    	</div>
			    	<div class="form-group">
			    		<label class="col-lg-4 control-label" for="twyeardpyear">Twelth Year Must be > than:</label>
			    		<div class="col-lg-4">
			    			{!! Form::text('twelthyear', null, array('class' => 'form-control border-input', 'id' => 'twyeardpyear', 'placeholder' => 'Enter Min Requirement of Twelth Pass Year ', 'required' => '','minlength'=>'4' )) !!}
			    		</div>
			    	</div>
			    	<div class="form-group">
			    		<label class="col-lg-4 control-label" for="twpercentage">Twelth Percentage Must be > than:</label>
			    		<div class="col-lg-4">
			    			{!! Form::text('twelthpercent', null, array('class' => 'form-control border-input', 'id' => 'twpercentage', 'placeholder' => 'Enter value here', 'required' => '' )) !!}
			    		</div>
			    	</div>
			    	<div class="form-group">
			    		<label class="col-lg-4 control-label" for="twboard">Twelth Board:</label>
			    		<div class="col-lg-4">
			    			{!! Form::text('twelthboard', null, array('class' => 'form-control border-input', 'id' => 'twboard' )) !!}
			    		</div>
			    	</div>
			    	<div class="form-group">
			    		<label class="col-lg-4 control-label" for="dpyear">Diploma Passing Year Must be > than:</label>
			    		<div class="col-lg-4">
			    			{!! Form::text('diplomayear', null, array('class' => 'form-control border-input', 'id' => 'dpyear', 'placeholder' => 'Enter value here', 'required' => '')) !!}
			    		</div>
			    	</div>
			    	<div class="form-group">
			    		<label class="col-lg-4 control-label" for="dpercentage">Diploma Percentage Must be > than:</label>
			    		<div class="col-lg-4">
			    			{!! Form::text('diplomapercent', null, array('class' => 'form-control border-input', 'id' => 'dpercentage', 'placeholder' => 'Enter value here', 'required' => '' )) !!}
			    		</div>
			    	</div>
			    	<div class="form-group">
			    		<label class="col-lg-4 control-label" for="dboard">Diploma Board:</label>
			    		<div class="col-lg-4">
			    			{!! Form::text('diplomaboard', null, array('class' => 'form-control border-input', 'id' => 'dboard' )) !!}
			    		</div>
			    	</div>
			    	<div class="form-group">
			    		<label class="col-lg-4 control-label" for="cgpa">CGPA:</label>
			    		<div class="col-lg-4">
			    			{!! Form::text('cgpa', null, array('class' => 'form-control border-input', 'id' => 'cgpa', 'placeholder' => 'Enter Min CGPA Requirement', 'required' => '' )) !!}
			    		</div>
			    	</div>
			    	<div class="form-group">
			    		<label class="col-lg-4 control-label" for="backlog">Active BackLog:</label>
			    		<div class="col-lg-4">
			    			{!! Form::text('backlog', null, array('class' => 'form-control border-input', 'id' => 'backlog', 'placeholder' => 'Enter value here', 'required' => '' )) !!}
			    		</div>
			    	</div>
			    	<div class="form-group">
                        <label class="col-lg-2 control-label" for="textarea-wysihtml5">Notice Text:</label>
                        <div class="col-lg-8">
                        	{!! Form::textarea('body', null, array('class' => 'form-control border-input textarea-wysihtml5', 'id' => 'body', 'style' => 'width: 100%; height: 200px' , 'placeholder' => 'Enter notice here', 'required' => '' )) !!}
                        </div>
                    </div>
	            </div>
	    </div>

	    <div class="col-md-4">
	        
	            <div class="content-box-header">
			        <div class="panel-title"><h3><b>STATUS</b></h3></div>
			    </div>
	            <div class="content-box-large box-with-header">

	            	<div class="well">
	            		<p><b>Created at :</b>{{ date('M j, Y H:ia', strtotime($post->created_at)) }}</p><br/>
	            		<p><b>Updated at :</b>{{ date('M j, Y H:ia', strtotime($post->updated_at)) }}</p><br/>

	            	</div>

	            	<div>
	            		{!! Html::linkRoute('admin.post.index', 'Cancel', array($post->id), array('class' =>'btn btn-primary btn-block')) !!}
	            		
		            	{!! Form::submit('Update', array('class' => 'btn btn-success btn-block', 'id' => 'submit'  ))  !!}
	            	</div>

	            </div>
	        
	    </div>
	    </fieldset>
	    {!! Form::close() !!}

				<div class="clearfix"></div>
		    </div>
		</div>
    

    </div>
</div>



@endsection

