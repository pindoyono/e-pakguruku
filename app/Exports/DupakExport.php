<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;

class DupakExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $pak_id;

    function __construct($pak_id) {
            $this->pak_id = $pak_id;
    }

    public function view(): View
    {
        $pak_id=$this->pak_id;
        $pendidikan1 = DB::table('kegiatans')
                        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                        ->select('kegiatans.*','pendidikans.*')
                        ->orderBy('kegiatans.kode','asc')
                        ->where('kegiatans.unsur','PENDIDIKAN')
                        ->where('kegiatans.sub_unsur','!=','Mengikuti pelatihan  prajabatan')
                        ->where('pak_id',$pak_id)
                        ->get();

        $sum_pendidikan1 = DB::table('kegiatans')
                        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                        ->select('kegiatans.*','pendidikans.*')
                        ->orderBy('kegiatans.kode','asc')
                        ->where('kegiatans.unsur','PENDIDIKAN')
                        ->where('kegiatans.sub_unsur','!=','Mengikuti pelatihan  prajabatan')
                        ->where('pak_id',$pak_id)
                        ->sum('nilai');

        $prajab = DB::table('kegiatans')
                        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                        ->select('kegiatans.*','pendidikans.*')
                        ->orderBy('kegiatans.kode','asc')
                        ->where('kegiatans.unsur','PENDIDIKAN')
                        ->where('kegiatans.sub_unsur','Mengikuti pelatihan  prajabatan')
                        ->where('pak_id',$pak_id)
                        ->get();

        $sum_prajab = DB::table('kegiatans')
                        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                        ->select('kegiatans.*','pendidikans.*')
                        ->orderBy('kegiatans.kode','asc')
                        ->where('kegiatans.unsur','PENDIDIKAN')
                        ->where('kegiatans.sub_unsur','Mengikuti pelatihan  prajabatan')
                        ->where('pak_id',$pak_id)
                        ->sum('nilai');


        $penugasan = DB::table('kegiatans')
                        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                        ->select('kegiatans.*','pendidikans.*')
                        ->orderBy('kegiatans.kode','asc')
                        ->where('kegiatans.unsur','PEMBELAJARAN/  BIMBINGAN DAN  TUGASTERTENTU')
                        ->where('pak_id',$pak_id)
                        ->get();

        $sum_penugasan = DB::table('kegiatans')
                        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                        ->select('kegiatans.*','pendidikans.*')
                        ->orderBy('kegiatans.kode','asc')
                        ->where('kegiatans.unsur','PEMBELAJARAN/  BIMBINGAN DAN  TUGASTERTENTU')
                        ->where('pak_id',$pak_id)
                        ->sum('nilai');

        $pkb = DB::table('kegiatans')
                        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                        ->select('kegiatans.*','pendidikans.*')
                        ->orderBy('kegiatans.kode','asc')
                        ->where('kegiatans.unsur','PENGEMBANGAN  KEPROFESIAN  BERKELANJUTAN')
                        ->where('pak_id',$pak_id)
                        ->get();

        $sum_pkb = DB::table('kegiatans')
                        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                        ->select('kegiatans.*','pendidikans.*')
                        ->orderBy('kegiatans.kode','asc')
                        ->where('kegiatans.unsur','PENGEMBANGAN  KEPROFESIAN  BERKELANJUTAN')
                        ->where('pak_id',$pak_id)
                        ->sum('nilai');

        $penunjang = DB::table('kegiatans')
                        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                        ->select('kegiatans.*','pendidikans.*')
                        ->orderBy('kegiatans.kode','asc')
                        ->where('kegiatans.unsur','PENUNJANG TUGAS GURU')
                        ->where('pak_id',$pak_id)
                        ->get();

        $sum_penunjang = DB::table('kegiatans')
                        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                        ->select('kegiatans.*','pendidikans.*')
                        ->orderBy('kegiatans.kode','asc')
                        ->where('kegiatans.unsur','PENUNJANG TUGAS GURU')
                        ->where('pak_id',$pak_id)
                        ->sum('nilai');

        // dd($pendidikan1);


        // $prajab = Kegiatan::orderBy('kode','asc')->where('unsur','PENDIDIKAN')->where('sub_unsur','Mengikuti pelatihan  prajabatan')->get();
        // $penugasan = Kegiatan::orderBy('kode','asc')->where('unsur','PEMBELAJARAN/  BIMBINGAN DAN  TUGASTERTENTU')->get();
        // $pkb = Kegiatan::orderBy('kode','asc')->where('unsur','PENGEMBANGAN  KEPROFESIAN  BERKELANJUTAN')->get();
        // $penunjang = Kegiatan::orderBy('kode','asc')->where('unsur','PENUNJANG TUGAS GURU')->get();

        $pendidikan = DB::table('kegiatans')
                    ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                    ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                    ->select('kegiatans.*','pendidikans.*')
                    ->where('pak_id',$pak_id)
                    ->get();

        return view('exports.dupaks', [
            'pendidikan' => $pendidikan,
            'pak_id' => $pak_id,
            'pendidikan1' => $pendidikan1,
            'sum_pendidikan1' => $sum_pendidikan1,
            'sum_prajab' => $sum_prajab,
            'prajab' => $prajab,
            'penugasan' => $penugasan,
            'sum_penugasan' => $sum_penugasan,
            'pkb' => $pkb,
            'sum_pkb' => $sum_pkb,
            'penunjang' => $penunjang,
            'sum_penunjang' => $sum_penunjang,
        ]);
    }
}
