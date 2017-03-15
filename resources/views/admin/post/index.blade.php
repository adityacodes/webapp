@extends('user')

@section('title',' All Posts')

@section('content')

<div class="row">
    <div class="card">

        <div class="header">
	        <h4 class="title">All Posts
	            <a href="{{ route('admin.post.create') }}" class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> NEW POST</a>
	            <div ><b>Total Posts:</b><span class="badge label-success">{{$posts->total()}}</span></div>
            </h4>
            <hr>
        </div>
        
        <div class="content" >
        	<h5>
        		<table class="table bootstrap-admin-table-with-actions">
	                    <thead>
	                        <tr>
	                            <th>#</th>
	                            <th>Title</th>
	                            <th>Post</th>
	                            <th>Post Image</th>
	                            <th>Created At</th>
	                            <th>Actions</th>
	                        </tr>
	                    </thead>
                    <tbody>
                    	@foreach ($posts as $post)
	                        <tr>
	                            <td>{{ $post->id }}</td>
	                            <td>{{ substr($post->title,0,20) }}</td>
	                            <td>{{ substr($post->body,0,20) }}{{ strlen($post->body) > 10 ? "..." : ""}}</td>
	                            <td>
	                            <img width="150" height="100" src="{{url('/uploads/post')}}/{{ $post->image }}">

	                            </td>
	                            <td>{{ date('M j, Y H:i:s', strtotime($post->created_at)) }}</td>
	                            <td class="actions">
	                                <a href="{{ route('admin.post.show', $post->id)}}">
	                                    <button class="btn btn-md btn-primary">
	                                        <h6><i class="ti-eye" aria-hidden="true"></i>
	                                        View</h6>
	                                    </button>
	                                </a>
	                                <a href="{{ route('admin.post.edit', $post->id) }}">
	                                    <button class="btn btn-md btn-warning">
	                                        <h6><i class="ti-pencil"></i>
	                                        Edit</h6>
	                                    </button>
	                                </a>
	                            @if($post->published == 0)
	                                
	                                	<a onclick="return confirm('Are you sure you want to publish this notice {{$post->title }}?');" href="{{ route('admin.notice.publish', $post->id)}}">
										    <button class="btn btn-md btn-success">
		                                        <h6><i class="ti-thumb-up"></i>
		                                        Publish</h6>
		                                    </button>
										</a>
	                                
	                            @else
	                                <a onclick="return confirm('Are you sure you want to unpublish this notice {{$post->title }}?');" href="{{ route('admin.notice.unpublish', $post->id)}}">
	                                    <button class="btn btn-md btn-warning">
	                                        <h6><i class="fa fa-eye-slash" aria-hidden="true"></i>
	                                        UnPublish</h6>
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
            </h5>

        </div>
    </div>    

</div>
@endsection
