<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Twitimage;
use Response;
use Session;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		
		$image_list = [];
		
		if (Auth::user()) {
			$image_list = Twitimage::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
		}
		
        return view('index', [
			'image_list' => $image_list,
	    ]);
    }
	
	public function download(Request $request)
    {
		
		$file = $request->input('filename');
		
		return Response::download('./image/' . $file . '.png');
    }

	public function setLanguage(Request $request)
    {
		
		$lang = $request->input('lang');
		
		return redirect()->route('main')->withCookie('lang', $lang);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$filename = str_random(10);
		
		$url = $request->input('webpage');
		
        exec('/home/vagrant/Code/twitscreen-master/resources/phantomjs/bin/phantomjs /home/vagrant/Code/twitscreen-master/resources/phantomjs/bin/screenshot.js ' . escapeshellarg($url) . ' ./image/' . $filename . '.png');
			
		
		if (!file_exists('./image/' . $filename . '.png')) {
			return view('index', [
				'error' => true
			]);
		}
		
		if (file_exists('./image/' . $filename . '.png')) {

				if (Auth::guest()) {
					$user_id = 1;
				} else {
					$user_id = Auth::user()->id;
				}
			
				$tweet = [
					'user_id' => $user_id,
					'filename' => $filename,
					'url' => $url
				];
				
				$tweet = Twitimage::create($tweet);
				
				return view('success', [
					'tweet_image' => $tweet
				]);
		}
		
		return view('index', [
			'error' => true
		]);
	}
}
