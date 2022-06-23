<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
        if (Auth::user()->hasRole('guru')) {
            // return redirect()->route('admin.page');
            if (Auth::user()->hasRole('super-admin')) {
                // return redirect()->route('admin.page');
                return view('home');
            }
            return view('home');
            // return view('lock');
        }
        return view('home');
    }

    public function index1()
    {
        return view('lock');
    }

}
