<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;
use Auth;

class PlenosExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        if (Auth::user()->hasRole('super-admin')) {
            $data = DB::table('paks')
            ->select('paks.*','paks.id as pak_id','users.name','jabatans.id as jabatan_id','users.pangkat_golongan','users.tertinggal as tertinggal_user','users.pengembangan_diri as pd_user',
            'users.ijazah_tidak_sesuai as ijazah_tidak_sesuai_user','users.pendukung_tugas_guru as pendukung_tugas_guru_user','users.memperoleh_penghargaan as memperoleh_penghargaan_user',
            'users.tmt_pns','users.karya_inovatif as ki_user','users.publikasi_ilmiah as pi_user','jabatans.*')
            ->join('users', 'users.id', '=', 'paks.user_id')
            ->join('jabatans', 'users.pangkat_golongan', '=', 'jabatans.id')
            ->get();

            $pak2 = DB::table('paks')
            ->select('paks.*','paks.id as pak_id','users.name','jabatans.id as jabatan_id','users.pangkat_golongan','users.tertinggal as tertinggal_user','users.pengembangan_diri as pd_user',
            'users.ijazah_tidak_sesuai as ijazah_tidak_sesuai_user','users.pendukung_tugas_guru as pendukung_tugas_guru_user','users.memperoleh_penghargaan as memperoleh_penghargaan_user',
            'users.tmt_pns','users.karya_inovatif as ki_user','users.publikasi_ilmiah as pi_user','jabatans.*')
            ->join('users', 'users.id', '=', 'paks.user_id')
            ->join('jabatans', 'users.pangkat_golongan', '=', 'jabatans.id')
            ->select('paks.*')
            ->get();

        }else{
            $data = DB::table('paks')
            ->select('paks.*','paks.id as pak_id','users.name','jabatans.id as jabatan_id','users.pangkat_golongan','users.tertinggal as tertinggal_user','users.pengembangan_diri as pd_user',
            'users.ijazah_tidak_sesuai as ijazah_tidak_sesuai_user','users.pendukung_tugas_guru as pendukung_tugas_guru_user','users.memperoleh_penghargaan as memperoleh_penghargaan_user',
            'users.tmt_pns','users.karya_inovatif as ki_user','users.publikasi_ilmiah as pi_user','jabatans.*')
            ->join('users', 'users.id', '=', 'paks.user_id')
            ->join('jabatans', 'users.pangkat_golongan', '=', 'jabatans.id')
            ->where('wilayah_kerja',Auth::user()->wilayah_kerja)
            ->get();

            $pak2 = DB::table('paks')
            ->select('paks.*','paks.id as pak_id','users.name','jabatans.id as jabatan_id','users.pangkat_golongan','users.tertinggal as tertinggal_user','users.pengembangan_diri as pd_user',
            'users.ijazah_tidak_sesuai as ijazah_tidak_sesuai_user','users.pendukung_tugas_guru as pendukung_tugas_guru_user','users.memperoleh_penghargaan as memperoleh_penghargaan_user',
            'users.tmt_pns','users.karya_inovatif as ki_user','users.publikasi_ilmiah as pi_user','jabatans.*')
            ->join('users', 'users.id', '=', 'paks.user_id')
            ->join('jabatans', 'users.pangkat_golongan', '=', 'jabatans.id')
            ->select('paks.*')
            ->where('wilayah_kerja',Auth::user()->wilayah_kerja)
            ->get();
        }


        // dd($data);

        return  view('exports.pleno',[
                                        'data' => $data,
                                        'pak2' => $pak2,
                                        'i' => $i=1,
                                    ]);

    }
}
