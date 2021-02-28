<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('posts.index');
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