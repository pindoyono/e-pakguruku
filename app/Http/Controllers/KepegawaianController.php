<?php

namespace App\Http\Controllers;

use App\Models\Kepegawaian;
use Illuminate\Http\Request;
use Auth;

class KepegawaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Kepegawaian::where('user_id',Auth::user()->id)->get();
        $count = Kepegawaian::where('user_id',Auth::user()->id)->count();
        $i=0;
        return view('kepegawaians.index', ['data' => $data,'count' => $count,'i'=>$i]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $nip = Auth::user()->nip;
        $tahun_nip = substr($nip,8,4);
        //19891109 201708
        $tahun_nip_ggd = substr($nip,8,6);

        return view("kepegawaians.create",[ 'tahun_nip' => $tahun_nip,
                                            'tahun_nip_ggd' => $tahun_nip_ggd,
                                        ]);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kepegawaian  $kepegawaian
     * @return \Illuminate\Http\Response
     */
    public function show(Kepegawaian $kepegawaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kepegawaian  $kepegawaian
     * @return \Illuminate\Http\Response
     */
    public function edit(Kepegawaian $kepegawaian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kepegawaian  $kepegawaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kepegawaian $kepegawaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kepegawaian  $kepegawaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kepegawaian $kepegawaian)
    {
        //
    }
}
