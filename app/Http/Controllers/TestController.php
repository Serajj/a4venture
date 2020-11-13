<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Speaking;
use Auth;

class TestController extends Controller
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


     /**Speaking data store and show */


     public function speakingDataAdd(Request $request)
     {
         $uid=Auth::user()->id;

        $fileName = $request->filename.'.wav';
        $request->audio_data->move(public_path('/uploadedaudio'), $fileName);

        $data=new Speaking();
        $data->uid=$uid;
        $data->data=$fileName;
        $data->note=$request->type;
        $q=$data->save();
        if($q){
            return $fileName." saved";
        }else{
            return $fileName." Not saved";
        }
        
     }



     public function listeningDataAdd(Request $request)
     {
         $uid=Auth::user()->id;

        $fileName = $request->responce;
        $data=new Speaking();
        $data->uid=$uid;
        $data->data=$fileName;
        $data->note=$request->type;
        $q=$data->save();
        if($q){
            return $fileName." saved";
        }else{
            return $fileName." Not saved";
        }
        
     }
     

}
