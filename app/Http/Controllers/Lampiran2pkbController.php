<?php

namespace App\Http\Controllers;

use App\Models\Lampiran2pkb;
use Illuminate\Http\Request;

class Lampiran2pkbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Lampiran2pkb::orderBy('jenis','asc')->get();
        return view('lampiran2pkbs.index', [
            'data' => $data,
            'i' => $i=0,

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
        return view("lampiran2pkbs.create");
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
            "jenis" => "required",
            "kode" => "required",
            "diskripsi" => "required",
            "saran" => "required"
        ]);



        // return $request;
        $lampiran = new Lampiran2pkb;
        $lampiran->jenis = $request->get('jenis');
        $lampiran->kode = $request->get('kode');
        $lampiran->diskripsi = $request->get('diskripsi');
        $lampiran->saran = $request->get('saran');
        $lampiran->save();

        return redirect()->route('lampiran2pkbs.create')->with('toast_success', 'Task Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lampiran2pkb  $lampiran2pkb
     * @return \Illuminate\Http\Response
     */
    public function show(Lampiran2pkb $lampiran2pkb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lampiran2pkb  $lampiran2pkb
     * @return \Illuminate\Http\Response
     */
    public function edit(Lampiran2pkb $lampiran2pkb)
    {
        //
        $data = Lampiran2pkb::find($lampiran2pkb)->first();
        // dd($data);

        return view('lampiran2pkbs.edit',   ['data' => $data
                                    ]
                                );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lampiran2pkb  $lampiran2pkb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lampiran2pkb $lampiran2pkb)
    {
        //
        $this->validate($request, [
            "jenis" => "required",
            "kode" => "required",
            "diskripsi" => "required",
            "saran" => "required"
        ]);



        // return $request;
        $lampiran =  Lampiran2pkb::find($lampiran2pkb->id);
        $lampiran->jenis = $request->get('jenis');
        $lampiran->kode = $request->get('kode');
        $lampiran->diskripsi = $request->get('diskripsi');
        $lampiran->saran = $request->get('saran');
        $lampiran->Update();

        return redirect()->route('lampiran2pkbs.index')->with('toast_success', 'Task Created Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lampiran2pkb  $lampiran2pkb
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lampiran2pkb $lampiran2pkb)
    {
        //
        $data = Lampiran2pkb::findOrFail($lampiran2pkb->id);
        $data->delete();
        return redirect()->route('lampiran2pkbs.index')->with('toast_success', 'Task Delete Successfully!');

    }
}
