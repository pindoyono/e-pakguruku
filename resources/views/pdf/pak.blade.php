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
          margin: 0.5em 3em;
        }

        table {

          border-collapse: collapse;
        }

        .wrapper {
            border: 0px solid white;
        }

        </style>



        <div class="container">
            <table width="100%" style="border: none !important;  vertical-align:top; font-size:10">
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
                                <td  width="100px"  style="border: none !important;">
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
            <br>
            <div style="text-align:center; border: none !important;" >
                <span style="font-size:14; font-weight:bold; ">
                    PENETAPAN ANGKA KREDIT JABATAN FUNGSIONAL GURU <br>
                    DINAS PENDIDIKAN DAN KEBUDAYAAN PROVINSI KALIMANTAN UTARA <br>
                </span>
                <span style="font-size:10">
                    Nomor :  823.3/2428/Disdikbud-A1/KU/III/2022 <br> <br>
                </span>
                <span style="font-size:12; font-weight:bold">
                    Masa Penilaian : {{ tgl_indo($pak->awal).' s/d '.tgl_indo($pak->akhir)}} <br>
                </span>

            </div>

            <table width="100%">
                <tbody style="font-size:10;" >
                    <tr>
                        <td width ="3%">I</td>
                        <td colspan=7 class="text-left"> KETERANGAN PERORANGAN</td>
                    </tr>
                    <tr>
                        <td rowspan=14></td>
                        <td width ="3%" > 1</td>
                        <td colspan=2>Nama</td>
                        <td colspan=4>{{ $pak->name }}</td>
                    </tr>
                    <tr>
                        <td> 2</td>
                        <td colspan=2>NIP</td>
                        <td colspan=4>{{ $pak->username }}</td>
                    </tr>
                    <tr>
                        <td> 3</td>
                        <td colspan=2>NUPTK</td>
                        <td colspan=4>{{ $pak->nuptk }}</td>
                    </tr>
                    <tr>
                        <td> 4</td>
                        <td colspan=2>Tempat, Tanggal Lahir</td>
                        <td colspan=4>{{ $pak->tempat_lahir.', '.tgl_indo($pak->tanggal_lahir) }}</td>
                    </tr>
                    <tr>
                        <td> 5</td>
                        <td colspan=2>Jenis Kelamin</td>
                        <td colspan=4>{{$pak->jenis_kelamin}}</td>
                    </tr>
                    <tr>
                        <td> 6</td>
                        <td colspan=2 >Pendidikan yang telah diperhitungkan angka kreditnya</td>
                        {{-- <td colspan=2 style="font-size:9;">Pendidikan yang telah diperhitungkan angka kreditnya</td> --}}
                        <td colspan=4>{{ $pak->pendidikan }}</td>
                    </tr>
                    <tr>
                        <td> 7</td>
                        <td colspan=2>Pangkat / Golongan ruang / TMT</td>
                        <td colspan=4>
                                {{ $pangkat->pangkat.' / '.tgl_indo($pak->tmt_pns)   }}
                        </td>
                    </tr>
                    <tr>
                        <td> 8</td>
                        <td colspan=2>Jabatan Guru / TMT</td>
                        <td colspan=4> {{ $pangkat->jabatan.' / '.tgl_indo($pak->tmt_jabatan)   }}</td>
                    </tr>
                    <tr>
                        <td rowspan=2> 9</td>
                        <td rowspan=2>Masa Kerja Golongan</td>
                        <td>Lama</td>
                        <td colspan=4>{{ masa_kerja(now(),$pak->tmt_cpns)  }}</td>
                    </tr>
                    <tr>
                        <td>Baru</td>
                        <td colspan=4>{{ masa_kerja(\Carbon\Carbon::parse($pak->tmt_pns), $pak->tmt_cpns) }}</td>
                    </tr>
                    <tr>
                        <td> 10</td>
                        <td colspan=2>Jenis Guru </td>
                        <td colspan=4>{{ $pak->jenis_guru }}</td>
                    </tr>
                    <tr>
                        <td> 11</td>
                        <td colspan=2>Unit Kerja </td>
                        <td colspan=4>{{ $pak->sekolah }}</td>
                    </tr>
                    <tr>
                        <td rowspan=2> 12</td>
                        <td rowspan=2>Alamat</td>
                        <td>Sekolah</td>
                        <td colspan=4 style="font-size:9;">{{ $pak->alamat_sekolah }}</td>
                    </tr>
                    <tr>
                        <td>Rumah</td>
                        <td colspan=4 style="font-size:9;">{{ $pak->alamat_rumah }}</td>
                    </tr>



                    <tr style="text-align:center" >
                        <td>II</td>
                        <td colspan=4> PENETAPAN ANGKA KREDIT</td>
                        <td width="10%" > LAMA</td>
                        <td width="10%"> BARU</td>
                        <td width="10%"> JUMLAH</td>
                    </tr>
                    <tr>
                        <td rowspan="19"></td>
                        <td >1</td>
                        <td colspan=3> <b>Unsur Utama</b></td>
                        <td style="text-align:right"> <b> {{ $pak2->tertinggal }}  </b></td>
                        <td style="text-align:right"> <b> {{ $pak2->tertinggal2 }}   </b></td>
                        <td style="text-align:right"> <b> {{ number_format($pak2->tertinggal + $pak2->tertinggal2,3) }}  </b></td>
                    </tr>
                    <tr>
                        <td rowspan="12"></td>
                        <td colspan=3> a. Pendidikan</td>
                        <td > </td>
                        <td > </td>
                        <td > </td>
                    </tr>
                    <tr>
                        <td colspan="3" >1) Pendidikan sekolah dan memperoleh gelar ijazah </td>
                        <td style="text-align:right"> {{ $pak2->pendidikan_sekolah }} </td>
                        <td style="text-align:right"> {{ $pak2->pendidikan_sekolah2 }} </td>
                        <td style="text-align:right"> {{ number_format($pak2->pendidikan_sekolah + $pak2->pendidikan_sekolah2,3) }} </td>
                    </tr>
                    <tr>
                        <td colspan="3">2) Mengikuti pelatihan prajabatan</td>
                        <td style="text-align:right"> {{ $pak2->pelatihan_prajabatan }} </td>
                        <td style="text-align:right"> {{ $pak2->pelatihan_prajabatan2 }} </td>
                        <td style="text-align:right"> {{ number_format($pak2->pelatihan_prajabatan + $pak2->pelatihan_prajabatan2,3) }} </td>
                    </tr>
                    <tr>
                        <td colspan="3">b. Pembelajaran /  bimbingan dan tugas tertentu</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3">    1) Proses pembelajaran	</td>
                        <td style="text-align:right"> {{ $pak2->proses_pembelajaran }} </td>
                        <td style="text-align:right"> {{ $pak2->proses_pembelajaran2 }} </td>
                        <td style="text-align:right"> {{ number_format($pak2->proses_pembelajaran + $pak2->proses_pembelajaran2,3) }} </td>
                    </tr>
                    <tr>
                        <td colspan="3">    2) Proses bimbingan	</td>
                        <td style="text-align:right"> {{ $pak2->proses_bimbingan }} </td>
                        <td style="text-align:right"> {{ $pak2->proses_bimbingan2 }} </td>
                        <td style="text-align:right"> {{ number_format($pak2->proses_bimbingan + $pak2->proses_bimbingan2,3) }} </td>
                    </tr>
                    <tr>
                        <td colspan="3">    3) Tugas lain yang relevan</td>
                        <td style="text-align:right"> {{ $pak2->tugas_lain }} </td>
                        <td style="text-align:right"> {{ $pak2->tugas_lain2 }} </td>
                        <td style="text-align:right"> {{ number_format($pak2->tugas_lain + $pak2->tugas_lain2,3) }} </td>
                    </tr>
                    <tr>
                        <td colspan="3">c. Pengembangan Keprofesian</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3"> 1) Pengembangan Diri</td>
                        <td style="text-align:right"> {{ $pak2->pengembangan_diri }} </td>
                        <td style="text-align:right"> {{ $pak2->pengembangan_diri2 }} </td>
                        <td style="text-align:right"> {{ number_format($pak2->pengembangan_diri + $pak2->pengembangan_diri2,3) }} </td>
                    </tr>
                    <tr>
                        <td colspan="3">2) Publikasi Ilmiah</td>
                        <td style="text-align:right"> {{ $pak2->publikasi_ilmiah }} </td>
                        <td style="text-align:right"> {{ $pak2->publikasi_ilmiah2 }} </td>
                        <td style="text-align:right"> {{ number_format($pak2->publikasi_ilmiah + $pak2->publikasi_ilmiah2,3) }} </td>
                    </tr>
                    <tr>
                        <td colspan="3">  3) Karya Inovatif</td>
                        <td style="text-align:right"> {{ $pak2->karya_inovatif }} </td>
                        <td style="text-align:right"> {{ $pak2->karya_inovatif2 }} </td>
                        <td style="text-align:right"> {{ number_format($pak2->karya_inovatif + $pak2->karya_inovatif2,3) }} </td>
                    </tr>
                    <tr>
                        <td colspan="3"> <b>Jumlah Unsur Utama</b></td>
                        <td style="text-align:right">
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
                                    $pak2->karya_inovatif
                                    ,3);
                                }}
                            </b>
                        </td>
                        <td style="text-align:right">
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
                                    $pak2->karya_inovatif2
                                    ,3);
                                }}
                            </b>
                        </td>
                        <td style="text-align:right">
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

                                    $pak2->pendidikan_sekolah2 +
                                    $pak2->pelatihan_prajabatan2 +
                                    $pak2->proses_pembelajaran2 +
                                    $pak2->proses_bimbingan2 +
                                    $pak2->tugas_lain2 +
                                    $pak2->pengembangan_diri2 +
                                    $pak2->publikasi_ilmiah2 +
                                    $pak2->karya_inovatif2
                                    ,3);
                                }}
                                </b>
                            </td>
                    </tr>
                    <tr>
                        <td >2</td>
                        <td colspan="3"><b>Unsur Penunjang</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td rowspan="3"></td>
                        <td colspan="3">1. Ijazah yang tidak sesuai</td>
                        <td style="text-align:right"> {{ $pak2->ijazah_tidak_sesuai }} </td>
                        <td style="text-align:right"> {{ $pak2->ijazah_tidak_sesuai2 }} </td>
                        <td style="text-align:right"> {{ number_format($pak2->ijazah_tidak_sesuai + $pak2->ijazah_tidak_sesuai2,3) }} </td>
                    </tr>


                    <tr>
                        <td colspan="3">2. Pendukung tugas guru</td>
                        <td style="text-align:right"> {{ $pak2->pendukung_tugas_guru }} </td>
                        <td style="text-align:right"> {{ $pak2->pendukung_tugas_guru2 }} </td>
                        <td style="text-align:right"> {{ number_format($pak2->pendukung_tugas_guru + $pak2->pendukung_tugas_guru2,3) }} </td>
                    </tr>
                    <tr>
                        <td colspan="3">3. Memperoleh Penghargaan</td>
                        <td style="text-align:right"> {{ $pak2->memperoleh_penghargaan }} </td>
                        <td style="text-align:right"> {{ $pak2->memperoleh_penghargaan2 }} </td>
                        <td style="text-align:right"> {{ number_format($pak2->memperoleh_penghargaan + $pak2->memperoleh_penghargaan2,3) }} </td>
                    </tr>
                    <tr>
                        <td colspan="4"><b>Jumlah Unsur Penunjang	</b></td>
                        <td style="text-align:right">
                            <b>
                                {{
                                    number_format(
                                    $pak2->ijazah_tidak_sesuai +
                                    $pak2->pendukung_tugas_guru +
                                    $pak2->memperoleh_penghargaan
                                    ,3);
                                }}
                            </b>
                        </td>
                        <td style="text-align:right">
                            <b>
                                {{
                                    number_format(
                                    $pak2->ijazah_tidak_sesuai2 +
                                    $pak2->pendukung_tugas_guru2 +
                                    $pak2->memperoleh_penghargaan2
                                    ,3);
                                }}
                            </b>
                        </td>
                        <td style="text-align:right">
                            <b>
                                {{
                                    number_format(
                                    $pak2->ijazah_tidak_sesuai +
                                    $pak2->pendukung_tugas_guru +
                                    $pak2->memperoleh_penghargaan +

                                    $pak2->ijazah_tidak_sesuai2 +
                                    $pak2->pendukung_tugas_guru2 +
                                    $pak2->memperoleh_penghargaan2
                                    ,3);
                                }}
                            </b>
                        </td>
                    </tr>
                    <td colspan="4"><b> Jumlah Unsur Utama dan Unsur Penunjang</b></td>
                        <td style="text-align:right">
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

                                    ,3);


                                }}
                            </b>
                        </td>
                        <td style="text-align:right">
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

                                    ,3);
                                }}
                                </b>
                        </td>
                        <td style="text-align:right">
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

                                   ,3);
                                }}
                                </b>
                        </td>
                    </tr>
                    <tr>
                        <td ><b> III</b></td>
                        <td colspan="7">
                            <b>
                                @if ($naik_pangkat == 1)
                                    Naik Pangkat
                                @else
                                    Tidak dapat dipertimbangkan untuk Kenaikan Pangkat, Golongan, TMT: {{ $pangkat->pangkat_sebelum  }} , PAK Tahun {{\Carbon\Carbon::parse($pak->awal)->format('Y')}}
                                @endif
                            </b>
                        </td>
                    </tr>

            </tbody>
            </table>


            <table width="100%" style="font-size:10; border: none !important;vertical-align:top;">
                <tr style="border: none !important;">
                    <td  style="border: none !important;">
                        <table width="100%" style="border: none !important;vertical-align:top;">
                            <tr >
                                <td width="20%" style="border: none !important;">Nama</td>
                                <td width="2%" style="border: none !important;">:</td>
                                <td style="border: none !important;">Patan Pindoyono</td>
                            </tr>
                            <tr >
                                <td width="10%" style="border: none !important;">NIP</td>
                                <td width="2%" style="border: none !important;">:</td>
                                <td style="border: none !important;">199106102018021001</td>
                            </tr>
                            <tr >
                                <td width="10%" style="border: none !important;">Alamat</td>
                                <td width="2%" style="border: none !important;">:</td>
                                <td style="border: none !important;">JL AMD no 18 RT 18</td>
                            </tr>
                        </table>
                    </td>
                    {{-- <td style="border: none !important;" >

                    </td> --}}
                    <td width="25%" style="border: none !important;vertical-align:top;">
                        <table width="100%" style="border: none !important;vertical-align:top;">
                            <tr >
                                <td width="50%" style="border: none !important;vertical-align:top;">Ditetapkan di</td>
                                <td width="2%" style="border: none !important;vertical-align:top;">:</td>
                                <td style="border: none !important;vertical-align:top;">Tanjung Selor</td>
                            </tr>
                            <tr >
                                <td  style="border: none !important;">Pada Tanggal</td>
                                <td width="2%" style="border: none !important;">:</td>
                                <td  style="border: none !important;">02 Maret 2022</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <br>
            <table width="100%" style="font-size:10; border: none !important;vertical-align:top;">
                <tr style="border: none !important;">
                    <td  width="90%" style="border: none !important;">

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
                    <td width="40%" style="border: none !important;vertical-align:top;">
                        Kepala Dinas,
                        <br>
                        <br>
                        <br>
                        <br>
                        Drs. Teguh Henri S., M.Pd <br>
                        Pembina Tingkat I, IV/b <br>
                        NIP. 196502271993031006 <br>
                    </td>
                </tr>
            </table>

</body>
</html>
