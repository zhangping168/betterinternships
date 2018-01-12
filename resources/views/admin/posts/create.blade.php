@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-info">
				
				<div class="panel-heading"><strong>Add new post</strong></div>
				<div class="panel-body">
					@if(count($errors)>0)
						<div class="alert alert-danger">
							<strong>Failed to add new post</strong>Invalid input values<br><br>
							{!! implode('<br>', $errors->all()) !!}
						</div>
					@endif

					<form action="{{url('admin/posts')}}" method="POST">
						{!!csrf_field() !!}
						<input type="text" name="title" class="form-control" required="required" plachoder="Enter post title">
						<br>
						<textarea name="body" row="10"  class="form-control" required="required" placeholder="Enter post content"></textarea>
						<br>
						<button class="btn btn-lg btn-info">Add new post</button>
					</form>
				</div>
			</div>

		</div>
		
	</div>
</div>
@endsection