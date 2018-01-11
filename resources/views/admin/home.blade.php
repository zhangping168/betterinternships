@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-info">
				<div class="panel-heading">Admin Dashboard</div>
				<div class="panel-body">
					<a href="{{url('admin/post')}}" class="btn btn-lg btn-success col-xs-12">Manage Posts</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection