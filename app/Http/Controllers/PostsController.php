<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use TCG\Voyager\Models\Post;

class PostsController extends Controller
{
	// https://stackoverflow.com/questions/33003097/dynamic-routing-in-laravel-5-application
	public function index()
	{
		$post = Post::where('slug', '/')->where('active', 1)->where('status', 'PUBLISHED')->first();
		return view('post')->with('post', $page);
	}

	public function getPost($slug = null)
	{
		$post = Post::where('slug', $slug)->where('status', 'PUBLISHED');
		$post = $post->firstOrFail();

		// return view($page->template)->with('page', $page);
		return view('post')->with('post', $post);
	}
}
