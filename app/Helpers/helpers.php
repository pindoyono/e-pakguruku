<?php
use Carbon\Carbon;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Kegiatan;
use App\Models\Kepegawaian;
use App\Models\pak;


if (! function_exists('convertLocalToUTC')) {
    function convertLocalToUTC($time)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $time, 'Europe/Paris')->setTimezone('UTC');
    }
}

if (! function_exists('convertUTCToLocal')) {
    function convertUTCToLocal($time)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $time, 'UTC')->setTimezone('Europe/Paris');
    }
}

if (! function_exists('tahun_aja')) {
    function tahun_aja($date)
    {
        return Carbon::parse($date)->format('Y');
    }
}

if (! function_exists('sum_pendidikan1')) {
    function sum_pendidikan1($pak_id)
    {

        return DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->select('kegiatans.*','pendidikans.*')
        ->orderBy('kegiatans.kode','asc')
        ->where('kegiatans.unsur','PENDIDIKAN')
        ->where('kegiatans.sub_unsur','!=','Mengikuti pelatihan  prajabatan')
        ->where('pak_id',$pak_id)
        ->where('status','!=','terbit')
        ->sum('nilai');

    }
}

if (! function_exists('sum_tertinggal')) {
    function sum_tertinggal($pak_id)
    {

        return DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->select('kegiatans.*','pendidikans.*')
        ->orderBy('kegiatans.kode','asc')
        ->where('kegiatans.unsur','TERTINGGAL')
        ->where('pak_id',$pak_id)
        ->where('status','!=','terbit')
        ->sum('nilai');

    }
}

if (! function_exists('sum_prajab')) {
    function sum_prajab($pak_id)
    {
        return DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->select('kegiatans.*','pendidikans.*')
        ->orderBy('kegiatans.kode','asc')
        ->where('kegiatans.unsur','PENDIDIKAN')
        ->where('kegiatans.sub_unsur','Mengikuti pelatihan  prajabatan')
        ->where('pak_id',$pak_id)
        ->where('status','!=','terbit')
        ->sum('nilai');
    }
}

if (! function_exists('sum_penugasan')) {
    function sum_penugasan($pak_id)
    {
        return DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->select('kegiatans.*','pendidikans.*')
        ->orderBy('kegiatans.kode','asc')
        ->where('kegiatans.unsur','PEMBELAJARAN/  BIMBINGAN DAN  TUGASTERTENTU')
        ->where('pak_id',$pak_id)
        ->where('status','!=','terbit')
        ->sum('nilai');
    }
}

if (! function_exists('sum_pkb')) {
    function sum_pkb($pak_id)
    {
        return DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->select('kegiatans.*','pendidikans.*')
        ->orderBy('kegiatans.kode','asc')
        ->where('kegiatans.unsur','PENGEMBANGAN  KEPROFESIAN  BERKELANJUTAN')
        ->where('pak_id',$pak_id)
        ->where('status','!=','terbit')
        ->sum('nilai');
    }
}

if (! function_exists('sum_penunjang')) {
    function sum_penunjang($pak_id)
    {
        return DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->select('kegiatans.*','pendidikans.*')
        ->orderBy('kegiatans.kode','asc')
        ->where('kegiatans.unsur','PENUNJANG TUGAS GURU')
        ->where('pak_id',$pak_id)
        ->where('status','!=','terbit')
        ->sum('nilai');
    }
}


if (! function_exists('proses_pembelajaran')) {
    function proses_pembelajaran($pak_id)
    {
        return DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->select('kegiatans.*','pendidikans.*')
        ->orderBy('kegiatans.kode','asc')
        ->where('kegiatans.sub_unsur','Melaksanakan proses  pembelajaran')
        ->where('pak_id',$pak_id)
        ->where('status','!=','terbit')
        ->sum('nilai');
    }
}

if (! function_exists('proses_bimbingan')) {
    function proses_bimbingan($pak_id)
    {
        return DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->select('kegiatans.*','pendidikans.*')
        ->orderBy('kegiatans.kode','asc')
        ->where('kegiatans.sub_unsur','Melaksanakan proses  bimbingan')
        ->where('pak_id',$pak_id)
        ->where('status','!=','terbit')
        ->sum('nilai');
    }
}

