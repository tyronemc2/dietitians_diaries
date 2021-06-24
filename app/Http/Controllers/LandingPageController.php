<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::take(3)->inRandomOrder()->get();
        $pages = Page::where('status', 'ACTIVE')->get();

        return view('landing-page2')->with(['products' => $products, 'pages' => $pages]);
    }
    public function terms()
    {
        $page = Page::where('status', 'ACTIVE')->where('slug', 'terms')->get();

        return view('terms')->with(['page' => $page]);
    }
}
