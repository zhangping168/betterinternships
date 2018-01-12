@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Manage Posts
                </div>
                <div class="panel-body">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <a href="{{url('admin/posts/create')}}" class="btn btn-lg btn-primary">Add new post</a>

                    @foreach($posts as $post)
                        <hr>
                        <div class="post">
                            <h4>{{$post->title}}</h4>
                            <div class="content">
                                <p>{{$post->body}}</p>
                            </div>
                        </div>

                        <a href="{{url('admin/posts/'.$post->id.'/edit')}}" class="btn btn-success">Edit</a>
                        <form action="{{url('admin/posts/'.$post->id)}}" method="POST" style="display:inline;">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button type="submt" class="btn btn-danger">Delete</button>
                            
                        </form>
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
