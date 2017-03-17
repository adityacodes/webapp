@extends('layouts.user')

@section('title', 'Posts List')

@section('stylesheets')


@endsection


@section('content')

	<div class="panel panel-custom">
		@foreach($posts as $post)
			<div class="panel-heading">

				<h3>Question : {{$post->subject}}</h3>
			</div>

			<div class="panel-body">
				<h3>Answer: {{$post->body}}</h3>
				<p>
					
				</p>
			</div>
		@endforeach
		<div class="text-center">
			{{$posts->render()}}

		</div>

		

	</div>



@endsection

@section('scripts')




@endsection