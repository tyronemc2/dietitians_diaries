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
    public function news()
	{
		$post = Post::where('category_id', 3)->where('status', 'PUBLISHED')
            ->orderBy('id')->get();
		return view('news')->with('posts', $post);
	}
	public function getPost($slug = null)
	{
		$post = Post::where('slug', $slug)->where('status', 'PUBLISHED');
		$post = $post->firstOrFail();

		// return view($page->template)->with('page', $page);
		return view('post')->with('post', $post);
	}
    public function viewPost($slug = null)
	{
    //    echo $slug; exit();
    //    $slug = '"'.$slug.'"';
        $post = Post::where('slug', $slug)->where('status', 'PUBLISHED')->get()->toArray();
		//$post = $post->firstOrFail();
        //
        $posts = Post::take(3)->where('category_id', 3)->where('status', 'PUBLISHED')
            ->orderBy('id')->get();
//dd($post);
		// return view($page->template)->with('page', $page);
		return view('post_view')->with(['post' => $post[0], 'posts' => $posts]);
	}
}
