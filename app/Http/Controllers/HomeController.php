<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDownloads;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function downloads($hash = null)
    {
        $expiry = date('Y-m-d H:i:s');
        $download = OrderDownloads::where('hash', $hash)
            //->where('downloaded_date', NULL)
            ->where('expiry_date', '>', $expiry);
		$download = $download->firstOrFail();
        //
        if($download){
            $headers = [
                'Content-Type' => 'application/pdf',
             ];
            //
            $path = storage_path().'/app/public/';
            $file = $path.$download->file;
            $name = $download->name.".pdf";
            $download->downloaded_date = $expiry;
            $download->save();

            return response()->download($file, $name, $headers);
        }

    }
}
