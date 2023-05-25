<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\pak;
use App\Models\Pendidikan;
use App\Models\Setting;
use App\Models\user;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PDF;

class PakController extends Controller
{
    public function confirm_terbit(Request $request, $pak_id)
    {
        //

        // dd($data);
        $pak = Pak::find($pak_id);
        $pak->update(
            [
                'status' => 'Terbit',
            ]
        );
        return back()->with('success', 'Terbit');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Pak::orderBy('id', 'asc')->where('user_id', Auth::user()->id)->where('status', '!=', 'terbit')->get();
        $i = 0;
        return view('paks.index', ['data' => $data, 'i' => $i]);
    }

    public function riwayat()
    {
        //
        $data = Pak::orderBy('id', 'asc')->where('user_id', Auth::user()->id)->where('status', 'Terbit')->get();

        // $data = Pak::orderBy('id', 'asc')->where('user_id', Auth::user()->id)->get();
        $i = 0;
        return view('paks.riwayat', ['data' => $data, 'i' => $i]);
    }

    public function cetak_draf_pak($pak_id)
    {
        $data = DB::table('paks')
            ->join('users', 'users.id', '=', 'paks.user_id')
            ->where('paks.id', $pak_id)
            ->first();

        // $pangkat = Jabatan::find($data->pangkat_golongan);
        $pangkat = Jabatan::find($data->pangkat_golongan);

        $settings = Setting::first();

        $pdf = PDF::loadView('pdf.draft_pak', [
            'pak' => $data,
            'pangkat' => $pangkat,
            'settings' => $settings,
        ]);

        return $pdf->stream('draf_PAK.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = Pak::orderBy('id', 'asc')->where('user_id', Auth::user()->id)->where('status', '!=', 'terbit')->count();

        return view('paks.create', ['cek_pak' => $data]);
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
        // dd(Auth::user()->id);
        $data = Pak::orderBy('id', 'asc')->where('user_id', Auth::user()->id)->where('status', '!=', 'terbit')->count();

        if ($data = 0) {
            $this->validate($request, [
                'awal' => 'required',
                'akhir' => 'required',
                'pendidikan_sekolah' => 'required|numeric',
                'pelatihan_prajabatan' => 'required|numeric',
                'proses_pembelajaran' => 'required|numeric',
                'proses_bimbingan' => 'required|numeric',
                'tugas_lain' => 'required|numeric',
                'pengembangan_diri' => 'required|numeric',
                'publikasi_ilmiah' => 'required|numeric',
                'karya_inovatif' => 'required|numeric',
                'ijazah_tidak_sesuai' => 'required|numeric',
                'pendukung_tugas_guru' => 'required|numeric',
                'memperoleh_penghargaan' => 'required|numeric',
                'surat_pengantar' => 'mimes:pdf|max:10048',
                'tidak_dihukum' => 'mimes:pdf|max:10048',
                'dupak' => 'mimes:pdf|max:10048',
                'surat_pembelajaran' => 'mimes:pdf|max:10048',
                'surat_bimbingan_tertentu' => 'mimes:pdf|max:10048',
                'surat_penunjang' => 'mimes:pdf|max:10048',
                'surat_pkb' => 'mimes:pdf|max:10048',
                'sk_ganjil' => 'mimes:pdf|max:10048',
                'sk_genap' => 'mimes:pdf|max:10048',
                'scan_pak' => 'required|mimes:pdf|max:10048',
                'pkg' => 'mimes:pdf|max:10048',
                'skp' => 'mimes:pdf|max:10048',
            ]);

        } else {
            $this->validate($request, [
                'awal' => 'required',
                'akhir' => 'required',
                'surat_pengantar' => 'mimes:pdf|max:10048',
                'tidak_dihukum' => 'mimes:pdf|max:10048',
                'dupak' => 'mimes:pdf|max:10048',
                'surat_pembelajaran' => 'mimes:pdf|max:10048',
                'surat_bimbingan_tertentu' => 'mimes:pdf|max:10048',
                'surat_penunjang' => 'mimes:pdf|max:10048',
                'surat_pkb' => 'mimes:pdf|max:10048',
                'sk_ganjil' => 'mimes:pdf|max:10048',
                'sk_genap' => 'mimes:pdf|max:10048',
                'scan_pak' => 'required|mimes:pdf|max:10048',
                'pkg' => 'mimes:pdf|max:10048',
                'skp' => 'mimes:pdf|max:10048',
            ]);

        }

        $input = $request->all();
        if ($request->file('surat_pengantar')) {
            $image = $request->file('surat_pengantar');
            $profileImage = 'surat_pengantar_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
            $input['surat_pengantar'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
        }

        if ($request->file('tidak_dihukum')) {
            $image = $request->file('tidak_dihukum');
            $profileImage = 'tidak_dihukum' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
            $input['tidak_dihukum'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
        }

        if ($request->file('dupak')) {
            $image = $request->file('dupak');
            $profileImage = 'dupak' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
            $input['dupak'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
        }

        if ($request->file('surat_pembelajaran')) {
            $image = $request->file('surat_pembelajaran');
            $profileImage = 'surat_pembelajaran' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
            $input['surat_pembelajaran'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
        }

        if ($request->file('surat_bimbingan_tertentu')) {
            $image = $request->file('surat_bimbingan_tertentu');
            $profileImage = 'surat_bimbingan_tertentu' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
            $input['surat_bimbingan_tertentu'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
        }

        if ($image = $request->file('surat_penunjang')) {
            $request->file('surat_penunjang');
            $profileImage = 'surat_penunjang' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
            $input['surat_penunjang'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
        }

        if ($request->file('surat_pkb')) {
            $image = $request->file('surat_pkb');
            $profileImage = 'surat_pkb' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
            $input['surat_pkb'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
        }

        if ($request->file('sk_ganjil')) {
            $image = $request->file('sk_ganjil');
            $profileImage = 'sk_ganjil' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
            $input['sk_ganjil'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
        }

        if ($image = $request->file('sk_genap')) {
            $image = $request->file('sk_genap');
            $profileImage = 'sk_genap' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
            $input['sk_genap'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
        }

        if ($image = $request->file('scan_pak')) {
            $image = $request->file('scan_pak');
            $profileImage = 'scan_pak' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
            $input['scan_pak'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
        }

        if ($image = $request->file('pkg')) {
            $image = $request->file('pkg');
            $profileImage = 'pkg' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
            $input['pkg'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
        }

        if ($image = $request->file('skp')) {
            $image = $request->file('skp');
            $profileImage = 'skp' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
            $input['skp'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
        }

        $input['awal'] = Carbon::parse($request->get('awal'))->format('Y-m-d');
        $input['akhir'] = Carbon::parse($request->get('akhir'))->format('Y-m-d');
        $input['user_id'] = Auth::user()->id;
        $input['status'] = 'submit';

        // dd($input);
        $pak = Pak::create($input);

        return redirect()->route('paks.index')
            ->with('success', 'Dupak created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pak  $pak
     * @return \Illuminate\Http\Response
     */
    public function show(pak $pak)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pak  $pak
     * @return \Illuminate\Http\Response
     */
    public function edit(pak $pak)
    {
        //
        // $user = User::find($id);
        // $data = DB::table('users')
        //     ->join('paks', 'users.id', '=', 'paks.user_id')
        //     ->select('users.name', 'paks.*')
        //     ->where('paks.id',$pak->id)
        //     ->first();
        $data = $pak;

        // dd($data);

        return view('paks.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pak  $pak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pak $pak)
    {
        //
        if ($request->get('pra_jabatan')) {
            $this->validate($request, [
                'awal' => 'required',
                'akhir' => 'required',
                'pendidikan_sekolah' => 'required|numeric',
                'pelatihan_prajabatan' => 'required|numeric',
                'proses_pembelajaran' => 'required|numeric',
                'proses_bimbingan' => 'required|numeric',
                'tugas_lain' => 'required|numeric',
                'pengembangan_diri' => 'required|numeric',
                'publikasi_ilmiah' => 'required|numeric',
                'karya_inovatif' => 'required|numeric',
                'ijazah_tidak_sesuai' => 'required|numeric',
                'pendukung_tugas_guru' => 'required|numeric',
                'memperoleh_penghargaan' => 'required|numeric',
                'surat_pengantar' => 'mimes:pdf|max:10048',
                'tidak_dihukum' => 'mimes:pdf|max:10048',
                'dupak' => 'mimes:pdf|max:10048',
                'surat_pembelajaran' => 'mimes:pdf|max:10048',
                'surat_bimbingan_tertentu' => 'mimes:pdf|max:10048',
                'surat_penunjang' => 'mimes:pdf|max:10048',
                'surat_pkb' => 'mimes:pdf|max:10048',
                'sk_ganjil' => 'mimes:pdf|max:10048',
                'sk_genap' => 'mimes:pdf|max:10048',
                'scan_pak' => 'mimes:pdf|max:10048',
                'pkg' => 'mimes:pdf|max:10048',
                'skp' => 'mimes:pdf|max:10048',
            ]);

        } else {
            $this->validate($request, [
                'awal' => 'required',
                'akhir' => 'required',
                'surat_pengantar' => 'mimes:pdf|max:10048',
                'tidak_dihukum' => 'mimes:pdf|max:10048',
                'dupak' => 'mimes:pdf|max:10048',
                'surat_pembelajaran' => 'mimes:pdf|max:10048',
                'surat_bimbingan_tertentu' => 'mimes:pdf|max:10048',
                'surat_penunjang' => 'mimes:pdf|max:10048',
                'surat_pkb' => 'mimes:pdf|max:10048',
                'sk_ganjil' => 'mimes:pdf|max:10048',
                'sk_genap' => 'mimes:pdf|max:10048',
                'scan_pak' => 'mimes:pdf|max:10048',
                'pkg' => 'mimes:pdf|max:10048',
                'skp' => 'mimes:pdf|max:10048',
            ]);

        }

        $input = $request->all();

        // dd($input);

        if ($image = $request->file('surat_pengantar')) {
            if (File::exists(public_path('storage/' . $pak->surat_pengantar))) {
                if ($image = $request->file('surat_pengantar')) {
                    if ($pak->surat_pengantar == null) {
                    } else {
                        unlink(public_path('storage/' . $pak->surat_pengantar));
                    }
                    $profileImage = 'surat_pengantar_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['surat_pengantar'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['surat_pengantar']);
                }
            } else {
                if ($image = $request->file('surat_pengantar')) {
                    $profileImage = 'surat_pengantar_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['surat_pengantar'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['surat_pengantar']);
                }
            }
        }

        if ($image = $request->file('tidak_dihukum')) {
            if (File::exists(public_path('storage/' . $pak->tidak_dihukum))) {
                if ($image = $request->file('tidak_dihukum')) {
                    if ($pak->tidak_dihukum == null) {
                    } else {
                        unlink(public_path('storage/' . $pak->tidak_dihukum));
                    }
                    $profileImage = 'tidak_dihukum_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['tidak_dihukum'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['tidak_dihukum']);
                }
            } else {
                if ($image = $request->file('tidak_dihukum')) {
                    $profileImage = 'tidak_dihukum_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['tidak_dihukum'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['tidak_dihukum']);
                }
            }
        }

        if ($image = $request->file('dupak')) {
            if (File::exists(public_path('storage/' . $pak->dupak))) {
                if ($image = $request->file('dupak')) {
                    if ($pak->dupak == null) {
                    } else {
                        unlink(public_path('storage/' . $pak->dupak));
                    }
                    $profileImage = 'dupak_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['dupak'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['dupak']);
                }
            } else {
                if ($image = $request->file('dupak')) {
                    $profileImage = 'dupak_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['dupak'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['dupak']);
                }
            }
        }

        if ($image = $request->file('surat_pembelajaran')) {
            if (File::exists(public_path('storage/' . $pak->surat_pembelajaran))) {
                if ($image = $request->file('surat_pembelajaran')) {
                    if ($pak->surat_pembelajaran == null) {
                    } else {
                        unlink(public_path('storage/' . $pak->surat_pembelajaran));
                    }
                    $profileImage = 'surat_pembelajaran_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['surat_pembelajaran'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['surat_pembelajaran']);
                }
            } else {
                if ($image = $request->file('surat_pembelajaran')) {
                    $profileImage = 'surat_pembelajaran_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['surat_pembelajaran'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['surat_pembelajaran']);
                }
            }
        }

        if ($image = $request->file('surat_bimbingan_tertentu')) {
            if (File::exists(public_path('storage/' . $pak->surat_bimbingan_tertentu))) {
                if ($image = $request->file('surat_bimbingan_tertentu')) {
                    if ($pak->surat_bimbingan_tertentu == null) {
                    } else {
                        unlink(public_path('storage/' . $pak->surat_bimbingan_tertentu));
                    }
                    $profileImage = 'surat_bimbingan_tertentu_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['surat_bimbingan_tertentu'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['surat_bimbingan_tertentu']);
                }
            } else {
                if ($image = $request->file('surat_bimbingan_tertentu')) {
                    $profileImage = 'surat_bimbingan_tertentu_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['surat_bimbingan_tertentu'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['surat_bimbingan_tertentu']);
                }
            }
        }

        if ($image = $request->file('surat_penunjang')) {
            if (File::exists(public_path('storage/' . $pak->surat_penunjang))) {
                if ($image = $request->file('surat_penunjang')) {
                    if ($pak->surat_penunjang == null) {
                    } else {
                        unlink(public_path('storage/' . $pak->surat_penunjang));
                    }
                    $profileImage = 'surat_penunjang_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['surat_penunjang'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['surat_penunjang']);
                }
            } else {
                if ($image = $request->file('surat_penunjang')) {
                    $profileImage = 'surat_penunjang_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['surat_penunjang'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['surat_penunjang']);
                }
            }
        }

        if ($image = $request->file('surat_pkb')) {
            if (File::exists(public_path('storage/' . $pak->surat_pkb))) {
                if ($image = $request->file('surat_pkb')) {
                    if ($pak->surat_pkb == null) {
                    } else {
                        unlink(public_path('storage/' . $pak->surat_pkb));
                    }
                    $profileImage = 'surat_pkb_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['surat_pkb'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['surat_pkb']);
                }
            } else {
                if ($image = $request->file('surat_pkb')) {
                    $profileImage = 'surat_pkb_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['surat_pkb'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['surat_pkb']);
                }
            }
        }

        if ($image = $request->file('sk_ganjil')) {
            if (File::exists(public_path('storage/' . $pak->sk_ganjil))) {
                if ($image = $request->file('sk_ganjil')) {
                    if ($pak->sk_ganjil == null) {
                    } else {
                        unlink(public_path('storage/' . $pak->sk_ganjil));
                    }
                    $profileImage = 'sk_ganjil_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['sk_ganjil'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['sk_ganjil']);
                }
            } else {
                if ($image = $request->file('sk_ganjil')) {
                    $profileImage = 'sk_ganjil_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['sk_ganjil'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['sk_ganjil']);
                }
            }
        }

        if ($image = $request->file('sk_genap')) {
            if (File::exists(public_path('storage/' . $pak->sk_genap))) {
                if ($image = $request->file('sk_genap')) {
                    if ($pak->sk_genap == null) {
                    } else {
                        unlink(public_path('storage/' . $pak->sk_genap));
                    }
                    $profileImage = 'sk_genap_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['sk_genap'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['sk_genap']);
                }
            } else {
                if ($image = $request->file('sk_genap')) {
                    $profileImage = 'sk_genap_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['sk_genap'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['sk_genap']);
                }
            }
        }

        if ($image = $request->file('scan_pak')) {
            if (File::exists(public_path('storage/' . $pak->scan_pak))) {
                if ($image = $request->file('scan_pak')) {
                    if ($pak->scan_pak == null) {
                    } else {
                        unlink(public_path('storage/' . $pak->scan_pak));
                    }
                    $profileImage = 'scan_pak_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['scan_pak'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['scan_pak']);
                }
            } else {
                if ($image = $request->file('scan_pak_')) {
                    $profileImage = 'scan_pak_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['scan_pak'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['scan_pak']);
                }
            }
        }

        if ($image = $request->file('pkg')) {
            if (File::exists(public_path('storage/' . $pak->pkg))) {
                if ($image = $request->file('pkg')) {
                    if ($pak->pkg == null) {
                    } else {
                        unlink(public_path('storage/' . $pak->pkg));
                    }
                    $profileImage = 'pkg_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['pkg'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['pkg']);
                }
            } else {
                if ($image = $request->file('pkg')) {
                    $profileImage = 'pkg_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['pkg'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['pkg']);
                }
            }
        }

        if ($image = $request->file('skp')) {
            if (File::exists(public_path('storage/' . $pak->skp))) {
                if ($image = $request->file('skp')) {
                    if ($pak->skp == null) {
                    } else {
                        unlink(public_path('storage/' . $pak->skp));
                    }
                    $profileImage = 'skp_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['skp'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['skp']);
                }
            } else {
                if ($image = $request->file('skp')) {
                    $profileImage = 'skp_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->storeAs('public/dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                    $input['skp'] = 'dupak/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
                } else {
                    unset($input['skp']);
                }
            }
        }

        $input['awal'] = Carbon::parse($request->get('awal'))->format('Y-m-d');
        $input['akhir'] = Carbon::parse($request->get('akhir'))->format('Y-m-d');
        $input['user_id'] = Auth::user()->id;
        // $input['status'] = 'submit';

        // dd($input);
        // $data = Pak::update($input);
        $data = Pak::find($pak->id);
        $data->update($input);

        $user = User::find(Auth::user()->id);
        // $user->update( [
        //     'status_naik_pangkat' => 'PAK TAHUNAN',
        //     ]
        // );

        $user->update();

        return redirect()->route('paks.edit', $data)
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pak  $pak
     * @return \Illuminate\Http\Response
     */
    public function destroy(pak $pak)
    {
        //
        $lampiran = Pendidikan::where('pak_id', $pak->id)->count();
        if ($lampiran > 0) {
            return redirect()->back()
                ->with('error', 'Masih ada Lampiran pada dupak ini silahkan hapus terlebih dahulu');
        }

        // dd(public_path('storage/'.$pak->surat_pengantar));
        if (File::exists(public_path('storage/' . $pak->surat_pengantar))) {
            if ($pak->surat_pengantar == null) {
            } else {
                unlink(public_path('storage/' . $pak->surat_pengantar));
            }
        }

        if (File::exists(public_path('storage/' . $pak->tidak_dihukum))) {
            if ($pak->tidak_dihukum == null) {
            } else {
                unlink(public_path('storage/' . $pak->tidak_dihukum));
            }
        }
        if (File::exists(public_path('storage/' . $pak->surat_pembelajaran))) {
            if ($pak->surat_pembelajaran == null) {
            } else {
                unlink(public_path('storage/' . $pak->surat_pembelajaran));
            }
        }

        if (File::exists(public_path('storage/' . $pak->surat_bimbingan_tertentu))) {
            if ($pak->surat_bimbingan_tertentu == null) {
            } else {
                unlink(public_path('storage/' . $pak->surat_bimbingan_tertentu));
            }
        }

        if (File::exists(public_path('storage/' . $pak->surat_penunjang))) {
            if ($pak->surat_penunjang == null) {
            } else {
                unlink(public_path('storage/' . $pak->surat_penunjang));
            }
        }

        if (File::exists(public_path('storage/' . $pak->surat_pkb))) {
            if ($pak->surat_pkb == null) {
            } else {
                unlink(public_path('storage/' . $pak->surat_pkb));
            }
        }
        if (File::exists(public_path('storage/' . $pak->sk_ganjil))) {
            if ($pak->sk_ganjil == null) {
            } else {
                unlink(public_path('storage/' . $pak->sk_ganjil));
            }
        }

        if (File::exists(public_path('storage/' . $pak->sk_genap))) {
            if ($pak->sk_genap == null) {
            } else {
                unlink(public_path('storage/' . $pak->sk_genap));
            }
        }

        if (File::exists(public_path('storage/' . $pak->scan_pak))) {
            if ($pak->scan_pak == null) {
            } else {
                unlink(public_path('storage/' . $pak->scan_pak));
            }
        }

        if (File::exists(public_path('storage/' . $pak->pkg))) {
            if ($pak->pkg == null) {
            } else {
                unlink(public_path('storage/' . $pak->pkg));
            }
        }
        if (File::exists(public_path('storage/' . $pak->skp))) {
            if ($pak->skp == null) {
            } else {
                unlink(public_path('storage/' . $pak->skp));
            }
        }

        if (File::exists(public_path('storage/' . $pak->dupak))) {
            if ($pak->dupak == null) {
            } else {
                unlink(public_path('storage/' . $pak->dupak));
            }
        }

        pak::find($pak->id)->delete();
        return redirect()->route('paks.index')
            ->with('success', 'User deleted successfully');
    }

}
