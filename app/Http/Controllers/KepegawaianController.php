<?php

namespace App\Http\Controllers;

use App\Models\Kepegawaian;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $data = Kepegawaian::where('user_id', Auth::user()->id)->get();
        $count = Kepegawaian::where('user_id', Auth::user()->id)->count();

        $i = 0;
        return view('kepegawaians.index', ['data' => $data, 'count' => $count, 'i' => $i]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $count = Kepegawaian::where('user_id', Auth::user()->id)->count();
        if ($count > 0) {
            return back()->with('error', 'Anda Sudah Melakukan Upload Berkas Silahkan Edit Berkas Yg ada');
        }
        $nip = Auth::user()->nip;
        $tahun_nip = substr($nip, 8, 4);
        //19891109 201708
        $tahun_nip_ggd = substr($nip, 8, 6);

        return view("kepegawaians.create", ['tahun_nip' => $tahun_nip,
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

        $this->validate($request, [
            'sk_cpns' => 'required|mimes:pdf|max:2048',
            'sk_pangkat' => 'required|mimes:pdf|max:2048',
            'sk_jafung' => 'required|mimes:pdf|max:2048',
            'ijazah' => 'required|mimes:pdf|max:2048',
            'karpeg' => 'required|mimes:pdf|max:2048',
            'sk_penyesuaian' => 'mimes:pdf|max:2048',
            'serdik' => 'mimes:pdf|max:2048',
        ]);

        $input = $request->all();
        // dd($input);
        if ($request->file('sk_cpns')) {
            $image = $request->file('sk_cpns');
            $profileImage = 'sk_cpns_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
            $input['sk_cpns'] = 'kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
        }

        if ($request->file('sk_pangkat')) {
            $image = $request->file('sk_pangkat');
            $profileImage = 'sk_pangkat_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
            $input['sk_pangkat'] = 'kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
        }

        if ($request->file('sk_jafung')) {
            $image = $request->file('sk_jafung');
            $profileImage = 'sk_jafung_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
            $input['sk_jafung'] = 'kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
        }

        if ($request->file('ijazah')) {
            $image = $request->file('ijazah');
            $profileImage = 'ijazah_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
            $input['ijazah'] = 'kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
        }

        if ($request->file('karpeg')) {
            $image = $request->file('karpeg');
            $profileImage = 'karpeg_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
            $input['karpeg'] = 'kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
        }

        if ($request->file('sk_penyesuaian')) {
            $image = $request->file('sk_penyesuaian');
            $profileImage = 'sk_penyesuaian_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
            $input['sk_penyesuaian'] = 'kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
        }

        if ($request->file('serdik')) {
            $image = $request->file('serdik');
            $profileImage = 'serdik_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
            $input['serdik'] = 'kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
        }

        // dd($input);
        $input['user_id'] = Auth::user()->id;
        $pak = Kepegawaian::create($input);
        // dd($pak);

        return redirect()->route('kepegawaians.index')
            ->with('success', 'berkas kepegawaian created successfully');
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
        return view('kepegawaians.edit', compact('kepegawaian'));
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
        $this->validate($request, [
            'sk_cpns' => 'mimes:pdf|max:2048',
            'sk_pangkat' => 'mimes:pdf|max:2048',
            'sk_jafung' => 'mimes:pdf|max:2048',
            'ijazah' => 'mimes:pdf|max:2048',
            'karpeg' => 'mimes:pdf|max:2048',
            'serdik' => 'mimes:pdf|max:2048',
        ]);

        $input = $request->all();

        if (File::exists(public_path('storage/' . $kepegawaian->sk_cpns))) {
            if ($image = $request->file('sk_cpns')) {
                if ($kepegawaian->sk_cpns == null) {
                } else {
                    unlink(public_path('storage/' . $kepegawaian->sk_cpns));
                }
                $profileImage = 'sk_cpns_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->storeAs('public/kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                $input['sk_cpns'] = 'kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
            } else {
                unset($input['sk_cpns']);
            }

        } else {
            if ($image = $request->file('sk_cpns')) {
                $profileImage = 'sk_cpns_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->storeAs('public/berkas/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                $input['sk_cpns'] = 'berkas/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
            } else {
                unset($input['sk_cpns']);
            }
        }

        if (File::exists(public_path('storage/' . $kepegawaian->sk_pangkat))) {
            if ($image = $request->file('sk_pangkat')) {
                if ($kepegawaian->sk_pangkat == null) {
                } else {
                    unlink(public_path('storage/' . $kepegawaian->sk_pangkat));
                }
                $profileImage = 'sk_pangkat_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->storeAs('public/kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                $input['sk_pangkat'] = 'kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
            } else {
                unset($input['sk_pangkat']);
            }

        } else {
            if ($image = $request->file('sk_pangkat')) {
                $profileImage = 'sk_pangkat_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->storeAs('public/berkas/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                $input['sk_pangkat'] = 'berkas/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
            } else {
                unset($input['sk_pangkat']);
            }
        }

        if (File::exists(public_path('storage/' . $kepegawaian->sk_jafung))) {
            if ($image = $request->file('sk_jafung')) {
                if ($kepegawaian->sk_jafung == null) {
                } else {
                    unlink(public_path('storage/' . $kepegawaian->sk_jafung));
                }
                $profileImage = 'sk_jafung_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->storeAs('public/kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                $input['sk_jafung'] = 'kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
            } else {
                unset($input['sk_jafung']);
            }

        } else {
            if ($image = $request->file('sk_jafung')) {
                $profileImage = 'sk_jafung_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->storeAs('public/berkas/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                $input['sk_jafung'] = 'berkas/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
            } else {
                unset($input['sk_jafung']);
            }
        }

        if (File::exists(public_path('storage/' . $kepegawaian))) {
            if ($image = $request->file('ijazah')) {
                if ($kepegawaian == null) {
                } else {
                    unlink(public_path('storage/' . $kepegawaian));
                }
                $profileImage = 'ijazah_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->storeAs('public/kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                $input['ijazah'] = 'kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
            } else {
                unset($input['ijazah']);
            }

        } else {
            if ($image = $request->file('ijazah')) {
                $profileImage = 'ijazah_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->storeAs('public/berkas/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                $input['ijazah'] = 'berkas/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
            } else {
                unset($input['ijazah']);
            }
        }

        if (File::exists(public_path('storage/' . $kepegawaian->ijazah))) {
            if ($image = $request->file('karpeg')) {
                if ($kepegawaian->ijazah == null) {
                } else {
                    unlink(public_path('storage/' . $kepegawaian->ijazah));
                }
                $profileImage = 'karpeg_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->storeAs('public/kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                $input['karpeg'] = 'kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
            } else {
                unset($input['karpeg']);
            }

        } else {
            if ($image = $request->file('karpeg')) {
                $profileImage = 'karpeg_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->storeAs('public/berkas/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                $input['karpeg'] = 'berkas/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
            } else {
                unset($input['karpeg']);
            }
        }

        if (File::exists(public_path('storage/' . $kepegawaian->sk_penyesuaian))) {
            if ($image = $request->file('sk_penyesuaian')) {
                if ($kepegawaian->sk_penyesuaian == null) {
                } else {
                    unlink(public_path('storage/' . $kepegawaian->sk_penyesuaian));
                }
                $profileImage = 'sk_penyesuaian_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->storeAs('public/kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                $input['sk_penyesuaian'] = 'kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
            } else {
                unset($input['sk_penyesuaian']);
            }

        } else {
            if ($image = $request->file('sk_penyesuaian')) {
                $profileImage = 'sk_penyesuaian_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->storeAs('public/berkas/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                $input['sk_penyesuaian'] = 'berkas/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
            } else {
                unset($input['sk_penyesuaian']);
            }
        }


         if (File::exists(public_path('storage/' . $kepegawaian->serdik))) {
            if ($image = $request->file('serdik')) {
                if ($kepegawaian->serdik == null) {
                } else {
                    unlink(public_path('storage/' . $kepegawaian->serdik));
                }
                $profileImage = 'serdik_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->storeAs('public/kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                $input['serdik'] = 'kepegawaian/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
            } else {
                unset($input['serdik']);
            }

        } else {
            if ($image = $request->file('serdik')) {
                $profileImage = 'serdik_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->storeAs('public/berkas/' . Carbon::now()->format('Y') . '/' . Auth::user()->username, $profileImage);
                $input['serdik'] = 'berkas/' . Carbon::now()->format('Y') . '/' . Auth::user()->username . "/" . $profileImage;
            } else {
                unset($input['serdik']);
            }
        }

        // dd($input);
        $input['user_id'] = Auth::user()->id;
        // dd($input);

        $data = Kepegawaian::find($kepegawaian->id);
        $data->update($input);

        return redirect()->route('kepegawaians.index')
            ->with('success', 'berkas kepegawaian created successfully');
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
