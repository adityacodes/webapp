@extends('layouts.auth')


@section('title', '404 Not Found')

@section('stylesheets')


<style type="text/css">
	.error-block{ text-align:center;}
.error-block h1{ font-size:100px; color:#00aeaf; margin-bottom:60px;}
.error-block h2{font-size:24px;}
.error-block h2 i{color:#fd2929; margin-right:7px;}
</style>


@endsection

@section('content')

<div class="login-content">

<div class="error-block">
	
		<h1 style="color:red; font-size:180px;"><i class="fa fa-warning"></i></h1>
		<h1 >404</h1>

		<h2>oooopppss! page was not found, Sorry! it looks like that page has gone missing.</h2>
</div>




</div>
	




@endsection