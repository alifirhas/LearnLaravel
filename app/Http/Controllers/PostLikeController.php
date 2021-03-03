<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostLikeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    public function store(Post $post, Request $request){

        if ($post->likedBy($request->user())) {
            return response('you have liked this post', 409);
        }
        else{
            $post->likes()->create([
                'user_id' => $request->user()->id,
            ]);     
        }
        

        return back();
    }

    public function destroy(Post $post, Request $request){

        // dd("delete post");
        $request->user()->like()->where('post_id', $post->id)->delete();

        return back();
    }
}
