<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Carbon\Carbon;



class SettingController extends Controller
{
    //
    public function index()
    {
        //
        $settings = Setting::get();
        $count = Setting::count();

        $i=0;
        // dd($setting);
        return view('settings.index', ['data' => $settings,'count' => $count,'i'=>$i]);
    }

    public function create()
    {
        //
        $settings = Setting::get();
        $count = Setting::count();

        return view("settings.create",[ 'settings' => $settings,
                                            'count' => $count,
                                        ]);
    }

    public function store1(Request $request)
    {

        // dd($input);
        $input = $request->all();
        $input['tgl_berita_acara_atas'] = Carbon::parse($request->get('tgl_berita_acara_atas'));
        $input['tgl_berita_acara_ttd'] = Carbon::parse($request->get('tgl_berita_acara_ttd'));
        $input['tgl_hapak_atas'] = Carbon::parse($request->get('tgl_hapak_atas'));
        $input['awal_hapak'] = Carbon::parse($request->get('awal_hapak'));
        $input['akhir_hapak'] = Carbon::parse($request->get('akhir_hapak'));
        $input['tgl_hapak_ttd'] = Carbon::parse($request->get('tgl_hapak_ttd'));
        $input['tgl_pak_ttd'] = Carbon::parse($request->get('tgl_pak_ttd'));


        $setting = Setting::create($input);

        return redirect()->route('settings.index')
                        ->with('success','Setting created successfully');
    }

    public function edit()
    {
        //
        $settings = Setting::first();
        $count = Setting::count();

        // dd($settings);


        return view("settings.edit",[ 'settings' => $settings,
                                            'count' => $count,
                                        ]);
    }

    public function update(Request $request, $id)
    {

        $input = $request->all();
        $input['tgl_berita_acara_atas'] = Carbon::parse($request->get('tgl_berita_acara_atas'));
        $input['tgl_berita_acara_ttd'] = Carbon::parse($request->get('tgl_berita_acara_ttd'));
        $input['tgl_hapak_atas'] = Carbon::parse($request->get('tgl_hapak_atas'));
        $input['awal_hapak'] = Carbon::parse($request->get('awal_hapak'));
        $input['akhir_hapak'] = Carbon::parse($request->get('akhir_hapak'));
        $input['tgl_hapak_ttd'] = Carbon::parse($request->get('tgl_hapak_ttd'));
        $input['tgl_pak_ttd'] = Carbon::parse($request->get('tgl_pak_ttd'));
        $input['tgl_akhir'] = Carbon::parse($request->get('tgl_akhir'));

        // dd($input);
        $setting = Setting::find($id);
        $setting->update($input);

        return redirect()->route('settings.index')
                        ->with('success','Setting created successfully');
    }

}
