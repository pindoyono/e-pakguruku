<?php

namespace App\Http\Controllers;

use App\Models\Lampiran2pkb;
use App\Models\relasi_l2pkb_usulan;
use DB;
use Illuminate\Http\Request;

class RelasiL2pkbUsulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pak_id)
    {
        //

        $usulan = DB::table('kegiatans')
            ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
            ->select('kegiatans.*', 'pendidikans.*')
            ->orderBy('kegiatans.kode', 'asc')
            ->where('pendidikans.pak_id', $pak_id)
        // ->where('kegiatans.unsur','PENGEMBANGAN  KEPROFESIAN  BERKELANJUTAN')
            ->get();

        // $data = relasi_l2pkb_usulan::orderBy('id','DESC')->get();
        $lampiran = Lampiran2pkb::orderBy('id', 'DESC')->get();

        $data = DB::table('relasi_l2pkb_usulans')
            ->join('lampiran2pkbs', 'relasi_l2pkb_usulans.l2pkb_id', '=', 'lampiran2pkbs.id')
            ->join('pendidikans', 'relasi_l2pkb_usulans.pendidikan_id', '=', 'pendidikans.id')
            ->join('kegiatans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        // ->select('kegiatan.is'as)
            ->select('relasi_l2pkb_usulans.id as id', 'pendidikan_id', 'kegiatan', 'lampiran2pkbs.kode as kode', 'diskripsi', 'saran', 'jenis')
            ->orderBy('kegiatans.kode', 'asc')
            ->where('pendidikans.pak_id', $pak_id)
            ->get();

        // dd($data);
        // dd($usulan);

        $i = 0;
        return view('l2pkb.index', [
            'data' => $data,
            'usulan' => $usulan,
            'lampiran' => $lampiran,
            'i' => $i,
        ]);

    }

    public function alasan($pak_id)
    {
        //

        $usulan = DB::table('kegiatans')
            ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
            ->select('kegiatans.*', 'pendidikans.*')
            ->orderBy('kegiatans.kode', 'asc')
            ->where('pendidikans.pak_id', $pak_id)
        // ->where('kegiatans.unsur','PENGEMBANGAN  KEPROFESIAN  BERKELANJUTAN')
            ->get();

        // $data = relasi_l2pkb_usulan::orderBy('id','DESC')->get();
        $lampiran = Lampiran2pkb::orderBy('id', 'DESC')->get();

        $data = DB::table('relasi_l2pkb_usulans')
            ->join('lampiran2pkbs', 'relasi_l2pkb_usulans.l2pkb_id', '=', 'lampiran2pkbs.id')
            ->join('pendidikans', 'relasi_l2pkb_usulans.pendidikan_id', '=', 'pendidikans.id')
            ->join('kegiatans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        // ->select('kegiatan.is'as)
            ->select('relasi_l2pkb_usulans.id as id', 'pendidikan_id', 'kegiatan', 'lampiran2pkbs.kode as kode', 'diskripsi', 'saran', 'jenis')
            ->orderBy('kegiatans.kode', 'asc')
            ->where('pendidikans.pak_id', $pak_id)
            ->get();

        // dd($data);
        // dd($usulan);

        $i = 0;
        return view('l2pkb.alasan', [
            'data' => $data,
            'usulan' => $usulan,
            'lampiran' => $lampiran,
            'i' => $i,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $this->validate($request, [
            "pendidikan_id" => "required",
            "l2pkb_id" => "required",
        ]);
        $input = $request->all();
        $data = relasi_l2pkb_usulan::create($input);
        return back()->with('success', 'Lampiran hapak created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\relasi_l2pkb_usulan  $relasi_l2pkb_usulan
     * @return \Illuminate\Http\Response
     */
    public function show(relasi_l2pkb_usulan $relasi_l2pkb_usulan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\relasi_l2pkb_usulan  $relasi_l2pkb_usulan
     * @return \Illuminate\Http\Response
     */
    public function edit(relasi_l2pkb_usulan $relasi_l2pkb_usulan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\relasi_l2pkb_usulan  $relasi_l2pkb_usulan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, relasi_l2pkb_usulan $relasi_l2pkb_usulan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\relasi_l2pkb_usulan  $relasi_l2pkb_usulan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        relasi_l2pkb_usulan::find($id)->delete();
        return back()->with('success', 'Lampiran deleted successfully');
    }
}
