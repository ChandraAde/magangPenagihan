<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wp;
use App\User;
use App\file;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Wp::get();
        $user = User::get();
        $file = file::get();
         return view('home', compact('data','user','file'));
    }
}
