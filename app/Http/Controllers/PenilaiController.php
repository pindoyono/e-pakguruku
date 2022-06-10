<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Pendidikan;
use App\Models\Kegiatan;
use App\Models\pak;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Kepegawaian;
use PDF;


class PenilaiController extends Controller
{
    //
    public function penilai()
    {
        $data = DB::table('paks')
                        ->join('users', 'users.id', '=', 'paks.user_id')
                        ->select('users.*','paks.*')
                        ->orderBy('paks.id','asc')
                        ->where('wilayah_kerja',Auth::user()->wilayah_kerja)
                        ->get();
        $i=0;

        return view('penilais.penilai', [
                                        'data' => $data,
                                        'i' => $i,
                                    ]);
    }


    public function pak_detail($pak_id)
    {

        $i=0;

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

        $pendidikan = DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->join('users', 'users.id', '=', 'paks.user_id')
        ->orderBy('kegiatans.kode','asc')
        ->where('kegiatans.sub_unsur','Melaksanakan kegiatan yang mendukung tugas guru')
        ->where('pak_id',$pak_id)
        ->where('status','!=','terbit')
        ->get();

        $pak = Pak::find($pak_id);
        $user_id = Pak::find($pak_id)->user_id;
        $user = User::find($user_id);
        $jabatan = Jabatan::all();
        $kepegawaian = Kepegawaian::where('user_id',$user_id)->get();

        $jabatan_pak = Jabatan::where('id',$user->pangkat_golongan)->first();

        // dd($pak->awal);

        return view('penilais.pak_detail', [
                                            'pendidikan' => $pendidikan,
                                            'pak_id' => $pak_id,
                                            'i' => $i,
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
                                            'user' => $user,
                                            'jabatan' => $jabatan,
                                            'kepegawaians' => $kepegawaian,
                                            'pak' => $pak,
                                            'jabatan_pak' => $jabatan_pak,
                                    ]);
    }

    public function update_pak_penilai(Request $request,$pak_id)
    {
        //
        $this->validate($request, [
            'pendidikan_sekolah' => 'required|numeric',
            'pelatihan_prajabatan' => 'required|numeric',
            'proses_pembelajaran' => 'required|numeric',
            'proses_bimbingan' => 'required|numeric',
            'tugas_lain' => 'required|numeric',
            'pengembangan_diri' => 'required|numeric',
            'publikasi_ilmiah' => 'required|numeric',
            'karya_inovatif' => 'required|numeric',
            'ijazah_tidak_sesuai' => 'required|numeric',
            'pendukung_tugas_guru' => 'required|numeric',
            'memperoleh_penghargaan' => 'required|numeric',
            'pendidikan_sekolah2' => 'required|numeric',
            'pelatihan_prajabatan2' => 'required|numeric',
            'proses_pembelajaran2' => 'required|numeric',
            'proses_bimbingan2' => 'required|numeric',
            'tugas_lain2' => 'required|numeric',
            'pengembangan_diri2' => 'required|numeric',
            'publikasi_ilmiah2' => 'required|numeric',
            'karya_inovatif2' => 'required|numeric',
            'ijazah_tidak_sesuai2' => 'required|numeric',
            'pendukung_tugas_guru2' => 'required|numeric',
            'memperoleh_penghargaan2' => 'required|numeric',
        ]);

        $input = $request->all();
        $input['penilai_id'] = Auth::user()->id;
        $input['status'] = 'sudah dinilai';
        $data = Pak::find($pak_id);
        $data->update($input);

        return redirect()->route('penilais.pak_detail',$pak_id)
                        ->with('success','Berita Acara Berhasil Di Buat');
    }

    public function usul_naik_pangkat(Request $request,$data)
    {
        //

        // dd($data);
        if(Auth::user()->pendidikan_sekolah == null){
            return back()->with('error','Lakukan hitung terlebih dahulu');
        }
        if($data == 1){
            $user = User::find(Auth::user()->id);
            $user->update(
                [
                    'status_naik_pangkat' => "NAIK PANGKAT",
                ]
            );
            return back()->with('success','Usulan Naik Pangkat Berhasil');
        }else{
            return back()->with('error','Maaf Anda Belum memenuhi Syarat Untuk Naik Pangkat');
        }

    }

    public function cetak_berita_acara($pak_id)
    {


        $data = DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->join('users', 'users.id', '=', 'paks.user_id')
        ->orderBy('kegiatans.kode','asc')
        ->where('pak_id',$pak_id)
        ->first();

        $pak2 = DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->join('users', 'users.id', '=', 'paks.user_id')
        ->orderBy('kegiatans.kode','asc')
        ->select('paks.*')
        ->where('pak_id',$pak_id)
        ->first();

        // dd($pak2);

        $pangkat = Jabatan::find($data->pangkat_golongan);

        $pdf = PDF::loadView('pdf.berita_acara',[
                                                'pak' => $data,
                                                'pak2' => $pak2,
                                                'pangkat' => $pangkat,
                                            ]);

        return $pdf->stream('BeritaAcara.pdf');
    }

    public function angka_kredit()
    {
        //
        $data = Kegiatan::orderBy('id','DESC')->get();
        $i=0;
        return view('penilais.angka_kredit', ['data' => $data,'i'=>$i]);
    }

}
