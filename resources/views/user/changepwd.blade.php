@extends('layouts.user')

@section('title', 'Settings')

@section('content')


<div class="container-fluid">
	<!-- /.row -->
	<div class="panel panel-custom">
		<div class="panel-heading">
			<h3>User Settings</h3>
		</div>
		<div class="panel-body">

				<div class="row">
					<div class="col-lg-6 col-lg-offset-2">
					
						<div class="form-group input-group">
						    <span class="input-group-addon"><i class="fa fa-key" ></i></span>
						    <input type="text" class="form-control" placeholder="Old Password">
						</div>

						<div class="form-group input-group">
						    <span class="input-group-addon"><i class="fa fa-key" ></i></span>
						    <input type="text" class="form-control" placeholder="New Password">
						</div>

						<div class="form-group input-group">
						    <span class="input-group-addon"><i class="fa fa-key" ></i></span>
						    <input type="text" class="form-control" placeholder="Confirm Password">
						</div>
						<div class="form-group text-center">
							<button type="button" onclick="toDashboard()" class="btn button btn-warning btn-lg">Cancel</button>
							<button type="submit" id="submit_button" class="btn button btn-success btn-lg">Change Password</button>
						</div>

				</div>
				

			</div>
		</div>
	</div>
</div>






@endsection

@section('scripts')

<script type="text/javascript">
	function toDashboard()
	{
		window.location.assign('/user/dashboard')
	}
</script>



@endsection