<!DOCTYPE html>
<html>
<head>
    <title>Penetapan Angka Kredit</title>
</head>
<body>
    <style>
        table, td, th {
          border: 1px solid black;
        }


        @page{
          margin: 0.5em 1em;
        }

        table {

          border-collapse: collapse;
        }

        .wrapper {
            border: 0px solid white;
        }

        .spasi{
            padding-left: 5px;
        }

        </style>



        <div class="container">
            <table width="100%" style="border: none !important;  vertical-align:top; font-size:8 !important">
                <tr style="border: none !important;  vertical-align:top;">
                    <td  width="10%" style="border: none !important;  vertical-align:top;">

                    </td>
                    <td style="border: none !important;  vertical-align:top;" >

                    </td>
                    <td width="12%" style="border: none !important;  vertical-align:top;">
                        Lampiran V
                    </td>
                    <td width="1%" style="border: none !important; vertical-align:top;">
                        :
                    </td>
                    <td width="35%" style="border: none !important;  vertical-align:top;">
                        <table  style="border: none !important;">
                            <tr  style="border: none !important;">
                                <td colspan="3" style="border: none !important;">
                                    Peraturan Bersama
                                </td>
                            </tr>
                            <tr  style="border: none !important;">
                                <td colspan="3"  style="border: none !important;">
                                    Menteri Pendidikan Nasional <br>
                                    dan Kepala Badan Kepegawaian Negara
                                </td>
                            </tr>
                            <tr  style="border: none !important;">
                                <td width="8px"  style="border: none !important;">
                                    Nomor
                                </td>
                                <td width="3px" style="border: none !important;">
                                    :
                                </td>
                                <td  width="150px"  style="border: none !important;">
                                    03/V/PB/2010
                                </td>
                            </tr>
                            <tr  style="border: none !important;">
                                <td width="8px"  style="border: none !important;">
                                    Nomor
                                </td>
                                <td width="3px" style="border: none !important;">
                                    :
                                </td>
                                <td  width="100px"  style="border: none !important;">
                                    14 TAHUN 2010
                                </td>
                            </tr>
                            <tr  style="border: none !important;">
                                <td width="8px"  style="border: none !important;">
                                    Tanggal
                                </td>
                                <td width="3px" style="border: none !important;">
                                    :
                                </td>
                                <td  width="100px"  style="border: none !important;">
                                    6 Mei 2010
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <div style="text-align:center; border: none !important;" >
                <span style="font-size:12; font-weight:bold; ">
                    PENETAPAN ANGKA KREDIT JABATAN FUNGSIONAL GURU <br>
                    DINAS PENDIDIKAN DAN KEBUDAYAAN PROVINSI KALIMANTAN UTARA <br>
                </span>
                <span style="font-size:10">
                    Nomor :  {{ $pak->no_sk }} <br>
                </span>
                <span style="font-size:12; font-weight:bold">
                    Masa Penilaian : {{ tgl_indo($pak->awal).' s/d '.tgl_indo($pak->akhir)}} <br>
                </span>

            </div>

            <table width="100%">
                <tbody style="font-size:10;" >
                    <tr>
                        <td width="3%" style="text-align:center !important">I</td>
                        <td colspan=7 class="font-size:9; text-left spasi"> KETERANGAN PERORANGAN</td>
                    </tr>
                    <tr >
                        <td rowspan=14></td>
                        <td width="10px" class="spasi"> 1</td>
                        <td colspan=2 width="10px" class="spasi">Nama</td>
                        <td colspan=4 class="spasi">{{ $pak->name }}</td>
                    </tr>
                    <tr>
                        <td class="spasi"> 2</td>
                        <td class="spasi" colspan=2>NIP</td>
                        <td class="spasi" colspan=4>{{ $pak->username }}</td>
                    </tr>
                    <tr>
                        <td class="spasi"> 3</td>
                        <td class="spasi" colspan=2>NUPTK</td>
                        <td class="spasi" colspan=4>{{ $pak->nuptk }}</td>
                    </tr>
                    <tr>
                        <td class="spasi"> 4</td>
                        <td class="spasi" colspan=2>Tempat, Tanggal Lahir</td>
                        <td class="spasi" colspan=4>{{ $pak->tempat_lahir.', '.tgl_indo($pak->tanggal_lahir) }}</td>
                    </tr>
                    <tr>
                        <td class="spasi"> 5</td>
                        <td class="spasi" colspan=2>Jenis Kelamin</td>
                        <td class="spasi" colspan=4>{{$pak->jenis_kelamin}}</td>
                    </tr>
                    <tr>
                        <td class="spasi"> 6</td>
                        <td class="spasi" colspan=2 >Pendidikan yang telah diperhitungkan angka kreditnya</td>
                        {{-- <td class="spasi" colspan=2 style="font-size:9;">Pendidikan yang telah diperhitungkan angka kreditnya</td> --}}
                        <td class="spasi" colspan=4>{{ $pak->pendidikan }}</td>
                    </tr>
                    <tr>
                        <td class="spasi"> 7</td>
                        <td class="spasi" colspan=2>Pangkat / Golongan ruang / TMT</td>
                        <td class="spasi" colspan=4>
                                {{ $pangkat->pangkat.' / '.tgl_indo($pak->tmt_pns)   }}
                        </td>
                    </tr>
                    <tr>
                        <td class="spasi"> 8</td>
                        <td class="spasi" colspan=2>Jabatan Guru / TMT</td>
                        <td class="spasi" colspan=4> {{ $pangkat->jabatan.' / '.tgl_indo($pak->tmt_jabatan)   }}</td>
                    </tr>
                    <tr>
                        <td class="spasi" rowspan=2> 9</td>
                        <td class="spasi" rowspan=2>Masa Kerja Golongan</td>
                        <td class="spasi">Lama</td>
                        <td class="spasi" colspan=4>{{  masa_kerja(\Carbon\Carbon::parse( date("Y")."-04-01" )->subYears(1), $pak->tmt_cpns) }}</td>
                    </tr>
                    <tr>
                        <td class="spasi">Baru</td>
                        <td class="spasi" colspan=4>{{
                                        \Carbon\Carbon::parse(now())->format('m')<=4?
                                        masa_kerja(\Carbon\Carbon::parse( date("Y")."-04-01" ), $pak->tmt_cpns)
                                        :
                                        masa_kerja(\Carbon\Carbon::parse( date("Y")."-04-01" ), $pak->tmt_cpns)
                                        }}
                        </td>
                    </tr>
                    <tr>
                        <td > 10</td>
                        <td class="spasi" colspan=2>Jenis Guru </td>
                        <td class="spasi" colspan=4>{{ $pak->jenis_guru }}</td>
                    </tr>
                    <tr>
                        <td > 11</td>
                        <td class="spasi" colspan=2>Unit Kerja </td>
                        <td class="spasi" colspan=4>{{ $pak->sekolah }}</td>
                    </tr>
                    <tr>
                        <td  rowspan=2> 12</td>
                        <td class="spasi" rowspan=2>Alamat</td>
                        <td class="spasi">Sekolah</td>
                        <td class="spasi" colspan=4 style="font-size:9;">{{ $pak->alamat_sekolah }}</td>
                    </tr>
                    <tr>
                        <td class="spasi">Rumah</td>
                        <td class="spasi" colspan=4 style="font-size:9;">{{ $pak->alamat_rumah }}</td>
                    </tr>



                    <tr style="font-size:9; text-align:left" >
                        <td style="text-align:center !important">II</td>
                        <td class="spasi" colspan=4> PENETAPAN ANGKA KREDIT</td>
                        <td class="spasi" width="10%" > LAMA</td>
                        <td class="spasi" width="10%"> BARU</td>
                        <td class="spasi" width="10%"> JUMLAH</td>
                    </tr>
                    <tr>
                        <td class="spasi" rowspan="19"></td>
                        <td class="spasi" >1</td>
                        <td class="spasi" colspan=3> <b>Unsur Utama</b></td>
                        <td class="spasi" style="text-align:right"> <b> {{ $pak2->tertinggal !=0 ? str_replace('.',',',$pak2->tertinggal) : '-'; }}  </b></td>
                        <td class="spasi" style="text-align:right"> <b> {{ $pak2->tertinggal2 !=0 ? str_replace('.',',',$pak2->tertinggal2) : '-';}}   </b></td>
                        <td class="spasi" style="text-align:right"> <b> {{ number_format($pak2->tertinggal + $pak2->tertinggal2,3) !=0? str_replace('.',',',number_format($pak2->tertinggal + $pak2->tertinggal2,3)) :'-'; }}  </b></td>
                    </tr>
                    <tr>
                        <td class="spasi" rowspan="12"></td>
                        <td class="spasi" colspan=3> a. Pendidikan</td>
                        <td class="spasi" > </td>
                        <td class="spasi" > </td>
                        <td class="spasi" > </td>
                    </tr>
                    <tr>
                        <td class="spasi" colspan="3" >1) Pendidikan sekolah dan memperoleh gelar ijazah </td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->pendidikan_sekolah !=0 ? str_replace('.',',',$pak2->pendidikan_sekolah) :'-';}} </td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->pendidikan_sekolah2 !=0 ? str_replace('.',',',$pak2->pendidikan_sekolah2) : '-'; }} </td>
                        <td class="spasi" style="text-align:right"> {{ number_format($pak2->pendidikan_sekolah + $pak2->pendidikan_sekolah2,3) !=0? str_replace('.',',',number_format($pak2->pendidikan_sekolah + $pak2->pendidikan_sekolah2,3)) :'-'; }} </td>
                    </tr>
                    <tr>
                        <td class="spasi" colspan="3">2) Mengikuti pelatihan prajabatan</td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->pelatihan_prajabatan !=0? str_replace('.',',',$pak2->pelatihan_prajabatan) :'-'; }} </td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->pelatihan_prajabatan2 !=0? str_replace('.',',',$pak2->pelatihan_prajabatan2) :'-'; }} </td>
                        <td class="spasi" style="text-align:right"> {{ number_format($pak2->pelatihan_prajabatan + $pak2->pelatihan_prajabatan2,3)!=0? str_replace('.',',',number_format($pak2->pelatihan_prajabatan + $pak2->pelatihan_prajabatan2,3)) :'-'; }} </td>
                    </tr>
                    <tr>
                        <td class="spasi" colspan="3">b. Pembelajaran /  bimbingan dan tugas tertentu</td>
                        <td class="spasi"></td>
                        <td class="spasi"></td>
                        <td class="spasi"></td>
                    </tr>
                    <tr>
                        <td class="spasi" colspan="3">    1) Proses pembelajaran	</td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->proses_pembelajaran !=0?  str_replace('.',',',$pak2->proses_pembelajaran) :'-';}} </td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->proses_pembelajaran2 !=0? str_replace('.',',',$pak2->proses_pembelajaran2) :'-'; }} </td>
                        <td class="spasi" style="text-align:right"> {{ number_format($pak2->proses_pembelajaran + $pak2->proses_pembelajaran2,3) !=0 ? str_replace('.',',',number_format($pak2->proses_pembelajaran + $pak2->proses_pembelajaran2,3)) :'-'; }} </td>
                    </tr>
                    <tr>
                        <td class="spasi" colspan="3">    2) Proses bimbingan	</td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->proses_bimbingan !=0? str_replace('.',',',$pak2->proses_bimbingan) :'-'; }} </td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->proses_bimbingan2 !=0? str_replace('.',',',$pak2->proses_bimbingan2) :'-';}} </td>
                        <td class="spasi" style="text-align:right"> {{ number_format($pak2->proses_bimbingan + $pak2->proses_bimbingan2,3) !=0? str_replace('.',',',number_format($pak2->proses_bimbingan + $pak2->proses_bimbingan2,3)) :'-'; }} </td>
                    </tr>
                    <tr>
                        <td class="spasi" colspan="3">    3) Tugas lain yang relevan</td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->tugas_lain !=0?  str_replace('.',',',$pak2->tugas_lain):'-'; }} </td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->tugas_lain2  !=0? str_replace('.',',',$pak2->tugas_lain2) :'-';}} </td>
                        <td class="spasi" style="text-align:right"> {{ number_format($pak2->tugas_lain + $pak2->tugas_lain2,3) !=0? str_replace('.',',',number_format($pak2->tugas_lain + $pak2->tugas_lain2,3)):'-' }} </td>
                    </tr>
                    <tr>
                        <td class="spasi" colspan="3">c. Pengembangan Keprofesian</td>
                        <td class="spasi"></td>
                        <td class="spasi"></td>
                        <td class="spasi"></td>
                    </tr>
                    <tr>
                        <td class="spasi" colspan="3"> 1) Pengembangan Diri</td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->pengembangan_diri !=0? str_replace('.',',',$pak2->pengembangan_diri):'-'; }} </td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->pengembangan_diri2 !=0? str_replace('.',',',$pak2->pengembangan_diri2):'-'; }} </td>
                        <td class="spasi" style="text-align:right"> {{ number_format($pak2->pengembangan_diri + $pak2->pengembangan_diri2,3) !=0? str_replace('.',',',number_format($pak2->pengembangan_diri + $pak2->pengembangan_diri2,3)):'-';}} </td>
                    </tr>
                    <tr>
                        <td class="spasi" colspan="3">2) Publikasi Ilmiah</td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->publikasi_ilmiah !=0? str_replace('.',',',$pak2->publikasi_ilmiah):'-'; }} </td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->publikasi_ilmiah2 !=0? str_replace('.',',',$pak2->publikasi_ilmiah2):'-'; }} </td>
                        <td class="spasi" style="text-align:right"> {{ number_format($pak2->publikasi_ilmiah + $pak2->publikasi_ilmiah2,3) !=0? str_replace('.',',',number_format($pak2->publikasi_ilmiah + $pak2->publikasi_ilmiah2,3)):'-'; }} </td>
                    </tr>
                    <tr>
                        <td class="spasi" colspan="3">  3) Karya Inovatif</td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->karya_inovatif !=0 ? str_replace('.',',',$pak2->karya_inovatif) :'-';}} </td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->karya_inovatif2 !=0 ? str_replace('.',',',$pak2->karya_inovatif2) : '-'; }} </td>
                        <td class="spasi" style="text-align:right"> {{ number_format($pak2->karya_inovatif + $pak2->karya_inovatif2,3) !=0? str_replace('.',',',number_format($pak2->karya_inovatif + $pak2->karya_inovatif2,3)):'-'; }} </td>
                    </tr>
                    <tr>
                        <td class="spasi" colspan="3"> <b>Jumlah Unsur Utama</b></td>
                        <td class="spasi" style="text-align:right">
                            <b>
                                {{
                                    number_format(
                                    $pak2->pendidikan_sekolah +
                                    $pak2->pelatihan_prajabatan +
                                    $pak2->proses_pembelajaran +
                                    $pak2->proses_bimbingan +
                                    $pak2->tugas_lain +
                                    $pak2->pengembangan_diri +
                                    $pak2->publikasi_ilmiah +
                                    $pak2->karya_inovatif +
                                    $pak2->tertinggal
                                    ,3)
                                    !=0?
                                    str_replace('.',',',
                                    number_format(
                                    $pak2->pendidikan_sekolah +
                                    $pak2->pelatihan_prajabatan +
                                    $pak2->proses_pembelajaran +
                                    $pak2->proses_bimbingan +
                                    $pak2->tugas_lain +
                                    $pak2->pengembangan_diri +
                                    $pak2->publikasi_ilmiah +
                                    $pak2->karya_inovatif +
                                    $pak2->tertinggal
                                    ,3)
                                    )
                                    :'-';
                                }}
                            </b>
                        </td>
                        <td class="spasi" style="text-align:right">
                            <b>
                                {{
                                    number_format(
                                    $pak2->pendidikan_sekolah2 +
                                    $pak2->pelatihan_prajabatan2 +
                                    $pak2->proses_pembelajaran2 +
                                    $pak2->proses_bimbingan2 +
                                    $pak2->tugas_lain2 +
                                    $pak2->pengembangan_diri2 +
                                    $pak2->publikasi_ilmiah2 +
                                    $pak2->karya_inovatif2 +
                                    $pak2->tertinggal2
                                    ,3)
                                    !=0?
                                    str_replace('.',',',
                                    number_format(
                                    $pak2->pendidikan_sekolah2 +
                                    $pak2->pelatihan_prajabatan2 +
                                    $pak2->proses_pembelajaran2 +
                                    $pak2->proses_bimbingan2 +
                                    $pak2->tugas_lain2 +
                                    $pak2->pengembangan_diri2 +
                                    $pak2->publikasi_ilmiah2 +
                                    $pak2->karya_inovatif2 +
                                    $pak2->tertinggal2
                                    ,3)
                                    )
                                    :'-'
                                    ;
                                }}
                            </b>
                        </td>
                        <td class="spasi" style="text-align:right">
                            <b>
                                {{
                                    number_format(
                                    $pak2->pendidikan_sekolah +
                                    $pak2->pelatihan_prajabatan +
                                    $pak2->proses_pembelajaran +
                                    $pak2->proses_bimbingan +
                                    $pak2->tugas_lain +
                                    $pak2->pengembangan_diri +
                                    $pak2->publikasi_ilmiah +
                                    $pak2->karya_inovatif +
                                    $pak2->tertinggal +

                                    $pak2->pendidikan_sekolah2 +
                                    $pak2->pelatihan_prajabatan2 +
                                    $pak2->proses_pembelajaran2 +
                                    $pak2->proses_bimbingan2 +
                                    $pak2->tugas_lain2 +
                                    $pak2->pengembangan_diri2 +
                                    $pak2->publikasi_ilmiah2 +
                                    $pak2->karya_inovatif2 +
                                    $pak2->tertinggal2
                                    ,3)
                                    !=0?
                                    str_replace('.',',',
                                    number_format(
                                    $pak2->pendidikan_sekolah +
                                    $pak2->pelatihan_prajabatan +
                                    $pak2->proses_pembelajaran +
                                    $pak2->proses_bimbingan +
                                    $pak2->tugas_lain +
                                    $pak2->pengembangan_diri +
                                    $pak2->publikasi_ilmiah +
                                    $pak2->karya_inovatif +
                                    $pak2->tertinggal +

                                    $pak2->pendidikan_sekolah2 +
                                    $pak2->pelatihan_prajabatan2 +
                                    $pak2->proses_pembelajaran2 +
                                    $pak2->proses_bimbingan2 +
                                    $pak2->tugas_lain2 +
                                    $pak2->pengembangan_diri2 +
                                    $pak2->publikasi_ilmiah2 +
                                    $pak2->karya_inovatif2 +
                                    $pak2->tertinggal2
                                    ,3)
                                    )
                                    :'-'
                                    ;
                                }}
                                </b>
                            </td>
                    </tr>
                    <tr>
                        <td class="spasi" >2</td>
                        <td class="spasi" colspan="3"><b>Unsur Penunjang</b></td>
                        <td class="spasi"></td>
                        <td class="spasi"></td>
                        <td class="spasi"></td>
                    </tr>
                    <tr>
                        <td class="spasi" rowspan="3"></td>
                        <td class="spasi" colspan="3">1. Ijazah yang tidak sesuai</td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->ijazah_tidak_sesuai !=0 ? str_replace('.',',',$pak2->ijazah_tidak_sesuai) : '-'; }} </td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->ijazah_tidak_sesuai2  !=0 ? str_replace('.',',',$pak2->ijazah_tidak_sesuai2)  : '-';}} </td>
                        <td class="spasi" style="text-align:right"> {{ number_format($pak2->ijazah_tidak_sesuai + $pak2->ijazah_tidak_sesuai2,3) !=0 ? str_replace('.',',',number_format($pak2->ijazah_tidak_sesuai + $pak2->ijazah_tidak_sesuai2,3)):'-'; }} </td>
                    </tr>


                    <tr>
                        <td class="spasi" colspan="3">2. Pendukung tugas guru</td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->pendukung_tugas_guru !=0 ? str_replace('.',',',$pak2->pendukung_tugas_guru):'-'; }} </td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->pendukung_tugas_guru2 !=0 ? str_replace('.',',',$pak2->pendukung_tugas_guru2):'-'; }} </td>
                        <td class="spasi" style="text-align:right"> {{ number_format($pak2->pendukung_tugas_guru + $pak2->pendukung_tugas_guru2,3)!=0 ? str_replace('.',',',number_format($pak2->pendukung_tugas_guru + $pak2->pendukung_tugas_guru2,3)) :'-';  }} </td>
                    </tr>
                    <tr>
                        <td class="spasi" colspan="3">3. Memperoleh Penghargaan</td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->memperoleh_penghargaan !=0? str_replace('.',',',$pak2->memperoleh_penghargaan):'-'; }} </td>
                        <td class="spasi" style="text-align:right"> {{ $pak2->memperoleh_penghargaan2 !=0?  str_replace('.',',',$pak2->memperoleh_penghargaan2):'-'; }} </td>
                        <td class="spasi" style="text-align:right"> {{ number_format($pak2->memperoleh_penghargaan + $pak2->memperoleh_penghargaan2,3)  !=0 ? str_replace('.',',',number_format($pak2->memperoleh_penghargaan + $pak2->memperoleh_penghargaan2,3)) :'-';}} </td>
                    </tr>
                    <tr>
                        <td class="spasi" colspan="4"><b>Jumlah Unsur Penunjang	</b></td>
                        <td class="spasi" style="text-align:right">
                            <b>
                                {{
                                    number_format(
                                    $pak2->ijazah_tidak_sesuai +
                                    $pak2->pendukung_tugas_guru +
                                    $pak2->memperoleh_penghargaan
                                    ,3)
                                    !=0?
                                    str_replace('.',',',
                                    number_format(
                                    $pak2->ijazah_tidak_sesuai +
                                    $pak2->pendukung_tugas_guru +
                                    $pak2->memperoleh_penghargaan
                                    ,3)
                                    )
                                    :'-';
                                }}
                            </b>
                        </td>
                        <td class="spasi" style="text-align:right">
                            <b>
                                {{
                                    number_format(
                                    $pak2->ijazah_tidak_sesuai2 +
                                    $pak2->pendukung_tugas_guru2 +
                                    $pak2->memperoleh_penghargaan2
                                    ,3)
                                    !=0?
                                    str_replace('.',',',
                                    number_format(
                                    $pak2->ijazah_tidak_sesuai2 +
                                    $pak2->pendukung_tugas_guru2 +
                                    $pak2->memperoleh_penghargaan2
                                    ,3)
                                    )
                                    :'-';
                                }}
                            </b>
                        </td>
                        <td class="spasi" style="text-align:right">
                            <b>
                                {{
                                    number_format(
                                    $pak2->ijazah_tidak_sesuai +
                                    $pak2->pendukung_tugas_guru +
                                    $pak2->memperoleh_penghargaan +

                                    $pak2->ijazah_tidak_sesuai2 +
                                    $pak2->pendukung_tugas_guru2 +
                                    $pak2->memperoleh_penghargaan2
                                    ,3)
                                    !=0?
                                    str_replace('.',',',
                                    number_format(
                                    $pak2->ijazah_tidak_sesuai +
                                    $pak2->pendukung_tugas_guru +
                                    $pak2->memperoleh_penghargaan +

                                    $pak2->ijazah_tidak_sesuai2 +
                                    $pak2->pendukung_tugas_guru2 +
                                    $pak2->memperoleh_penghargaan2
                                    ,3)
                                    )
                                    :'-';
                                }}
                            </b>
                        </td>
                    </tr>
                    <td class="spasi" colspan="4"><b> Jumlah Unsur Utama dan Unsur Penunjang</b></td>
                        <td class="spasi" style="text-align:right">
                            <b>
                                {{
                                    number_format(
                                    $pak2->ijazah_tidak_sesuai +
                                    $pak2->pendukung_tugas_guru +
                                    $pak2->memperoleh_penghargaan +

                                    $pak2->pendidikan_sekolah +
                                    $pak2->pelatihan_prajabatan +
                                    $pak2->proses_pembelajaran +
                                    $pak2->proses_bimbingan +
                                    $pak2->tugas_lain +
                                    $pak2->pengembangan_diri +
                                    $pak2->publikasi_ilmiah +
                                    $pak2->karya_inovatif +


                                    $pak2->tertinggal

                                    ,3)
                                    !=0?
                                    str_replace('.',',',
                                    number_format(
                                    $pak2->ijazah_tidak_sesuai +
                                    $pak2->pendukung_tugas_guru +
                                    $pak2->memperoleh_penghargaan +

                                    $pak2->pendidikan_sekolah +
                                    $pak2->pelatihan_prajabatan +
                                    $pak2->proses_pembelajaran +
                                    $pak2->proses_bimbingan +
                                    $pak2->tugas_lain +
                                    $pak2->pengembangan_diri +
                                    $pak2->publikasi_ilmiah +
                                    $pak2->karya_inovatif +


                                    $pak2->tertinggal

                                    ,3)
                                    )
                                    :'-';


                                }}
                            </b>
                        </td>
                        <td class="spasi" style="text-align:right">
                            <b>
                                {{
                                    number_format(
                                    $pak2->ijazah_tidak_sesuai2 +
                                    $pak2->pendukung_tugas_guru2 +
                                    $pak2->memperoleh_penghargaan2 +

                                    $pak2->pendidikan_sekolah2 +
                                    $pak2->pelatihan_prajabatan2 +
                                    $pak2->proses_pembelajaran2 +
                                    $pak2->proses_bimbingan2 +
                                    $pak2->tugas_lain2 +
                                    $pak2->pengembangan_diri2 +
                                    $pak2->publikasi_ilmiah2 +
                                    $pak2->karya_inovatif2 +

                                    $pak2->tertinggal2

                                    ,3)
                                    !=0?
                                    str_replace('.',',',
                                    number_format(
                                    $pak2->ijazah_tidak_sesuai2 +
                                    $pak2->pendukung_tugas_guru2 +
                                    $pak2->memperoleh_penghargaan2 +

                                    $pak2->pendidikan_sekolah2 +
                                    $pak2->pelatihan_prajabatan2 +
                                    $pak2->proses_pembelajaran2 +
                                    $pak2->proses_bimbingan2 +
                                    $pak2->tugas_lain2 +
                                    $pak2->pengembangan_diri2 +
                                    $pak2->publikasi_ilmiah2 +
                                    $pak2->karya_inovatif2 +

                                    $pak2->tertinggal2

                                    ,3)
                                    )
                                    :'-';
                                }}
                                </b>
                        </td>
                        <td class="spasi" style="text-align:right">
                            <b>
                               {{
                                   number_format(
                                   $pak2->ijazah_tidak_sesuai +
                                   $pak2->pendukung_tugas_guru +
                                   $pak2->memperoleh_penghargaan +

                                   $pak2->ijazah_tidak_sesuai2 +
                                   $pak2->pendukung_tugas_guru2 +
                                   $pak2->memperoleh_penghargaan2 +

                                   $pak2->pendidikan_sekolah +
                                   $pak2->pelatihan_prajabatan +
                                   $pak2->proses_pembelajaran +
                                   $pak2->proses_bimbingan +
                                   $pak2->tugas_lain +
                                   $pak2->pengembangan_diri +
                                   $pak2->publikasi_ilmiah +
                                   $pak2->karya_inovatif +

                                   $pak2->pendidikan_sekolah2 +
                                   $pak2->pelatihan_prajabatan2 +
                                   $pak2->proses_pembelajaran2 +
                                   $pak2->proses_bimbingan2 +
                                   $pak2->tugas_lain2 +
                                   $pak2->pengembangan_diri2 +
                                   $pak2->publikasi_ilmiah2 +
                                   $pak2->karya_inovatif2 +

                                   $pak2->tertinggal +

                                   $pak2->tertinggal2

                                   ,3)
                                   !=0?
                                   str_replace('.',',',
                                   number_format(
                                   $pak2->ijazah_tidak_sesuai +
                                   $pak2->pendukung_tugas_guru +
                                   $pak2->memperoleh_penghargaan +

                                   $pak2->ijazah_tidak_sesuai2 +
                                   $pak2->pendukung_tugas_guru2 +
                                   $pak2->memperoleh_penghargaan2 +

                                   $pak2->pendidikan_sekolah +
                                   $pak2->pelatihan_prajabatan +
                                   $pak2->proses_pembelajaran +
                                   $pak2->proses_bimbingan +
                                   $pak2->tugas_lain +
                                   $pak2->pengembangan_diri +
                                   $pak2->publikasi_ilmiah +
                                   $pak2->karya_inovatif +

                                   $pak2->pendidikan_sekolah2 +
                                   $pak2->pelatihan_prajabatan2 +
                                   $pak2->proses_pembelajaran2 +
                                   $pak2->proses_bimbingan2 +
                                   $pak2->tugas_lain2 +
                                   $pak2->pengembangan_diri2 +
                                   $pak2->publikasi_ilmiah2 +
                                   $pak2->karya_inovatif2 +

                                   $pak2->tertinggal +

                                   $pak2->tertinggal2

                                   ,3)
                                   )
                                   :'-';
                                }}
                                </b>
                        </td>
                    </tr>
                    <tr>
                        <td  style="text-align:center !important"><b> III</b></td>
                        <td class="spasi" colspan="7">
                            <b>
                                @if ($naik_pangkat == 1)
                                    Dapat dipertimbangkan untuk Kenaikan Pangkat, Golongan, TMT: {{ $pangkat->pangkat_sebelum  }} , PAK {{\Carbon\Carbon::parse(now())->format('m')<=4?'April':'Oktober' }} Tahun {{\Carbon\Carbon::parse(now())->format('Y')}}
                                @else
                                    Tidak dapat dipertimbangkan untuk Kenaikan Pangkat, Golongan, TMT: {{ $pangkat->pangkat_sebelum  }} , PAK {{\Carbon\Carbon::parse(now())->format('m')<=4?'April':'Oktober' }} Tahun {{\Carbon\Carbon::parse(now())->format('Y')}}
                                @endif
                            </b>
                        </td>
                    </tr>

            </tbody>
            </table>


            <table width="100%" style="font-size:9; border: none !important;vertical-align:top;">
                <tr style="border: none !important;">
                    <td  style="border: none !important;">
                        <table width="100%" style="border: none !important;vertical-align:top;">
                            <tr >
                                <td width="10%" style="border: none !important;">Nama</td>
                                <td width="2%" style="border: none !important;">:</td>
                                <td style="border: none !important;">{{ $pak->name}}</td>
                            </tr>
                            <tr >
                                <td width="10%" style="border: none !important;">NIP</td>
                                <td width="2%" style="border: none !important;">:</td>
                                <td style="border: none !important;">{{ $pak->username }}</td>
                            </tr>
                            <tr >
                                <td width="10%" style="border: none !important;">Alamat</td>
                                <td width="2%" style="border: none !important;">:</td>
                                <td style="border: none !important;">{{ $pak->alamat_rumah }}</td>
                            </tr>
                        </table>
                    </td>
                    {{-- <td style="border: none !important;" >

                    </td> --}}
                    <td width="200px" style="border: none !important;vertical-align:top;">
                        <table width="100%" style="border: none !important;vertical-align:top;">
                            <tr >
                                <td width="50%" style="border: none !important;vertical-align:top;">Ditetapkan di</td>
                                <td width="2%" style="border: none !important;vertical-align:top;">:</td>
                                <td style="border: none !important;vertical-align:top;">Tanjung Selor</td>
                            </tr>
                            <tr >
                                <td  style="border: none !important;">Pada Tanggal</td>
                                <td width="2%" style="border: none !important;">:</td>
                                <td  style="border: none !important;">{{tgl_indo($settings->tgl_pak_ttd)}}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table width="100%" style="font-size:10; border: none !important;vertical-align:top;align:right">
                <tr style="border: none !important;">
                    <td  style="border: none !important;">
                        {{-- <td  width="520px" style="border: none !important;"> --}}

                            Tembusan : Disampaikan Kepada Yth. <br>
                            &nbsp;1. Kepala Kantor Regional VIII BKN Banjarmasin di Banjarbaru <br>
                            &nbsp;2. Gubernur kalimantan Utara <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;    Up. Kepala BKD Prov. Kaltara di Tanjung Selor <br>
                            &nbsp;3. Sekretaris Tim Penilai Penetapan Angka Kredit <br>
                            &nbsp;4. Kepala Sekolah yang bersangkutan <br>
                            &nbsp;5. yang bersangkutan <br>

                    </td>
                    {{-- <td style="border: none !important;" >

                    </td> --}}
                    {{-- <td width="50%" style="border: none !important;vertical-align:top;font-size:11"> --}}
                    <td width="160px" style="border: none !important;vertical-align:top;font-size:11;white-space: nowrap;">
                        {{$settings->kadis}},
                        <br>
                        <br>
                        <br>
                        <br>
                        {{$settings->nama_kadis}} <br>
                        {{$settings->jabatan_kadis}} <br>
                        {{$settings->nip_kadis}} <br>
                    </td>
                </tr>
            </table>

</body>
</html>
