<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use TCG\Voyager\Models\Page;

class PagesController extends Controller
{
	// https://stackoverflow.com/questions/33003097/dynamic-routing-in-laravel-5-application
	public function index()
	{
		$page = Page::where('slug', '/')->where('active', 1)->first();
		return view('page')->with('page', $page);
	}

	public function getPage($slug = null)
	{
		$page = Page::where('slug', $slug)->where('status', 'active');
		$page = $page->firstOrFail();

		// return view($page->template)->with('page', $page);
		return view('page')->with('page', $page);
	}
}
