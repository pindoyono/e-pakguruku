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
        return view("lampirans.create");
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
        $validator = Validator::make($request->all(), [
            "jenis" => "required",
            "kode" => "required",
            "diskripsi" => "required",
            "saran" => "required"
        ]);




        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }


        // return $request;
        $lampiran = new Lampiran2pkb;
        $lampiran->jenis = $request->get('jenis');
        $lampiran->kode = $request->get('kode');
        $lampiran->diskripsi = $request->get('diskripsi');
        $lampiran->saran = $request->get('saran');
        $lampiran->save();

        return redirect()->route('lampirans.create')->with('toast_success', 'Task Created Successfully!');
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
        $data = Lampiran2pkb::findOrFail($id);

        return view('lampirans.edit',   ['data' => $data
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
        $validator = Validator::make($request->all(), [
            "jenis" => "required",
            "kode" => "required",
            "diskripsi" => "required",
            "saran" => "required"
        ]);




        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }


        // return $request;
        $lampiran =  Lampiran2pkb::findOrFail($id);
        $lampiran->jenis = $request->get('jenis');
        $lampiran->kode = $request->get('kode');
        $lampiran->diskripsi = $request->get('diskripsi');
        $lampiran->saran = $request->get('saran');
        $lampiran->Update();

        return redirect()->route('lampirans.index')->with('toast_success', 'Task Created Successfully!');

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
        $data = Lampiran2pkb::findOrFail($id);
        $data->delete();
        return redirect()->route('lampirans.index')->with('toast_success', 'Task Delete Successfully!');

    }
}
