<?php

namespace App\Http\Controllers;

use App\Models\pak;
use Auth;
use DB;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    //
    public function verifikasi()
    {
        if (Auth::user()->hasRole('super-admin')) {
            $data = DB::table('paks')
                ->join('users', 'users.id', '=', 'paks.user_id')
                ->select('users.*', 'paks.*')
                ->orderBy('paks.id', 'asc')
                ->get();
        } else {
            $data = DB::table('paks')
                ->join('users', 'users.id', '=', 'paks.user_id')
                ->select('users.*', 'paks.*')
                ->orderBy('paks.id', 'asc')
                ->where('wilayah_kerja', Auth::user()->wilayah_kerja)
                ->get();
        }

        $i = 1;

        return view('provinsis.verifikasi', [
            'data' => $data,
            'i' => $i,
        ]);
    }

    public function verif(Request $request, $pak_id)
    {
        //

        // dd($data);
        $pak = Pak::find($pak_id);
        $pak->update(
            [
                'status' => 'Terverifikasi',
            ]
        );
        return back()->with('success', 'DUPAK Terverifikasi');
    }

    public function perbaikan(Request $request, $pak_id)
    {
        //

        $this->validate($request, [
            'pesan_perbaikan' => 'required',
        ]);
        // dd($request->all());
        $pak = Pak::find($pak_id);
        if ($request->get('ditolak') == "ditolak") {
            $pak->update(
                [
                    'pesan_perbaikan' => $request->get('pesan_perbaikan'),
                    'status' => 'Ditolak',
                ]
            );
        } else {

            $pak->update(
                [
                    'pesan_perbaikan' => $request->get('pesan_perbaikan'),
                    'status' => 'Perbaikan',
                ]
            );
        }
        return back()->with('success', 'Pesan Perbaikan Berhasil Terkirim');
    }

    public function tolak(Request $request, $pak_id)
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
                'status' => 'ditolak',
            ]
        );
        return back()->with('success', 'Pesan Penolakan Berhasil Terkirim');
    }

    public function lap_pi(Request $request, $pak_id)
    {
        $pak = Pak::find($pak_id);
        $pak->update(
            [
                'lap_pi' => 'Ada',
            ]
        );
        return back()->with('success', 'Laporan Penilitian berhasil di Update');
    }

    public function jurnal(Request $request, $pak_id)
    {
        $pak = Pak::find($pak_id);
        $pak->update(
            [
                'jurnal' => 'Ada',
            ]
        );
        return back()->with('success', 'Jurnal berhasil di Update');
    }

    public function saran(Request $request, $pak_id)
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
        return back()->with('success', 'Saran Tersimpan');
    }

    public function no_sk(Request $request, $pak_id)
    {
        //

        $this->validate($request, [
            'no_sk' => 'required',
        ]);
        // dd($request->all());
        $pak = Pak::find($pak_id);
        $pak->update(
            [
                'no_sk' => $request->get('no_sk'),
            ]
        );
        return back()->with('success', 'No SK Tersimpan');
    }

    public function no_sk_asli(Request $request, $pak_id)
    {
        //

        $this->validate($request, [
            'no_sk_asli' => 'required',
        ]);
        // dd($request->all());
        $pak = Pak::find($pak_id);
        $pak->update(
            [
                'no_sk_asli' => $request->get('no_sk_asli'),
            ]
        );
        // return redirect('provinsis.verifikasi', ['page' => $request->page])->with('success', 'No SK Tersimpan');
        return back()->with('success', 'No SK Tersimpan');
    }

    public function pesan_perbaikan(Request $request, $pak_id)
    {
        //
        $data = Pak::find($pak_id);
        return view('provinsis.pesan_perbaikan', [
            'data' => $data,
        ]);
    }

}
