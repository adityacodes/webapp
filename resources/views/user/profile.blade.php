@extends('layouts.user')

@section('title', 'My Profile')

@section('content')

<div class="container-fluid">
	<!-- /.row -->
	<div class="panel panel-custom">
		<div class="panel-heading">
			<h3>User Profile</h3>
		</div>
		<div class="panel-body">

			<div class="row">
				
				<div class="form-group input-group">
				    <span class="input-group-addon">@</span>
				    <input type="text" class="form-control" placeholder="Username">
				</div>
				

			</div>
		</div>
	</div>
</div>


@endsection