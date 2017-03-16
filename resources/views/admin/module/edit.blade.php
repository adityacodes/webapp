@extends('admin.layouts.apanel')

@section('title','Edit module')

@section('header','Edit module')

@section('content')
<div class="row">
    <div class="col-lg-12">
    	<div class="card">          
		    <div class="content" >              
		    	<!-- Content goes here -->
		    	<fieldset>
    	{!! Form::model($module, ['route' => [$globalvar['routeupdate'], $module->id], 'class' => 'form-horizontal', 'method' => 'PUT', 'data-parsley-validate' => '', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) !!}
    	
	    <div class="col-md-8">
	        

	            <div class="content-box-header">
			        <div class="panel-title"><h3><b>{{$globalvar['editpagetitle']}}</b></h3></div>
			    </div>

	            <div class="content-box-large box-with-header">
	            	<div class="form-group">
			    		<label class="col-md-2 control-label" for="title">module Title:</label>
			    		<div class="col-lg-10">
			    			{!! Form::text('title', null, array('class' => 'form-control border-input', 'id' => 'title', 'placeholder' => 'Enter title here', 'required' => '', 'maxlength' => '255' )) !!}
			    		</div>
			    	</div>
			    	<div class="form-group">
			    		<label class="col-md-2 control-label" for="title">module Subject:</label>
			    		<div class="col-lg-10">
			    			{!! Form::text('subject', null, array('class' => 'form-control border-input', 'id' => 'title', 'placeholder' => 'Enter subject here', 'required' => '', 'maxlength' => '255' )) !!}
			    		</div>
			    	</div>
			    	<div class="form-group">
			    		<label class="col-lg-4 control-label" for="slugbacklog">Slug</label>
			    		<div class="col-lg-4">
			    			{!! Form::text('slug', null, array('class' => 'form-control border-input', 'id' => 'slugbacklog', 'placeholder' => 'Enter slug here', 'required' => '','minlength'=>'5','maxlength' => '255' )) !!}
			    		</div>
			    	</div>
			    	<div class="form-group">
			    		<label class="col-lg-3 control-label" for="image">module Image :</label>
			    		<div class="col-lg-3">
			    			{!! Form::file('image', null, array('class' => 'form-control border-input', 'id' => 'image', 'placeholder' => 'Enter notice image here', 'required' => '' )) !!}
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
	    {!! Form::close() !!}

				<div class="clearfix"></div>
		    </div>
		</div>
    

    </div>
</div>



@endsection

