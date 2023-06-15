<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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


        $count = DB::table('paks')
        ->join('users', 'users.id', '=', 'paks.user_id')
        // ->select('users.*', 'paks.*')
        ->select('users.id',)
        ->orderBy('users.name', 'asc')
        ->where('users.status_naik_pangkat', 'NAIK PANGKAT')
        ->where(DB::raw('YEAR(paks.created_at)'), '>=', '2023')
        ->where(DB::raw('MONTH(paks.created_at)'), '>', '4')
        ->where('users.id', Auth::user()->id)
        ->count();

        if (Auth::user()->hasRole('super-admin')||Auth::user()->hasRole('admin')||Auth::user()->hasRole('admin-prov')||Auth::user()->hasRole('penilai')) {
            return view('/');
        }

        if (Auth::user()->hasRole('guru')) {
            // return redirect()->route('admin.page');
            if (Auth::user()->wilayah_kerja == 'malinau'){
                if (date('Y-m-d') >= date('2023-06-15') && $count == 0 ) {
                    Auth::logout();
                    return redirect('welcome');
                } else {
                    return view('home');
                }
            }
            if (Auth::user()->hasRole('admin')) {
                // return redirect()->route('admin.page');
                return view('home');
            }

            if (date('Y-m-d') >= date(get_tgl_akhir()) && $count == 0 ) {
                Auth::logout();
                return redirect('welcome');
            } else {
                // return view('lock');
                return view('home');

            }
        }
        return view('home');
    }

    public function index1()
    {
        Auth::logout();
        return view('lock');
    }

}
