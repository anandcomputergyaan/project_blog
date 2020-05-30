<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogModel;
use Auth;

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
      $userId=Auth::user()->id;
       if($userId==3){// if admin
       $blogs=BlogModel::orderBy('id', 'DESC')->get();
         return view('home',compact('blogs'));
     }
     else{

      $blogs=BlogModel::orderBy('id', 'DESC')->get();
      return view('user',compact('blogs'));
     }
       
      
    }


    public function storepost(Request $request){
       $userId=Auth::user()->id;
        $post = new BlogModel;
        $post->name=$request->name;
        $post->p_date=$request->p_date;
        $post->p_amount=$request->p_amount;
        $post->currency=$request->currency;
        $post->in_amount=$request->in_amount;
        $post->user_id=$userId;

        if($post->save()){
             if($userId==3){// if admin
             $blogs=BlogModel::orderBy('id', 'DESC')->get();
           }
           else{

            $blogs=BlogModel::where('user_id','=',$userId)->orderBy('id', 'DESC')->get();
           }
         return $blogs;  
        }
    }

}
