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

        $tertinggal = DB::table('kegiatans')
                        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                        ->select('kegiatans.*','pendidikans.*')
                        ->orderBy('kegiatans.kode','asc')
                        ->where('kegiatans.unsur','TERTINGGAL')
                        ->where('pak_id',$pak_id)
                        ->where('status','!=','terbit')
                        ->first();

                        // dd($tertinggal);
        $sum_tertinggal = DB::table('kegiatans')
                        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                        ->select('kegiatans.*','pendidikans.*')
                        ->orderBy('kegiatans.kode','asc')
                        ->where('kegiatans.unsur','TERTINGGAL')
                        ->where('pak_id',$pak_id)
                        ->where('status','!=','terbit')
                        ->sum('nilai');

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

                $proses_pembelajaran = DB::table('kegiatans')
                ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                ->select('kegiatans.*','pendidikans.*')
                ->orderBy('kegiatans.kode','asc')
                ->where('kegiatans.sub_unsur','Melaksanakan proses  pembelajaran')
                ->where('pak_id',$pak_id)
                ->where('status','!=','terbit')
                ->get();

                $proses_bimbingan = DB::table('kegiatans')
                ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                ->select('kegiatans.*','pendidikans.*')
                ->orderBy('kegiatans.kode','asc')
                ->where('kegiatans.sub_unsur','Melaksanakan proses  bimbingan')
                ->where('pak_id',$pak_id)
                ->where('status','!=','terbit')
                ->get();

                $tugas_lain = DB::table('kegiatans')
                    ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                    ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                    ->select('kegiatans.*','pendidikans.*')
                    ->orderBy('kegiatans.kode','asc')
                    ->where('kegiatans.sub_unsur','Melaksanakan tugas lain  yang relevan dengan  fungsi sekolah /  madrasah.')
                    ->where('pak_id',$pak_id)
                    ->where('status','!=','terbit')
                    ->get();

                $pengembangan_diri = DB::table('kegiatans')
                    ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                    ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                    ->select('kegiatans.*','pendidikans.*')
                    ->orderBy('kegiatans.kode','asc')
                    ->where('kegiatans.sub_unsur','Melaksanakan  pengembangan diri')
                    ->where('pak_id',$pak_id)
                    ->where('status','!=','terbit')
                    ->get();

                $karya_ilmiah = DB::table('kegiatans')
                        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                        ->select('kegiatans.*','pendidikans.*')
                        ->orderBy('kegiatans.kode','asc')
                        ->where('kegiatans.sub_unsur','Melaksanakan Publikasi Ilmiah')
                        ->where('pak_id',$pak_id)
                        ->where('status','!=','terbit')
                        ->get();

                $karya_inovatif = DB::table('kegiatans')
                    ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                    ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                    ->select('kegiatans.*','pendidikans.*')
                    ->orderBy('kegiatans.kode','asc')
                    ->where('kegiatans.sub_unsur','Melaksanakan Karya Inovatif')
                    ->where('pak_id',$pak_id)
                    ->where('status','!=','terbit')
                    ->get();

                $ijazah_tidak_sesuai = DB::table('kegiatans')
                        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                        ->select('kegiatans.*','pendidikans.*')
                        ->orderBy('kegiatans.kode','asc')
                        ->where('kegiatans.sub_unsur','Memperoleh gelar/ijazah yang tidak sesuai dengan bidang yang diampunya')
                        ->where('pak_id',$pak_id)
                        ->where('status','!=','terbit')
                        ->get();

                $memperoleh_penghargaan =  DB::table('kegiatans')
                            ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                            ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                            ->select('kegiatans.*','pendidikans.*')
                            ->orderBy('kegiatans.kode','asc')
                            ->where('kegiatans.sub_unsur','Perolehan penghargaan/tanda jasa')
                            ->where('pak_id',$pak_id)
                            ->where('status','!=','terbit')
                            ->get();

                $pendukung_tugas_guru = DB::table('kegiatans')
                                ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                                ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                                ->select('kegiatans.*','pendidikans.*')
                                ->orderBy('kegiatans.kode','asc')
                                ->where('kegiatans.sub_unsur','Melaksanakan kegiatan yang mendukung tugas guru')
                                ->where('pak_id',$pak_id)
                                ->where('status','!=','terbit')
                                ->get();

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
                                            'tertinggal' => $tertinggal,
                                            'sum_tertinggal' => $sum_tertinggal,
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
                                            'proses_pembelajaran' => $proses_pembelajaran,
                                            'proses_bimbingan' => $proses_bimbingan,
                                            'tugas_lain' => $tugas_lain,
                                            'pengembangan_diri' => $pengembangan_diri,
                                            'karya_ilmiah' => $karya_ilmiah,
                                            'karya_inovatif' => $karya_inovatif,
                                            'ijazah_tidak_sesuai' => $ijazah_tidak_sesuai,
                                            'memperoleh_penghargaan' => $memperoleh_penghargaan,
                                            'pendukung_tugas_guru' => $pendukung_tugas_guru,
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

    public function cetak_pak($pak_id)
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

        $pak = Pak::find($pak_id);
        $user_id = Pak::find($pak_id)->user_id;
        $user = User::find($user_id);
        $jabatan = Jabatan::all();
        $kepegawaian = Kepegawaian::where('user_id',$user_id)->get();

        $jabatan_pak = Jabatan::where('id',$user->pangkat_golongan)->first();

        // dd($pak->awal);
        $i=0;

        $ak_diperoleh = number_format(
            $pak->pendidikan_sekolah + $pak->pendidikan_sekolah2 +
            $pak->pelatihan_prajabatan + $pak->pelatihan_prajabatan2 +
            $pak->proses_pembelajaran + $pak->proses_pembelajaran2 +
            $pak->proses_bimbingan + $pak->proses_bimbingan2 +
            $pak->tugas_lain + $pak->tugas_lain2 +
            $pak->pengembangan_diri + $pak->pengembangan_diri2 +
            $pak->publikasi_ilmiah + $pak->publikasi_ilmiah2 +
            $pak->karya_inovatif + $pak->karya_inovatif2 +
                $pak->ijazah_tidak_sesuai + $pak->ijazah_tidak_sesuai2 +
                $pak->pendukung_tugas_guru + $pak->pendukung_tugas_guru2 +
                $pak->tertinggal + $pak->tertinggal2 +
                $pak->memperoleh_penghargaan + $pak->memperoleh_penghargaan2
            ,3);

            $ak_utama_total = number_format(
                $pak->pendidikan_sekolah + $pak->pendidikan_sekolah2 +
                $pak->pelatihan_prajabatan + $pak->pelatihan_prajabatan2 +
                $pak->proses_pembelajaran + $pak->proses_pembelajaran2 +
                $pak->proses_bimbingan + $pak->proses_bimbingan2 +
                $pak->tugas_lain + $pak->tugas_lain2 +
                $pak->pengembangan_diri + $pak->pengembangan_diri2 +
                $pak->publikasi_ilmiah + $pak->publikasi_ilmiah2 +
                $pak->karya_inovatif + $pak->karya_inovatif2
                ,3);

            $ak_pd = number_format(
                $pak->pengembangan_diri + $pak->pengembangan_diri2 - $user->pengembangan_diri
                ,3);

            $ak_piki = number_format(
                                    $pak->publikasi_ilmiah + $pak->publikasi_ilmiah2 +
                                    $pak->karya_inovatif + $pak->karya_inovatif2 - $user->publikasi_ilmiah
                                    - $user->karya_inovatif
                                ,3);

            $ak_penunjang = number_format(
                ($pak->ijazah_tidak_sesuai + $pak->ijazah_tidak_sesuai2 +
                $pak->pendukung_tugas_guru + $pak->pendukung_tugas_guru2 +
                $pak->memperoleh_penghargaan + $pak->memperoleh_penghargaan2)
                -
                ($user->ijazah_tidak_sesuai
                + $user->pendukung_tugas_guru
                + $user->memperoleh_penghargaan)
            ,3);


        $jml_1 = number_format($ak_diperoleh - $jabatan_pak->target,3);
        $jml_4 = number_format(($ak_utama_total - (90/100*$jabatan_pak->target_sebelum)) - (90/100*$jabatan_pak->akk) ,3) + ($pak->tertinggal + $pak->tertinggal2 + $user->tertinggal);
        $jml_2 = number_format($ak_pd - $jabatan_pak->akpkbpd,3);
        $jml_3 = number_format($ak_piki - $jabatan_pak->akpkbpiki,3);
        $jml_5 = number_format($ak_penunjang - $jabatan_pak->akp,3 );

            if($jml_1>=0 && $jml_2>=0 && $jml_3>=0 && $jml_4>=0 && $jml_5<=0){
                $naik_pangkat = 1;
            }else{
                $naik_pangkat = 0;
            }

        // dd($naik_pangkat);

        $pangkat = Jabatan::find($data->pangkat_golongan);

        $pdf = PDF::loadView('pdf.pak',[
                                                'pak' => $data,
                                                'pak2' => $pak2,
                                                'pangkat' => $pangkat,
                                                'naik_pangkat' => $naik_pangkat,
                                            ]);

        return $pdf->stream('PAK.pdf');
    }


    public function cetak_hapak($pak_id)
    {


        $tertinggal = DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->select('kegiatans.*','pendidikans.*')
        ->orderBy('kegiatans.kode','asc')
        ->where('kegiatans.unsur','TERTINGGAL')
        ->where('pak_id',$pak_id)
        ->where('status','!=','terbit')
        ->first();

        // dd($tertinggal);
        $sum_tertinggal = DB::table('kegiatans')
                ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                ->select('kegiatans.*','pendidikans.*')
                ->orderBy('kegiatans.kode','asc')
                ->where('kegiatans.unsur','TERTINGGAL')
                ->where('pak_id',$pak_id)
                ->where('status','!=','terbit')
                ->sum('nilai');

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

        $proses_pembelajaran = DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->select('kegiatans.*','pendidikans.*')
        ->orderBy('kegiatans.kode','asc')
        ->where('kegiatans.sub_unsur','Melaksanakan proses  pembelajaran')
        ->where('pak_id',$pak_id)
        ->where('status','!=','terbit')
        ->get();

        $proses_bimbingan = DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->select('kegiatans.*','pendidikans.*')
        ->orderBy('kegiatans.kode','asc')
        ->where('kegiatans.sub_unsur','Melaksanakan proses  bimbingan')
        ->where('pak_id',$pak_id)
        ->where('status','!=','terbit')
        ->get();

        $tugas_lain = DB::table('kegiatans')
            ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
            ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
            ->select('kegiatans.*','pendidikans.*')
            ->orderBy('kegiatans.kode','asc')
            ->where('kegiatans.sub_unsur','Melaksanakan tugas lain  yang relevan dengan  fungsi sekolah /  madrasah.')
            ->where('pak_id',$pak_id)
            ->where('status','!=','terbit')
            ->get();

        $pengembangan_diri = DB::table('kegiatans')
            ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
            ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
            ->select('kegiatans.*','pendidikans.*')
            ->orderBy('kegiatans.kode','asc')
            ->where('kegiatans.sub_unsur','Melaksanakan  pengembangan diri')
            ->where('pak_id',$pak_id)
            ->where('status','!=','terbit')
            ->get();

        $karya_ilmiah = DB::table('kegiatans')
                ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                ->select('kegiatans.*','pendidikans.*')
                ->orderBy('kegiatans.kode','asc')
                ->where('kegiatans.sub_unsur','Melaksanakan Publikasi Ilmiah')
                ->where('pak_id',$pak_id)
                ->where('status','!=','terbit')
                ->get();

        $karya_inovatif = DB::table('kegiatans')
            ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
            ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
            ->select('kegiatans.*','pendidikans.*')
            ->orderBy('kegiatans.kode','asc')
            ->where('kegiatans.sub_unsur','Melaksanakan Karya Inovatif')
            ->where('pak_id',$pak_id)
            ->where('status','!=','terbit')
            ->get();

        $ijazah_tidak_sesuai = DB::table('kegiatans')
                ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                ->select('kegiatans.*','pendidikans.*')
                ->orderBy('kegiatans.kode','asc')
                ->where('kegiatans.sub_unsur','Memperoleh gelar/ijazah yang tidak sesuai dengan bidang yang diampunya')
                ->where('pak_id',$pak_id)
                ->where('status','!=','terbit')
                ->get();

        $memperoleh_penghargaan =  DB::table('kegiatans')
                    ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                    ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                    ->select('kegiatans.*','pendidikans.*')
                    ->orderBy('kegiatans.kode','asc')
                    ->where('kegiatans.sub_unsur','Perolehan penghargaan/tanda jasa')
                    ->where('pak_id',$pak_id)
                    ->where('status','!=','terbit')
                    ->get();

        $pendukung_tugas_guru = DB::table('kegiatans')
                        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
                        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
                        ->select('kegiatans.*','pendidikans.*')
                        ->orderBy('kegiatans.kode','asc')
                        ->where('kegiatans.sub_unsur','Melaksanakan kegiatan yang mendukung tugas guru')
                        ->where('pak_id',$pak_id)
                        ->where('status','!=','terbit')
                        ->get();

        $pendidikan = DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->join('users', 'users.id', '=', 'paks.user_id')
        ->orderBy('kegiatans.kode','asc')
        ->where('kegiatans.sub_unsur','Melaksanakan kegiatan yang mendukung tugas guru')
        ->where('pak_id',$pak_id)
        ->where('status','!=','terbit')
        ->get();


        $lampiran_hapak = DB::table('relasi_l2pkb_usulans')
        ->join('lampiran2pkbs', 'relasi_l2pkb_usulans.l2pkb_id', '=', 'lampiran2pkbs.id')
        ->join('pendidikans', 'relasi_l2pkb_usulans.pendidikan_id', '=', 'pendidikans.id')
        ->join('kegiatans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        // ->select('kegiatan.is'as)
        ->select('relasi_l2pkb_usulans.id as id','pendidikan_id', 'kegiatan','lampiran2pkbs.kode as kode', 'diskripsi', 'saran' ,'jenis')
        ->orderBy('kegiatans.kode','asc')
        ->where('pendidikans.pak_id',$pak_id)
        ->get();

        $pak = Pak::find($pak_id);
        $user_id = Pak::find($pak_id)->user_id;
        $user = User::find($user_id);
        $jabatan = Jabatan::all();
        $kepegawaian = Kepegawaian::where('user_id',$user_id)->get();

        $jabatan_pak = Jabatan::where('id',$user->pangkat_golongan)->first();

        // dd($pak->awal);
        $i=0;

        $customPaper = [0, 0, 609,449, 935,433];

        $pdf = PDF::loadView('pdf.hapak', [
                                    'pendidikan' => $pendidikan,
                                    'pak_id' => $pak_id,
                                    'i' => $i,
                                    'pendidikan1' => $pendidikan1,
                                    'sum_pendidikan1' => $sum_pendidikan1,
                                    'tertinggal' => $tertinggal,
                                    'sum_tertinggal' => $sum_tertinggal,
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
                                    'proses_pembelajaran' => $proses_pembelajaran,
                                    'proses_bimbingan' => $proses_bimbingan,
                                    'tugas_lain' => $tugas_lain,
                                    'pengembangan_diri' => $pengembangan_diri,
                                    'karya_ilmiah' => $karya_ilmiah,
                                    'karya_inovatif' => $karya_inovatif,
                                    'ijazah_tidak_sesuai' => $ijazah_tidak_sesuai,
                                    'memperoleh_penghargaan' => $memperoleh_penghargaan,
                                    'pendukung_tugas_guru' => $pendukung_tugas_guru,
                                    'lampiran_hapak' => $lampiran_hapak,

                            ])->setPaper('folio', 'potrait');;


        return $pdf->stream('hapak.pdf');

    }

    public function angka_kredit()
    {
        //
        $data = Kegiatan::orderBy('id','DESC')->get();
        $i=0;
        return view('penilais.angka_kredit', ['data' => $data,'i'=>$i]);
    }

}
