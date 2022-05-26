<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Kegiatan::orderBy('id','DESC')->get();
        $i=0;
        return view('kegiatans.index', ['data' => $data,'i'=>$i]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kegiatans.create');
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
            "unsur" => "required",
            "sub_unsur" => "required",
            "kegiatan" => "required",
            "kode" => "required",
            "satuan_hasil" => "required",
            "angka_kredit" => "required",
            "pelaksana" => "required"
        ]);
        $input= $request->all();
        $data = Kegiatan::create($input);
        return redirect()->route('kegiatans.index')
                        ->with('success','Kegiatan created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
        //
        $data = $kegiatan;
        return view('kegiatans.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        //
        $this->validate($request, [
            "unsur" => "required",
            "sub_unsur" => "required",
            "kegiatan" => "required",
            "kode" => "required",
            "satuan_hasil" => "required",
            "angka_kredit" => "required",
            "pelaksana" => "required"
        ]);
        $input= $request->all();
        $data = Kegiatan::find($kegiatan->id);
        $data->update($input);
        return redirect()->route('kegiatans.index')
                        ->with('success','Kegiatan created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        //
        Kegiatan::find($kegiatan->id)->delete();
        return redirect()->route('kegiatans.index')
                        ->with('success','Kegiatan deleted successfully');
    }
}
