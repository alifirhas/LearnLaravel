<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){

        // $posts = Post::paginate(5)->sortDesc();
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        
        
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
}