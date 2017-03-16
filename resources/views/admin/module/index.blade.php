@extends('admin.layouts.apanel')

@section('title',' All modules')

@section('header',' All modules')

@section('content')

<div class="row">

			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a>
					</div>
	
					<h2 class="panel-title">

						{{$globalvar['indexpagetitle']}}

						<a href="{{ route($globalvar['routecreate']) }}" class="btn btn-success col-md-offset-9"><i class="glyphicon glyphicon-plus"></i> NEW {{$globalvar['mainname']}}</a>
			            <div >
			            	<b>{{$globalvar['totalitems']}} : </b> 
			            	<span class="badge label-success">{{$modules->total()}}</span>
			            </div>
					</h2>
				</header>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover mb-none">
							<thead>
								<tr>
									@foreach($indexcolumns as $indexcolumn)
										<th>{{$indexcolumn}}</th>
									@endforeach
								</tr>
							</thead>
							<tbody>
		                    	@foreach ($modules as $module)
			                        <tr style="font-size: 18px;">
				                            <td>{{ $module->id }}</td>
				                            <td>{{ $module->module_id }}</td>
				                            <td>{{ $module->name }}</td>
				                            <td>{{ $module->course_id }}</td>
				                            <td>{{ date('M j, Y H:i:s', strtotime($module->created_at)) }}</td>
			                            <td class="actions">
			                                <a href="{{ route($globalvar['routeshow'], $module->id)}}">
			                                    <button class="btn btn-md btn-primary">
			                                        <i class="fa fa-eye" aria-hidden="true"></i>
			                                        View
			                                    </button>
			                                </a>
			                                <a href="{{ route($globalvar['routeedit'], $module->id) }}">
			                                    <button class="btn btn-md btn-warning">
			                                        <i class="fa fa-pencil"></i>
			                                        Edit
			                                    </button>
			                                </a>
			                            @if($module->published == 0)
			                                
			                                	<a onclick="return confirm('Are you sure you want to publish this notice {{$module->title }}?');" href="{{ route($globalvar['routepublish'], $module->id)}}">
												    <button class="btn btn-md btn-success">
				                                        <i class="fa  fa-bolt"></i>
				                                        Publish
				                                    </button>
												</a>
			                                
			                            @else
			                                <a onclick="return confirm('Are you sure you want to unpublish this notice {{$module->title }}?');" href="{{ route($globalvar['routeunpublish'], $module->id)}}">
			                                    <button class="btn btn-md btn-warning">
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
		                	{!! $modules->render() !!}
		                </div>
					</div>
				</div>
			</section>

	</div>    

@endsection
