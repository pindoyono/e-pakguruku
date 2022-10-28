<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Jabatan;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Auth;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Crypt;

use Vinkla\Hashids\HashidsManager;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $data = User::orderBy('id','DESC')->paginate(5);
        // return view('users.index',compact('data'))
        //     ->with('i', ($request->input('page', 1) - 1) * 5);
        $data = User::orderBy('id','DESC')->get();
        $i=0;
        return view('users.index', ['data' => $data,'i'=>$i]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::pluck('name','name')->all();
        $jabatan = Jabatan::orderBy('id','asc')->get();
        return view('users.create',compact('roles','jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all('sekolah'));
        // $createdAt = Carbon::parse($request->get('tanggal_lahir'));
        // dd($createdAt->format('Y-m-d'));

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
                'agama' => 'required',
                'wilayah_kerja' => 'required',
                'pangkat_golongan' => 'required',
                'username' => 'required|unique:users,username',
                'pendidikan' => 'required',
                'jenis_guru' => 'required',
                'tugas_tambahan' => 'required',
                'jenis_kelamin' => 'required',
                'alamat_sekolah' => 'required',
                'alamat_rumah' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'nuptk' => 'required',
                'no_sk_cpns' => 'required',
                'tmt_cpns' => 'required',
                'tmt_pns' => 'required',
                'ak_akhir' => 'required',
                'no_hp' => 'required',
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        if ($request->file('avatar')) {
            $image = $request->file('avatar');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/avatar', $profileImage);
            $input['avatar'] = "$profileImage";
        }

        $input['tanggal_lahir'] = Carbon::parse($request->get('tanggal_lahir'));
        $input['tmt_cpns'] = Carbon::parse($request->get('tmt_cpns'));
        $input['tmt_pns'] = Carbon::parse($request->get('tmt_pns'));
        $input['tmt_jabatan'] = Carbon::parse($request->get('tmt_jabatan'));


        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $jabatan = Jabatan::orderBy('id','asc')->get();
        $user = User::find($id);
        // $roles = Role::pluck('name','name')->all();
        $roles = Role::all();
        $userRole = $user->roles->pluck('name','name')->all();
        // if(!$userRole){
        //     $userRole = $roles;
        // }

        return view('users.edit',compact('user','roles','userRole','jabatan'));
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
        // $user = User::find($id);
        // $user->assignRole('guru');
        // dd($request->get('pangkat_golongan'));

        // dd($id);
        // $createdAt = Carbon::parse($request->get('tanggal_lahir'));
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            // 'roles' => 'required',
                'agama' => 'required',
                'wilayah_kerja' => 'required',
                'pangkat_golongan' => 'required',
                'username' => 'required',
                'pendidikan' => 'required',
                'jenis_guru' => 'required',
                'tugas_tambahan' => 'required',
                'jenis_kelamin' => 'required',
                'alamat_sekolah' => 'required',
                'alamat_rumah' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'nuptk' => 'required',
                'no_sk_cpns' => 'required',
                'tmt_cpns' => 'required',
                'tmt_pns' => 'required',
                'no_hp' => 'required',
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $avatar = User::find($id)->avatar;
        if(File::exists(public_path('storage/avatar/'.$avatar))){
            if ($image = $request->file('avatar')) {
                if($avatar==null){
                }else{
                    unlink(public_path('storage/avatar/'.$avatar));
                }
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->storeAs('public/avatar', $profileImage);
                $input['avatar'] = "$profileImage";
            }else{
                unset($input['avatar']);
            }

        }else{
            if ($image = $request->file('avatar')) {
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->storeAs('public/avatar', $profileImage);
                $input['avatar'] = "$profileImage";
            }else{
                unset($input['avatar']);
            }
        }

        $input['tanggal_lahir'] = Carbon::parse($request->get('tanggal_lahir'));
        $input['tmt_cpns'] = Carbon::parse($request->get('tmt_cpns'));
        $input['tmt_pns'] = Carbon::parse($request->get('tmt_pns'));
        $input['tmt_jabatan'] = Carbon::parse($request->get('tmt_jabatan'));
        $user = User::find($id);
        $user->update($input);

        if(Auth::user()->id == 1){
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $user->assignRole($request->input('roles'));
                }

        $id = Crypt::encrypt($id);

        return redirect()->route('users.edit',$id)
                        ->with('success','User updated successfully');
    }

    public function update_pak(Request $request, $id)
    {
        // $user = User::find($id);
        // $user->assignRole('guru');
        // dd($request->get('pangkat_golongan'));

        // dd($request->all());
        // $createdAt = Carbon::parse($request->get('tanggal_lahir'));
        // dd($createdAt->format('Y-m-d'));
        $this->validate($request, [
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
            'tertinggal' => 'required|numeric',
        ]);

        $input = $request->all();

        $user = User::find($id);
        $user->update($input);

        return back()->with('success','Berhasil menghitung angka kredit');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $avatar = User::find($id)->avatar;
        if(File::exists(public_path('storage/avatar/'.$avatar))){
                if($avatar==null){
                }else{
                    unlink(public_path('storage/avatar/'.$avatar));
                }
        }
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

     /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
        if(request()->file('file')){
            Excel::import(new UsersImport,request()->file('file'));
            return back();
        }else{
            return redirect()->route('users.index')
                        ->with('error','template Kosong');
        }
    }

}
