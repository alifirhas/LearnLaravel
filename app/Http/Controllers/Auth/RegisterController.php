<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{   
    public function __construct(){
        $this->middleware(['guest']);
    }
    
    public function index()
    {
        return view('auth.register');
    }
    
    public function store(Request $request){
        
        //validasi
        $this->validate($request, [
            'name' => 'required|max:100',
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
        auth()->attempt($request->only('email', 'password')); 

        //cara lain
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);


        //redirect
        return redirect()->route('dashboard');  
    }
}
