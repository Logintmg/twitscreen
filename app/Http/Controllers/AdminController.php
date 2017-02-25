<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Twitimage;

class AdminController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
		$image_list = Twitimage::orderBy('created_at', 'desc')->get();
		
        return view('admin', [
			'image_list' => $image_list,
	    ]);
		
    }
}