if (! function_exists('tugas_lain')) {
    function tugas_lain($pak_id)
    {
        // return
        return DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->select('kegiatans.*','pendidikans.*')
        ->orderBy('kegiatans.kode','asc')
        ->where('kegiatans.sub_unsur','Melaksanakan tugas lain  yang relevan dengan  fungsi sekolah /  madrasah.')
        ->where('pak_id',$pak_id)
        ->where('status','!=','terbit')
        ->sum('nilai');
    }
}

if (! function_exists('pengembangan_diri')) {
    function pengembangan_diri($pak_id)
    {
        return DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->select('kegiatans.*','pendidikans.*')
        ->orderBy('kegiatans.kode','asc')
        ->where('kegiatans.sub_unsur','Melaksanakan  pengembangan diri')
        ->where('pak_id',$pak_id)
        ->where('status','!=','terbit')
        ->sum('nilai');
    }
}


if (! function_exists('karya_ilmiah')) {
    function karya_ilmiah($pak_id)
    {
        return DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->select('kegiatans.*','pendidikans.*')
        ->orderBy('kegiatans.kode','asc')
        ->where('kegiatans.sub_unsur','Melaksanakan Publikasi Ilmiah')
        ->where('pak_id',$pak_id)
        ->where('status','!=','terbit')
        ->sum('nilai');
    }
}

if (! function_exists('karya_inovatif')) {
    function karya_inovatif($pak_id)
    {
        return DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->select('kegiatans.*','pendidikans.*')
        ->orderBy('kegiatans.kode','asc')
        ->where('kegiatans.sub_unsur','Melaksanakan Karya Inovatif')
        ->where('pak_id',$pak_id)
        ->where('status','!=','terbit')
        ->sum('nilai');
    }
}


if (! function_exists('ijazah_tidak_sesuai')) {
    function ijazah_tidak_sesuai($pak_id)
    {
        return DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->select('kegiatans.*','pendidikans.*')
        ->orderBy('kegiatans.kode','asc')
        ->where('kegiatans.sub_unsur','Memperoleh gelar/ijazah yang tidak sesuai dengan bidang yang diampunya')
        ->where('pak_id',$pak_id)
        ->where('status','!=','terbit')
        ->sum('nilai');
    }
}

if (! function_exists('memperoleh_penghargaan')) {
    function memperoleh_penghargaan($pak_id)
    {
        return DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->select('kegiatans.*','pendidikans.*')
        ->orderBy('kegiatans.kode','asc')
        ->where('kegiatans.sub_unsur','Perolehan penghargaan/tanda jasa')
        ->where('pak_id',$pak_id)
        ->where('status','!=','terbit')
        ->sum('nilai');
    }
}

if (! function_exists('pendukung_tugas_guru')) {
    function pendukung_tugas_guru($pak_id)
    {
        return DB::table('kegiatans')
        ->join('pendidikans', 'kegiatans.id', '=', 'pendidikans.kegiatan_id')
        ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
        ->select('kegiatans.*','pendidikans.*')
        ->orderBy('kegiatans.kode','asc')
        ->where('kegiatans.sub_unsur','Melaksanakan kegiatan yang mendukung tugas guru')
        ->where('pak_id',$pak_id)
        ->where('status','!=','terbit')
        ->sum('nilai');
    }
}

if (! function_exists('jabatan')) {
    function jabatan($pangkat,$kolom)
    {
        return DB::table('jabatans')
        ->select($kolom)
        ->where('pangkat',$pangkat)
        ->first('nilai');
    }
}

if (! function_exists('get_jabatan')) {
    function get_jabatan($id)
    {
        // return 'tes';
        return DB::table('jabatans')
        ->where('id',$id)->first();
        // ->first();
    }
}




