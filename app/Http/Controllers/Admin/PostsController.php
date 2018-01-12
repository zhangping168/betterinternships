<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;

class PostsController extends Controller
{
    //

    public function index()
    {
    	return view('admin/posts/index')->with('posts', Post::all());
    }

    public function create()
    {
    	return view('admin/posts/create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'title'=>'required|unique:posts|max:255',
    		'body'=>'required'
    	]);

    	$post = new Post;
    	$post->title = $request->get('title');
    	$post->body = $request->get('body');
    	$post->user_id = $request->user()->id;
    	$post->number_of_saved = 99;

    	if($post->save()){
    		return redirect('admin/posts')->withErrors('Created new post!');
    	}else{
    		return redirect()->back()->withInput()->withErrors('Failed to save post!');
    	}
    }

    public function destroy($id)
    {
    	Post::find($id)->delete();
    	return redirect()->back()->withInput()->withErrors('Post Deleted!');
    }
}
