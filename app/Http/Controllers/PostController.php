<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function  __construct()
    {
        $this->middleware('auth');
    }
    public function  index()
    {
        $posts=Post::paginate(2);

        return view('post.index',compact('posts'));

    }
    public  function store(Request $request)
    {
             $this->validate($request,[
           'body'=>'required|max:255'
        ]);
//            $s=new Post();
//            $s->body=$request->body;
//            $s->user_id=auth()->user()->id;
//
//             $s->save();
//             return back();



        $request->user()->posts()->create([
            'body'=>$request->body
        ]);
        return back();
    }
}
