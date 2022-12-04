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
            if (Auth::user()->hasRole('admin')) {
                // return redirect()->route('admin.page');
                return view('home');
            }

            if(date('Y-m-d') <= date(get_tgl_akhir()) ){
                return view('home');
                // dd('home');
            }else{
                // return view('lock');
                return view('home');

                // dd('lock');
            }
        }
        return view('home');
    }

    public function index1()
    {
        return view('lock');
    }

}
