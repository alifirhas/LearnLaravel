<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    
    public function store(Request $request){
        
        //validasi
        $this->validate($request, [
            'name' => 'required|max:10',
            'username' => 'required|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|confirmed|max:15',
        ]);

        //simpan data
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        //sign in user 


        //redirect
        return redirect()->route('dashboard');
    }
}
