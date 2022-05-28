<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use App\Models\Jabatan;
use App\Models\Kepegawaian;
use App\Models\pak;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use DB;
use Illuminate\Support\Facades\File;
use App\Exports\DupakExport;
use Maatwebsite\Excel\Facades\Excel;


class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pak)
    {
        //
        // $pendidikan = Kegiatan::orderBy('kode','DESC')->where('unsur','PENDIDIKAN')->get();
        // $penugasan = Kegiatan::orderBy('kode','DESC')->where('unsur','PEMBELAJARAN/  BIMBINGAN DAN  TUGASTERTENTU')->get();
        // $pkb = Kegiatan::orderBy('kode','DESC')->where('unsur','PENGEMBANGAN  KEPROFESIAN  BERKELANJUTAN')->get();
        // $penunjang = Kegiatan::orderBy('kode','DESC')->where('unsur','PENUNJANG TUGAS GURU')->get();

        // return view('pendidikans.index',compact('pak','pendidikan','penugasan','pkb','penunjang'));
    }

    public function index1($pak_id)
    {

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
        $i=0;
        return view('pendidikans.index', [
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
                                        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(pak $pak)
    {
        //
        // dd($pak);
        return view('pendidikans.create', compact('pak_id'));
    }

    public function create1($pak_id)
    {
        //
        // dd($pak_id);
        $kegiatan = Kegiatan::orderBy('kode','asc')->get();

        return view('pendidikans.create', compact('pak_id','kegiatan'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function store1(Request $request, $pak_id)
    {
        //
        // dd($request->all());
        $this->validate($request, [
            'judul' => 'required',
            'nilai' => 'required|numeric',
            'kegiatan_id' => 'required',
            'lampiran' => 'mimes:pdf|max:2048',
        ]);
        $input = $request->all();
        if ($request->file('lampiran')) {
            $image = $request->file('lampiran');
            $profileImage = 'lampiran_'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/berkas/'.Carbon::now()->format('Y').'/'.Auth::user()->username, $profileImage);
            $input['lampiran'] = 'berkas/'.Carbon::now()->format('Y').'/'.Auth::user()->username."/".$profileImage;
        }

        $input['pak_id'] = $pak_id;
        $pendidikan = Pendidikan::create($input);

        return redirect()->route('pendidikans.index1',$pak_id)
                        ->with('success','Usulan created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(Pendidikan $pendidikan)
    {
        //
        return Excel::download(new DupakExport, 'Dupak.xlsx');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendidikan $pendidikan, $pak_id)
    {

    }

    public function edit1(Pendidikan $pendidikan, $id)
    {
        $pendidikan = Pendidikan::find($id);
        $pak_id =$pendidikan->pak_id;
        $kegiatan = Kegiatan::orderBy('kode','asc')->get();

        return view('pendidikans.edit', compact('pak_id','pendidikan','kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendidikan $pendidikan)
    {
        //
    }

    public function update1(Request $request, $pendidikan_id)
    {
        //
        $this->validate($request, [
            'judul' => 'required',
            'nilai' => 'required|numeric',
            'kegiatan_id' => 'required',
            'lampiran' => 'mimes:pdf|max:2048',
        ]);

        $input = $request->all();
        $pendidikan = Pendidikan::find($pendidikan_id)->lampiran;

        if(File::exists(public_path('storage/'.$pendidikan))){
            if ($image = $request->file('lampiran')) {
                if($pendidikan==null){
                }else{
                    unlink(public_path('storage/'.$pendidikan));
                }
                $profileImage = 'lampiran_'.date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->storeAs('public/berkas/'.Carbon::now()->format('Y').'/'.Auth::user()->username, $profileImage);
                $input['lampiran'] = 'berkas/'.Carbon::now()->format('Y').'/'.Auth::user()->username."/".$profileImage;
            }else{
                unset($input['lampiran']);
            }

        }else{
            if ($image = $request->file('lampiran')) {
                $profileImage = 'lampiran_'.date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->storeAs('public/berkas/'.Carbon::now()->format('Y').'/'.Auth::user()->username, $profileImage);
                $input['lampiran'] = 'berkas/'.Carbon::now()->format('Y').'/'.Auth::user()->username."/".$profileImage;
            }else{
                unset($input['lampiran']);
            }
        }
        // dd($pendidikan);
        $pendidikan = Pendidikan::find($pendidikan_id);
        $pendidikan->update($input);

        return redirect()->route('pendidikans.index1',$pendidikan->pak_id)
                        ->with('success','Usulan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendidikan $pendidikan)
    {
        //

    }

    function destroy1($id)
    {
        $pendidikan = Pendidikan::find($id)->pendidikan;
        if(File::exists(public_path('storage/berkas/'.$pendidikan))){
            if($pendidikan==null){
            }else{
                unlink(public_path('storage/'.$pendidikan));
            }
        }
        $pendidikan = Pendidikan::find($id);
        Pendidikan::find($id)->delete();
        return redirect()->route('pendidikans.index1',$pendidikan->pak_id)
                        ->with('success','Usulan updated successfully');
    }

    public function exporDupak($pak_id)
    {
        return Excel::download(new DupakExport($pak_id), 'Dupak.xlsx');
    }

    public function naik_pangkat()
    {
        //
        // dd($pak_id);

        // $count =Kepegawaian::where('user_id',Auth::user()->id)->count();
        // if($count > 0){
        //    $nilai_pak_pangkat_akhir =  Kepegawaian::where('user_id',Auth::user()->id)->first()->nilai_pak_pangkat_akhir;
        // }else{
        //    $nilai_pak_pangkat_akhir =  1500;
        // }

        $jabatan = Jabatan::where('pangkat',Auth::user()->pangkat_golongan)->first();
        if($jabatan){

        }else{
            $jabatan = Jabatan::first();
        }
        $kegiatan = Kegiatan::orderBy('kode','asc')->get();
        $pak = Pak::orderBy('id','asc')->where('user_id',Auth::user()->id)->where('status','submit')->get();
        $pak_first = Pak::orderBy('id','asc')->where('user_id',Auth::user()->id)->where('status','submit')->first();
        $pak_count = Pak::orderBy('id','asc')->where('user_id',Auth::user()->id)->where('status','submit')->count();
        $no = Pak::orderBy('id','asc')->where('user_id',Auth::user()->id)->where('status','submit')->count();
        $sum_prajab=0;
        $sum_pendidikan1=0;
        $sum_penugasan=0;
        $sum_pkb=0;
        $sum_penunjang=0;
        $proses_pembelajaran=0;
        $proses_bimbingan=0;
        $tugas_lain=0;
        $pengembangan_diri=0;
        $karya_ilmiah=0;
        $karya_inovatif=0;
        $ijazah_tidak_sesuai=0;
        $pendukung_tugas_guru=0;
        $memperoleh_penghargaan=0;

        if($pak_count > 0){

            return view('pendidikans.naik_pangkat', compact('kegiatan','pak','no','pak_first','sum_prajab',
            'sum_pendidikan1','sum_penugasan','sum_pkb',
                                                        'sum_penunjang','proses_pembelajaran','proses_bimbingan',
                                                        'tugas_lain','pengembangan_diri','karya_ilmiah','karya_inovatif',
                                                        'ijazah_tidak_sesuai','pendukung_tugas_guru','memperoleh_penghargaan',
                                                        'jabatan'));
        }else{
            // dd($pak_count);
            return view('pendidikans.tidak_ada');
        }

    }


}
