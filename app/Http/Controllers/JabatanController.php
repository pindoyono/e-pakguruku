<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jabatans = Jabatan::orderBy('target','asc')->get();
        return view('jabatans.index', ['jabatans' => $jabatans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("jabatans.create");
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
            "jabatan" => "required",
            "pangkat" => "required",
            "target" => "required|numeric",
            "target_sebelum" => "required|numeric",
            "akk" => "required|numeric",
            "akpkbpd" => "required|numeric",
            "akpkbpiki" => "required|numeric",
            "akp" => "required|numeric"
        ]);

        // return $request;
        $jabatan = new Jabatan;
        $jabatan->jabatan = $request->get('jabatan');
        $jabatan->pangkat = $request->get('pangkat');
        $jabatan->target = $request->get('target');
        $jabatan->target_sebelum = $request->get('target_sebelum');
        $jabatan->akk = $request->get('akk');
        $jabatan->akpkbpd = $request->get('akpkbpd');
        $jabatan->akpkbpiki = $request->get('akpkbpiki');
        $jabatan->akp = $request->get('akp');
        $jabatan->save();

        return redirect()->route('jabatans.index')->with('success','User created successfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        //

        return view('jabatans.edit',   ['jabatans' => $jabatan
                                    ]
                                );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        //
        $this->validate($request, [
            "jabatan" => "required",
            "pangkat" => "required",
            "target" => "required|numeric",
            "target_sebelum" => "required|numeric",
            "akk" => "required|numeric",
            "akpkbpd" => "required|numeric",
            "akpkbpiki" => "required|numeric",
            "akp" => "required|numeric"
        ]);



        // return $request;
        $jabatan->jabatan = $request->get('jabatan');
        $jabatan->pangkat = $request->get('pangkat');
        $jabatan->target = $request->get('target');
        $jabatan->target_sebelum = $request->get('target_sebelum');
        $jabatan->akk = $request->get('akk');
        $jabatan->akpkbpd = $request->get('akpkbpd');
        $jabatan->akpkbpiki = $request->get('akpkbpiki');
        $jabatan->akp = $request->get('akp');
        $jabatan->update();

        return redirect()->route('jabatans.index')->with('success','User created successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        //
        $jabatan->delete();
        return redirect()->route('jabatans.index')->with('success','User created successfully');;
    }
}
