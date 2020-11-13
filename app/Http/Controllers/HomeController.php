<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function speaking()
    {
        return view('activities.speaking');
    }

    public function shortanswer()
    {
        return view('activities.speakingshortans');
    }

    public function describeImage()
    {
        return view('activities.speakingdescribeimage');
    }



    //listening routes

    public function multipleChoiceSingleAnswer()
    {
        return view('activities.listeningMulSinAns');
    }
    public function writeFromDictation()
    {
        return view('activities.writeFromDictation');
    }
    
    

    public function progress(Request $request)
    {
        return view('activities.progress')->with('head',$request->head)->with('routeurl',$request->url);
    }
}
