<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;


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

        $setting = Setting::create($input);

        return redirect()->route('settings.index')
                        ->with('success','Setting created successfully');
    }

    public function edit()
    {
        //
        $settings = Setting::get();
        $count = Setting::count();

        return view("settings.create",[ 'settings' => $settings,
                                            'count' => $count,
                                        ]);
    }
}
