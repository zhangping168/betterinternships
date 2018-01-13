@extends('layouts.app')
@section('content')
	<div class="container">
		<h4><a href="/">Back to Home</a></h4>
		<h1>{{$post->title}}</h1>
		<hr>
		<div id="date" style="text-align:right;">
			{{$post->updated_at}}
		</div>
		<p>{{$post->body}}</p>

		<div id="comments" style="margin-top:50px;">
			@if(count($errors)>0)
				<div class="alert alert-danger">
					<strong>Failed to fetch post record</strong><br><br>
					{!! implode('<br>', $errors->all()) !!}
				</div>
			@endif

			<div id="new">
				<form action="{{url('comment')}}" method="POST">
					{!! csrf_field() !!}
					<input type="hidden" name="post_id" value="{{$post->id}}">

					<div class="form-group">
						<label>Nickname</label>
						<input type="text" name="nickname" class="form-control" style="width:300px;" required="required">
					</div>

					<div class="form-group">
						<label>Email Address</label>
						<input type="email" name="email" class="form-control" style="width:300px;" required="required">
					</div>

					<div class="form-group">
						<label>Home Page</label>
						<input type="text" name="website" class="form-control" style="width:300px;" required="required">
					</div>

					<div class="form-group">
						<label>Content</label>
						<textarea name="content" id="newFormContent" class="form-control" rows="10" required="required"></textarea>
					</div>

					<button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>


				</form>
			</div>

			<script>
				function reply(a){
					var nickname = a.parentNode.parentNode.firstChild.nextSilbing.getAttribute('data');
					var textArea = document.getElementById('newFormContent');
					textArea.innerHTML='@'+nickname+' ';
				}
			</script>
			<div class="comments" style="margin-top:100px;">
				@foreach($post->hasManyComments as $comment)
					<div class="one" style="border-top:solid 20px #efefef;padding:5px 20px;">
						@if($comment->website)
							<a href="{{$comment->website}}">
								<h3>{{$comment->nickname}}</h3>
							</a>
						@else
							<h3>{{$comment->nickname}}</h3>
						@endif
						<h6>{{$comment->created_at}}</h6>
					</div>
					<div class="content">
						<p style="padding:20px;">
							{{$comment->content}}
						</p>
					</div>
					<div class="reply" style="text-align:right;padding:5px;">
						<a href="#new" onclick="reply(this);">Comment</a>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection