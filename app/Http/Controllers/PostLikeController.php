<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function store(Request $request)
    {
       $post=Post::find($request->id);

      if($post->likesBy($request->user())){
       return response(null,409);
   }
        $post->likes()->create([
            "user_id"=>$request->user()->id
        ]);
        return back();
    }
     public function destroy(Post $post, Request $request)
     {

//         dd($request->user()->likes()->where('user_id',$post->id)->delete());
//         dd($post->id);
//         $po=Likes::where('post_id',$post->id)->delete();
//

         $request->user()->likes()->where('post_id',$post->id)->delete();
         return back();
     }
}
