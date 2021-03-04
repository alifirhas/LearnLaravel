<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){

        // $posts = Post::paginate(5)->sortDesc();
        $posts = Post::orderBy('created_at', 'desc')->with(['user','likes'])->paginate(20);
        
        
        return view('posts.index', [
            'posts' => $posts,
        ]);
        // return view('posts.index', compact($posts));
    }

    public function store(Request $request){
        
        $this->validate($request, [
            'body' => "required"
        ]);
        
        //easy way, tapi tidak ideal
        //untuk pakai cara tambahkan user_id di $fillable di Post model
        // Post::create([
        //     'user_id' => auth()->user()->id,
        //     'body' => $request->body
        // ]);
        
        //pakek auth
        auth()->user()->posts()->create([
            'body' => $request->body
        ]);
        //pakek request
        // $request->user()->posts()->create([
        // 'body' => $request->body
        // ]);

        return back();
    }

    public function destroy(Request $request, Post $post){
        // lanjutan cara nyembunyikan delete 2
        // if ($post->ownBy(auth()->user())) {
        //     dd("No, it is not yours");
        // }

        // lanjutan cara nyembunyikan delete 3
        $this->authorize('delete', $post);
        $post->delete();

        return back();

    }
}