@extends('admin.layouts.apanel')

@section('title',' All Posts')

@section('header',' All Posts')

@section('content')

<div class="row">

			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a>
					</div>
	
					<h2 class="panel-title">All Posts
					<a href="{{ route($globalvar['routecreate']) }}" class="btn btn-success col-md-offset-9"><i class="glyphicon glyphicon-plus"></i> NEW POST</a>
		            <div ><b>Total Posts:</b><span class="badge label-success">{{$posts->total()}}</span></div>
					</h2>
				</header>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover mb-none">
							<thead>
								<tr>
									<th>#</th>
		                            <th>Title</th>
		                            <th>Question</th>
		                            <th>Answer</th>
		                            <th>Created At</th>
		                            <th>Actions</th>
								</tr>
							</thead>
							<tbody>
		                    	@foreach ($posts as $post)
			                        <tr>
			                            <td>{{ $post->id }}</td>
			                            <td>{{ substr($post->title,0,20) }}</td>
			                            <td>{{ substr($post->subject,0,20) }}</td>
			                            <td>{{ substr($post->body,0,40) }}{{ strlen($post->body) > 40 ? "..." : ""}}</td>
			                            <td>{{ date('M j, Y H:i:s', strtotime($post->created_at)) }}</td>
			                            <td class="actions">
			                                <a href="{{ route($globalvar['routeedit'], $post->id)}}">
			                                    <button class="btn btn-md btn-primary">
			                                        <i class="ti-eye" aria-hidden="true"></i>
			                                        View
			                                    </button>
			                                </a>
			                                <a href="{{ route($globalvar['routeedit'], $post->id) }}">
			                                    <button class="btn btn-md btn-warning">
			                                        <i class="ti-pencil"></i>
			                                        Edit
			                                    </button>
			                                </a>
			                            @if($post->published == 0)
			                                
			                                	<a onclick="return confirm('Are you sure you want to publish this notice {{$post->title }}?');" href="{{ route($globalvar['routeunpublish'], $post->id)}}">
												    <button class="btn btn-sm btn-success">
				                                        <i class="ti-thumb-up"></i>
				                                        Publish
				                                    </button>
												</a>
			                                
			                            @else
			                                <a onclick="return confirm('Are you sure you want to unpublish this notice {{$post->title }}?');" href="{{ route($globalvar['routeunpublish'], $post->id)}}">
			                                    <button class="btn btn-warning">
			                                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
			                                        UnPublish
			                                    </button>
				                            </a>
			                            @endif
			                            </td>
			                        </tr>
			                    @endforeach
							</tbody>
						</table>
						<div class="text-center">
		                	{!! $posts->render() !!}
		                </div>
					</div>
				</div>
			</section>

	</div>    

@endsection
