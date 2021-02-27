<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{   
    public function __construct(){
        $this->middleware(['guest']);
    }
    
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //sign in user
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('status', 'invalid login details');
        }; 

        //cara lain
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);


        //redirect
        return redirect()->route('dashboard');  
        
        // dd('okay');
    }
}
