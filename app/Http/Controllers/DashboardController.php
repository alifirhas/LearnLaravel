<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function __construct(){
        // $this->middleware('auth');//fotmat untuk panggil satu fungsi middleware
        $this->middleware(['auth']);//format untuk panggil beberapa fungsi middleware
    }

    public function index(){
        return view('dashboard');
    }
}
