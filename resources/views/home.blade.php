@extends('layouts.app')

@section('content')
    <div id="title" style="text-align:center">
        <h1>Internship Oppotunities</h1>
        <div style="padding:5px;font-size:16px">Posts list</div>
    </div>
    <hr>
    <div id="content">
        <ul>
            @foreach($posts as $post)
            <li style="margin:50px 0">
                <div class="title">
                    <a href="{{url('post/'.$post->id)}}">
                        <h4>{{$post->title}}</h4>
                    </a>
                </div>
                <div class="body">
                    <p>{{$post->body}}</p>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
@endsection
