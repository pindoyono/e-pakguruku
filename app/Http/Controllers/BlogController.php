<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('paks')
            ->join('users', 'users.id', '=', 'paks.user_id')
        // ->select('users.*', 'paks.*')
            ->select('users.name as NAMA', 'users.status_naik_pangkat as STATUS NAIK PANGKAT', 'users.sekolah as SEKOLAH', 'paks.created_at as TANGGAL BUAT', 'paks.status as STATUS USULAN DUPAK')
            ->orderBy('users.name', 'asc')
            ->where('users.status_naik_pangkat', 'NAIK PANGKAT')
            ->where(DB::raw('YEAR(paks.created_at)'), '>=', '2023')
            ->where(DB::raw('MONTH(paks.created_at)'), '>', '4')
            ->get();
        return [

            "data" => $data,

        ];

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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
