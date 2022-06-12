<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\pak;



class ProvinsiController extends Controller
{
    //
    public function verifikasi()
    {
        $data = DB::table('paks')
                        ->join('users', 'users.id', '=', 'paks.user_id')
                        ->select('users.*','paks.*')
                        ->orderBy('paks.id','asc')
                        ->where('wilayah_kerja',Auth::user()->wilayah_kerja)
                        ->get();
        $i=0;

        return view('provinsis.verifikasi', [
                                        'data' => $data,
                                        'i' => $i,
                                    ]);
    }

    public function verif(Request $request,$pak_id)
    {
        //

        // dd($data);
        $pak = Pak::find($pak_id);
        $pak->update(
            [
                'status' => 'Terverifikasi',
            ]
        );
        return back()->with('success','DUPAK Terverifikasi');
    }

    public function perbaikan(Request $request,$pak_id)
    {
        //

        $this->validate($request, [
            'pesan_perbaikan' => 'required',
        ]);
        // dd($request->all());
        $pak = Pak::find($pak_id);
        $pak->update(
            [
                'pesan_perbaikan' => $request->get('pesan_perbaikan'),
                'status' => 'Perbaikan',
            ]
        );
        return back()->with('success','Pesan Perbaikan Berhasil Terkirim');
    }

    public function saran(Request $request,$pak_id)
    {
        //

        $this->validate($request, [
            'saran' => 'required',
        ]);
        // dd($request->all());
        $pak = Pak::find($pak_id);
        $pak->update(
            [
                'saran' => $request->get('saran'),
            ]
        );
        return back()->with('success','Saran Tersimpan');
    }

    public function pesan_perbaikan(Request $request,$pak_id)
    {
        //
        $data = Pak::find($pak_id);
        return view('provinsis.pesan_perbaikan', [
            'data' => $data,
        ]);
    }

}
