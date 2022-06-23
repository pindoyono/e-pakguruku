<?php

namespace App\Http\Controllers;

use App\Models\Ba_jurnal;
use Illuminate\Http\Request;
use Auth;

class BaJurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pak_id)
    {
        //
        // dd($pak_id);
        $data = Ba_jurnal::where('pak_id',$pak_id)->get();
        // dd($data);
        return view('ba_jurnals.index', [
            'data' => $data,
            'i' => $i=0,
            'pak_id' => $pak_id,
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
    public function store(Request $request,$pak_id)
    {
        //

        $this->validate($request,  [
            "judul" => "required",
        ]);


        // dd($request->all());

        // if ($validator->fails()) {
        //     return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        // }


        // return $request;
        $lampiran = new Ba_jurnal;
        $lampiran->judul = $request->get('judul');
        $lampiran->pak_id = $pak_id;
        $lampiran->penilai_id = Auth::user()->id;
        $lampiran->save();

        return redirect()->route('ba_jurnals.index',$pak_id)->with('toast_success', 'Task Created Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ba_jurnal  $ba_jurnal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data =  Ba_jurnal::find($id);
        $data->delete();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ba_jurnal  $ba_jurnal
     * @return \Illuminate\Http\Response
     */
    public function edit(Ba_jurnal $ba_jurnal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ba_jurnal  $ba_jurnal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ba_jurnal $ba_jurnal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ba_jurnal  $ba_jurnal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Ba_jurnal::findOrFail($id);
        $data->delete();
        return back()->with('toast_success', 'Task Delete Successfully!');
    }
}