if (! function_exists('get_upadate_at')) {
    function get_upadate_at($table,$user_id)
    {
        $count =  DB::table($table)
        ->select('*')
        ->where('user_id',$user_id)
        ->count();


        if($count){
            $updated_at =  DB::table($table)
            ->select('*')
            ->where('user_id',$user_id)
            ->first()->updated_at;
            return Carbon::now()->diffInYears($updated_at);
            // return 1;
        }else{
            return 1;
        }

        return 1;
    }
}




if (! function_exists('tgl_indo')) {
    function tgl_indo($tanggal){
        if($tanggal == null){
            return 'kosong';
        }
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return  $pecahkan[2].' '.$bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
}


if (! function_exists('tgl_indo_bulan')) {
    function tgl_indo_bulan($tanggal){
        if($tanggal == null){
            return 'kosong';
        }
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return  $pecahkan[2].' '.$bulan[ (int)$pecahkan[1] ];
    }
}



if (! function_exists('masa_kerja')) {
    function masa_kerja($sekarang,$patokan){
        $dbDate = \Carbon\Carbon::parse($patokan);
        $diffYears = $sekarang->diffInYears($dbDate);
        $diffInMonths = $sekarang->diffInMonths($dbDate);

        $bulan = $diffInMonths-($diffYears*12);

        return  $diffYears.' Tahun '.$bulan.' Bulan';
    }
}

if (! function_exists('masa_kerja_tahun')) {
    function masa_kerja_tahun($sekarang,$patokan){
        $dbDate = \Carbon\Carbon::parse($patokan);
        $diffYears = $sekarang->diffInYears($dbDate);
        $diffInMonths = $sekarang->diffInMonths($dbDate);

        $bulan = $diffInMonths-($diffYears*12);

        return  $diffYears;
    }
}



if (! function_exists('get_juml_guru')) {
    function get_juml_guru()
    {
        $users = User::role('guru')->count();
        return $users;
    }
}


if (! function_exists('lolos')) {
    function lolos($pak_id)
    {

        $pak = pak::find($pak_id);
        $user_id = pak::find($pak_id)->user_id;
        $user = User::find($user_id);
        $jabatan = Jabatan::all();
        $kepegawaian = Kepegawaian::where('user_id',$user_id)->get();
        $jabatan_pak = Jabatan::where('id',$user->pangkat_golongan)->first();
        // dd($jabatan_pak);

        // dd($pak->awal);
        $i=0;

        $ak_diperoleh = number_format(
            $pak->pendidikan_sekolah + $pak->pendidikan_sekolah2 +
            $pak->pelatihan_prajabatan + $pak->pelatihan_prajabatan2 +
            $pak->proses_pembelajaran + $pak->proses_pembelajaran2 +
            $pak->proses_bimbingan + $pak->proses_bimbingan2 +
            $pak->tugas_lain + $pak->tugas_lain2 +
            $pak->pengembangan_diri + $pak->pengembangan_diri2 +
            $pak->publikasi_ilmiah + $pak->publikasi_ilmiah2 +
            $pak->karya_inovatif + $pak->karya_inovatif2 +
                $pak->ijazah_tidak_sesuai + $pak->ijazah_tidak_sesuai2 +
                $pak->pendukung_tugas_guru + $pak->pendukung_tugas_guru2 +
                $pak->tertinggal + $pak->tertinggal2 +
                $pak->memperoleh_penghargaan + $pak->memperoleh_penghargaan2
            ,3);

            $ak_utama_total = number_format(
                $pak->pendidikan_sekolah + $pak->pendidikan_sekolah2 +
                $pak->pelatihan_prajabatan + $pak->pelatihan_prajabatan2 +
                $pak->proses_pembelajaran + $pak->proses_pembelajaran2 +
                $pak->proses_bimbingan + $pak->proses_bimbingan2 +
                $pak->tugas_lain + $pak->tugas_lain2 +
                $pak->pengembangan_diri + $pak->pengembangan_diri2 +
                $pak->publikasi_ilmiah + $pak->publikasi_ilmiah2 +
                $pak->karya_inovatif + $pak->karya_inovatif2
                ,3);

            $ak_pd = number_format(
                $pak->pengembangan_diri + $pak->pengembangan_diri2 - $user->pengembangan_diri
                ,3);

            $ak_piki = number_format(
                                    $pak->publikasi_ilmiah + $pak->publikasi_ilmiah2 +
                                    $pak->karya_inovatif + $pak->karya_inovatif2 - $user->publikasi_ilmiah
                                    - $user->karya_inovatif
                                ,3);

            $ak_penunjang = number_format(
                ($pak->ijazah_tidak_sesuai + $pak->ijazah_tidak_sesuai2 +
                $pak->pendukung_tugas_guru + $pak->pendukung_tugas_guru2 +
                $pak->memperoleh_penghargaan + $pak->memperoleh_penghargaan2)
                -
                ($user->ijazah_tidak_sesuai
                + $user->pendukung_tugas_guru
                + $user->memperoleh_penghargaan)
            ,3);

            if($jabatan_pak){


            $jml_1 = number_format(($ak_diperoleh - $jabatan_pak->target), 3);
            $jml_4 = number_format(($ak_utama_total - (90/100*$jabatan_pak->target_sebelum)) - (90/100*$jabatan_pak->akk) ,3) + ($pak->tertinggal + $pak->tertinggal2 + $user->tertinggal);
            $jml_2 = number_format($ak_pd - $jabatan_pak->akpkbpd,3);
            $jml_3 = number_format($ak_piki - $jabatan_pak->akpkbpiki,3);
            $jml_5 = number_format($ak_penunjang - $jabatan_pak->akp,3 );

            $masa_kerja = masa_kerja(\Carbon\Carbon::parse(date("Y")."-10-01"), $user->tmt_pns);

            $ki = $pak->karya_inovatif + $pak->karya_inovatif2 - $user->karya_inovatif <= 50/100*$jabatan_pak->akpkbpiki;

            // dd($jabatan_pak->target);

                $naik_pangkat=0;
            if($jml_1>=0 && $jml_2>=0 && $jml_3>=0 && $jml_4>=0 && $jml_5<=0 && $masa_kerja >= 2 ){
                if($jabatan_pak->id >= 4){
                    if($ki){
                        if($jabatan_pak->id == 4){
                            if($pak->lap_pi == "Ada"){
                                $naik_pangkat = 1;
                            }else{
                                $naik_pangkat = 0;
                            }
                        }elseif($jabatan_pak->id == 5){
                            if($pak->jurnal == "Ada" && $pak->lap_pi == "Ada"){
                                $naik_pangkat = 1;
                            }else{
                                $naik_pangkat = 0;
                            }
                        }
                    }else{
                        $naik_pangkat = 0;
                    }
                }else{
                    $naik_pangkat = 1;
                }
            }else{
                $naik_pangkat = 0;
            }

            if($naik_pangkat==0){
                return 'Tidak Lolos';
            }else{
                return 'Lolos';
            }
        }else{
        return 'Tidak Lolos';
        }
    }
}

if (! function_exists('get_juml_guru_pak')) {
    function get_juml_guru_pak($status)
    {
        $users =  DB::table('paks')
        ->join('users', 'users.id', '=', 'paks.user_id')
        ->where('users.status_naik_pangkat',$status)
        ->where('status','!=','terbit')
        ->count();
        return $users;
    }
}

if (! function_exists('get_juml_guru_pak1')) {
    function get_juml_guru_pak1($status)
    {
        if (Auth::user()->hasRole('super-admin')) {
            $data = DB::table('paks')
                        ->join('users', 'users.id', '=', 'paks.user_id')
                        ->select('users.*','paks.*')
                        ->orderBy('paks.id','asc')
                        ->where('users.status_naik_pangkat',$status)
                        ->count();
        }else{
            $data = DB::table('paks')
                        ->join('users', 'users.id', '=', 'paks.user_id')
                        ->select('users.*','paks.*')
                        ->orderBy('paks.id','asc')
                        ->where('users.status_naik_pangkat',$status)
                        ->where('wilayah_kerja',Auth::user()->wilayah_kerja)
                        ->count();
        }
        return $data;
    }
}

if (! function_exists('get_jml_dinilai')) {
    function get_jml_dinilai($dinilai)
    {
        if (Auth::user()->hasRole('super-admin')) {
            $data = DB::table('paks')
                        ->join('users', 'users.id', '=', 'paks.user_id')
                        ->select('users.*','paks.*')
                        ->orderBy('paks.id','asc')
                        ->where('paks.status',$dinilai)
                        ->count();
        }else{
            $data = DB::table('paks')
                        ->join('users', 'users.id', '=', 'paks.user_id')
                        ->select('users.*','paks.*')
                        ->orderBy('paks.id','asc')
                        ->where('paks.status',$dinilai)
                        ->where('wilayah_kerja',Auth::user()->wilayah_kerja)
                        ->count();
        }

        return $data;
    }
}


if (! function_exists('get_jml_lolos')) {
    function get_jml_lolos($lolos)
    {
        $count=0;
        if (Auth::user()->hasRole('super-admin')) {
            $data = DB::table('paks')
                        ->join('users', 'users.id', '=', 'paks.user_id')
                        ->select('users.*','paks.*','paks.id as pak_id')
                        ->orderBy('paks.id','asc')
                        ->get();
        }else{
            $data = DB::table('paks')
                        ->join('users', 'users.id', '=', 'paks.user_id')
                        ->select('users.*','paks.*','paks.id as pak_id')
                        ->orderBy('paks.id','asc')
                        ->where('wilayah_kerja',Auth::user()->wilayah_kerja)
                        ->get();
        }

        foreach ($data as $key => $value) {
            if(lolos($value->pak_id) == $lolos){
                $count++;
            }
        }
        return $count;
    }
}

if (! function_exists('get_jml_hapak')) {
    function get_jml_hapak()
    {
        $count=0;
        if (Auth::user()->hasRole('super-admin')) {
            $data = DB::table('pendidikans')
            ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
            ->join('users', 'users.id', '=', 'paks.user_id')
            ->join('relasi_l2pkb_usulans', 'relasi_l2pkb_usulans.pendidikan_id', '=', 'pendidikans.id')
            ->select('pak_id')
            // ->where('pak_id',$pak_id)
            ->groupBy('pak_id')
            ->orderBy('pak_id')
            ->get();

        }else{
            $data = DB::table('pendidikans')
            ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
            ->join('users', 'users.id', '=', 'paks.user_id')
            ->join('relasi_l2pkb_usulans', 'relasi_l2pkb_usulans.pendidikan_id', '=', 'pendidikans.id')
            ->select('pak_id')
            // ->where('pak_id',$pak_id)
            ->groupBy('pak_id')
            ->orderBy('pak_id')
            ->where('wilayah_kerja',Auth::user()->wilayah_kerja)
            ->get();
        }


        foreach ($data as $key => $value) {
                $count++;
        }

        return $count;
    }
}

if (! function_exists('get_jml_hapak_list')) {
    function get_jml_hapak_list()
    {
        $count=0;
        if (Auth::user()->hasRole('super-admin')) {
            $data = DB::table('pendidikans')
            ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
            ->join('users', 'users.id', '=', 'paks.user_id')
            ->join('relasi_l2pkb_usulans', 'relasi_l2pkb_usulans.pendidikan_id', '=', 'pendidikans.id')
            ->select('pak_id')
            // ->where('pak_id',$pak_id)
            ->groupBy('pak_id')
            ->orderBy('pak_id')
            ->get();

        }else{
            $data = DB::table('pendidikans')
            ->join('paks', 'paks.id', '=', 'pendidikans.pak_id')
            ->join('users', 'users.id', '=', 'paks.user_id')
            ->join('relasi_l2pkb_usulans', 'relasi_l2pkb_usulans.pendidikan_id', '=', 'pendidikans.id')
            ->select('pak_id')
            // ->where('pak_id',$pak_id)
            ->groupBy('pak_id')
            ->orderBy('pak_id')
            ->where('wilayah_kerja',Auth::user()->wilayah_kerja)
            ->get();
        }

        // foreach ($data as $key => $value) {
        //         $count++;
        // }

        return $data;
    }
}



if (! function_exists('get_data_penilai')) {
    function get_data_penilai($id)
    {
        $data = User::find($id);
        return $data;
    }
}
