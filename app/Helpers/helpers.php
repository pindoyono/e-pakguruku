<?php
use Carbon\Carbon;
use App\Models\User;


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
