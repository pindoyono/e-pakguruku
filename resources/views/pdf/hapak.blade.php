<!DOCTYPE html>
<html>
<head>
    <title>Hapak</title>
</head>
<body>
        <table width="100%" style="text-align: center; border: none !important;">
            <tr style="text-align: center; border: none !important;">
                <td  width="10%" style="text-align: center; border: none !important;">
                    <img style="height: auto; width: 70px;" src="storage/kaltara.png" />
                </td>
                <td style="text-align: center; border: none !important;" >
                    <span style="font-size:14">
                        PEMERINTAH PROVINSI KALIMANTAN UTARA <br>
                    </span>
                    <span style="font-size:18">
                        DINAS PENDIDIKAN DAN KEBUDAYAAN <br>
                    </span>
                    <span style="font-size:9">
                        Alamat : Jalan Sengkawit Komplek Pasar Induk Gedung Kanan Lt. II Telp/Fax: (0552) 2020503
                    </span>
                    <span style="font-size:9">
                        Tanjung Selor Kode Pos 77212, E-mail: kaltara.pendidikan@yahoo.com / katara.pendidikan@gmail.com<br>
                    </span>
                    <span style="font-size:12">
                        TANJUNG SELOR
                    </span>
                </td>
                <td width="10%" style="text-align: center; border: none !important;"></td>
            </tr>
        </table>
        <hr>
        {{-- src="{{asset('assets/img/kaltara.png')}} --}}

    <div style="font-size:11">

        <table width="100%" style="text-align: center; border: none !important;">
            <tr style="text-align: left; border: none !important;">
                <td  width="10%" style="text-align: left; border: none !important;">
                    Nomor
                </td>
                <td  width="2%" style="text-align: left; border: none !important;">
                    :
                </td>
                <td style="text-align: left; border: none !important;" >
                    DISdikbu...
                </td>
                <td rowspan="3" width="30%" style="border: none !important; vertical-align:top;"">
                    Tanjung Selor, 10 Juni 2022 <br>
                    Yth, Kepala SMAN 8 Malinau <br>
                    di <br>
                    Tempat <br>
                </td>
            </tr>
            <tr style="text-align: left; border: none !important;">
                <td  width="10%" style="text-align: left; border: none !important;">
                    Lampiran
                </td>
                <td  width="2%" style="text-align: left; border: none !important;">
                    :
                </td>
                <td style="text-align: left; border: none !important;" >
                    lamp....
                </td>
            </tr>
            <tr style="text-align: left; border: none !important;">
                <td  width="10%" style="text-align: left; border: none !important; vertical-align:top;">
                    Hal
                </td>
                <td  width="2%" style="text-align: left; border: none !important; vertical-align:top;">
                    :
                </td>
                <td style="text-align: left; border: none !important; vertical-align:top;" >
                    hal.... <br>
                    an...
                </td>
            </tr>
        </table>

        Sehubungan dengan surat kepala SMAN 8 Malinau Perihal usul penilaian angka kredit saudara

        <table width="100%" style=" border: none !important;">
            <tr style=" border: none !important;">
                <td  width="15%" style=" border: none !important;">
                    Nama
                </td>
                <td width="1%" style=" border: none !important;" >
                    :
                </td>
                <td width="60%" style=" border: none !important;">

                </td>
            </tr>
            <tr style=" border: none !important;">
                <td  width="10%" style=" border: none !important;">
                    NIP
                </td>
                <td width="1%" style=" border: none !important;" >
                    :
                </td>
                <td width="60%" style=" border: none !important;">

                </td>
            </tr>
            <tr style=" border: none !important;">
                <td  width="10%" style=" border: none !important;">
                    Nama
                </td>
                <td width="1%" style=" border: none !important;" >
                    :
                </td>
                <td width="60%" style=" border: none !important;">

                </td>
            </tr>
            <tr style=" border: none !important;">
                <td  width="10%" style=" border: none !important;">
                    Tempat, Tgl Lahir
                </td>
                <td width="1%" style=" border: none !important;" >
                    :
                </td>
                <td width="60%" style=" border: none !important;">

                </td>
            </tr>
            <tr style=" border: none !important;">
                <td  width="10%" style=" border: none !important;">
                    Pangkat, Gol Ruang
                </td>
                <td width="1%" style=" border: none !important;" >
                    :
                </td>
                <td width="60%" style=" border: none !important;">

                </td>
            </tr>
            <tr style=" border: none !important;">
                <td  width="10%" style=" border: none !important;">
                    Unit Kerja
                </td>
                <td width="1%" style=" border: none !important;" >
                    :
                </td>
                <td width="60%" style=" border: none !important;">

                </td>
            </tr>
        </table>
            Yang telah dinilai oleh Tim Penilai ANgka Kredit Jabatan fungsional Guru Dinas Pendidikan dan
            Kebudayaan Provinsi Kalimantan Utara pada tanggal 20 November s.d 3 Desember 2022, dengan hasil penilaian DUPAK
            dan bukti fisik pada masa penilaian 01 januari 2019 s.d 30 Desember 2021 adalah sebagai berikut:
    </div>
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

        <div>
            <table width="100%">
                <tbody style="font-size:10">
                    <tr style="text-align:center" >
                        <td colspan=4> KEGIATAN</td>
                        <td width="10%"> LAMA</td>
                        <td width="10%"> BARU</td>
                        <td width="10%"> JUMLAH</td>
                    </tr>
                    <tr>
                        <td width="2%"" >1</td>
                        <td colspan=3> <b>Unsur Utama</b></td>
                        <td style="text-align:right">
                            {{$user->tertinggal != null ? $user->tertinggal : 0}}
                        </td>
                        <td style="text-align:right">
                            {{
                                  number_format(
                                         ($pak->tertinggal + $pak->tertinggal2) - $user->tertinggal
                                     ,3);
                            }}

                        </td>
                        <td style="text-align:right">
                            {{
                                 number_format(
                                         ($pak->tertinggal + $pak->tertinggal2)
                                     ,3);
                            }}
                        </td>
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
                        <td style="text-align:right">
                            {{$user->pendidikan_sekolah != null ? $user->pendidikan_sekolah : 0}}
                         </td>
                         <td style="text-align:right">
                             <span id="jml_sekolah">
                                 {{
                                     number_format(
                                         ($pak->pendidikan_sekolah + $pak->pendidikan_sekolah2) - $user->pendidikan_sekolah
                                     ,3);
                                 }}
                             </span>
                         </td>
                         <td style="text-align:right">
                             <span id="jml_sekolah">
                                 {{
                                     number_format(
                                         $pak->pendidikan_sekolah + $pak->pendidikan_sekolah2
                                     ,3);
                                 }}
                             </span>
                         </td>
                    </tr>
                    <tr>
                        <td colspan="3">2) Mengikuti pelatihan prajabatan</td>
                        <td style="text-align:right">
                            {{$user->pelatihan_prajabatan != null ? $user->pelatihan_prajabatan : 0}}
                         </td>
                         <td style="text-align:right">
                             <span id="jml_pra_jabatan">
                                 {{
                                     number_format(
                                        ( $pak->pelatihan_prajabatan + $pak->pelatihan_prajabatan2) - $user->pelatihan_prajabatan
                                     ,3);
                                 }}
                             </span>
                         </td>
                         <td style="text-align:right">
                             <span id="jml_pra_jabatan">
                                 {{
                                     number_format(
                                         $pak->pelatihan_prajabatan + $pak->pelatihan_prajabatan2
                                     ,3);
                                 }}
                             </span>
                         </td>
                    </tr>
                    <tr>
                        <td colspan="3">b. Pembelajaran /  bimbingan dan tugas tertentu</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3">    1) Proses pembelajaran	</td>
                        <td style="text-align:right">
                            {{$user->proses_pembelajaran != null ? $user->proses_pembelajaran : 0}}
                        </td>
                        <td style="text-align:right">
                            <span id="jml_prose_pembelajaran">
                                {{
                                    number_format(
                                       ( $pak->proses_pembelajaran + $pak->proses_pembelajaran2) - $user->proses_pembelajaran
                                    ,3);
                                }}
                            </span>
                        </td>
                        <td style="text-align:right">
                            <span id="jml_prose_pembelajaran">
                                {{
                                    number_format(
                                        $pak->proses_pembelajaran + $pak->proses_pembelajaran2
                                    ,3);
                                }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">    2) Proses bimbingan	</td>
                        <td style="text-align:right">
                            {{$user->proses_bimbingan != null ? $user->proses_bimbingan : 0}}
                        </td>
                        <td style="text-align:right">
                            <span id="jml_proses_bimbingan">
                                {{
                                    number_format(
                                        ($pak->proses_bimbingan + $pak->proses_bimbingan2) - $user->proses_bimbingan
                                    ,3);
                                }}
                            </span>
                        </td>
                        <td style="text-align:right">
                            <span id="jml_proses_bimbingan">
                                {{
                                    number_format(
                                        $pak->proses_bimbingan + $pak->proses_bimbingan2
                                    ,3);
                                }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">    3) Tugas lain yang relevan</td>
                        <td style="text-align:right">
                            {{$user->tugas_lain != null ? $user->tugas_lain : 0}}
                          </td>
                          <td style="text-align:right">
                              <span id="jml_tugas_lain">
                                  {{
                                      number_format(
                                          ($pak->tugas_lain + $pak->tugas_lain2) - $user->tugas_lain
                                      ,3);
                                  }}
                              </span>
                          </td>
                          <td style="text-align:right">
                              <span id="jml_tugas_lain">
                                  {{
                                      number_format(
                                          $pak->tugas_lain + $pak->tugas_lain2
                                      ,3);
                                  }}
                              </span>
                          </td>
                    </tr>
                    <tr>
                        <td colspan="3">c. Pengembangan Keprofesian</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3"> 1) Pengembangan Diri</td>
                        <td style="text-align:right">
                            {{$user->pengembangan_diri != null ? $user->pengembangan_diri : 0}}
                        </td>
                        <td style="text-align:right">
                            <span id="jml_pengembangan_diri">
                                {{
                                    number_format(
                                        ($pak->pengembangan_diri + $pak->pengembangan_diri2) - $user->pengembangan_diri
                                    ,3);
                                }}
                            </span>
                        </td>
                        <td style="text-align:right">
                            <span id="jml_pengembangan_diri">
                                {{
                                    number_format(
                                        $pak->pengembangan_diri + $pak->pengembangan_diri2
                                    ,3);
                                }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">2) Publikasi Ilmiah</td>
                        <td style="text-align:right">
                            {{$user->publikasi_ilmiah != null ? $user->publikasi_ilmiah : 0}}
                        </td>
                        <td style="text-align:right">
                            <span id="jml_karya_ilmiah">
                                {{
                                    number_format(
                                        ($pak->publikasi_ilmiah + $pak->publikasi_ilmiah2) - $user->publikasi_ilmiah
                                    ,3);
                                }}
                            </span>
                        </td>
                        <td style="text-align:right">
                            <span id="jml_karya_ilmiah">
                                {{
                                    number_format(
                                        $pak->publikasi_ilmiah + $pak->publikasi_ilmiah2
                                    ,3);
                                }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">  3) Karya Inovatif</td>
                        <td style="text-align:right">
                            {{$user->karya_inovatif != null ? $user->karya_inovatif : 0}}
                        </td>
                        <td style="text-align:right">
                            <span id="jml_karya_inovatif">
                                {{
                                    number_format(
                                    ($pak->karya_inovatif + $pak->karya_inovatif2) - $user->karya_inovatif
                                    ,3);
                                }}
                            </span>
                        </td>
                        <td style="text-align:right">
                            <span id="jml_karya_inovatif">
                                {{
                                    number_format(
                                    $pak->karya_inovatif + $pak->karya_inovatif2
                                    ,3);
                                }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"> <b>Jumlah Unsur Utama</b></td>
                        <td style="text-align:right">
                            <b>
                                {{
                                    number_format(
                                   $user->pendidikan_sekolah
                                   + $user->pelatihan_prajabatan
                                   + $user->proses_pembelajaran
                                   + $user->proses_bimbingan
                                   + $user->tugas_lain
                                   + $user->pengembangan_diri
                                   + $user->publikasi_ilmiah
                                   + $user->karya_inovatif
                                   ,3);
                               }}
                            </b>
                        </td>
                        <td style="text-align:right">
                            <b>
                                {{
                                    $ak_utama_peroleh_saatini = number_format(
                                    ($pak->pendidikan_sekolah + $pak->pendidikan_sekolah2 +
                                    $pak->pelatihan_prajabatan + $pak->pelatihan_prajabatan2 +
                                    $pak->proses_pembelajaran + $pak->proses_pembelajaran2 +
                                    $pak->proses_bimbingan + $pak->proses_bimbingan2 +
                                    $pak->tugas_lain + $pak->tugas_lain2 +
                                    $pak->pengembangan_diri + $pak->pengembangan_diri2 +
                                    $pak->publikasi_ilmiah + $pak->publikasi_ilmiah2 +
                                    $pak->karya_inovatif + $pak->karya_inovatif2
                                    )
                                    -
                                    (
                                    $user->pendidikan_sekolah
                                    + $user->pelatihan_prajabatan
                                    + $user->proses_pembelajaran
                                    + $user->proses_bimbingan
                                    + $user->tugas_lain
                                    + $user->pengembangan_diri
                                    + $user->publikasi_ilmiah
                                    + $user->karya_inovatif)
                                    ,3);
                                }}
                            </b>
                        </td>
                        <td style="text-align:right">
                            <b>
                                {{
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
                        <td style="text-align:right">
                            {{$user->ijazah_tidak_sesuai != null ? $user->ijazah_tidak_sesuai : 0}}
                        </td>
                        <td style="text-align:right">
                            <span id="jml_ijazah_tidak_sesuai">
                                {{
                                    number_format(
                                        ($pak->ijazah_tidak_sesuai + $pak->ijazah_tidak_sesuai2) - $user->ijazah_tidak_sesuai
                                    ,3);
                                }}
                            </span>
                        </td>
                        <td style="text-align:right">
                            <span id="jml_ijazah_tidak_sesuai">
                                {{
                                    number_format(
                                        $pak->ijazah_tidak_sesuai + $pak->ijazah_tidak_sesuai2
                                    ,3);
                                }}
                            </span>
                        </td>
                    </tr>


                    <tr>
                        <td colspan="3">2. Pendukung tugas guru</td>
                        <td style="text-align:right">
                            {{$user->pendukung_tugas_guru != null ? $user->pendukung_tugas_guru : 0}}
                        </td>
                        <td style="text-align:right">
                            <span id="jml_pendukung_tugas_guru">
                                {{
                                    number_format(
                                       ( $pak->pendukung_tugas_guru + $pak->pendukung_tugas_guru2) - $user->pendukung_tugas_guru
                                    ,3);
                                }}
                            </span>
                        </td>
                        <td style="text-align:right">
                            <span id="jml_pendukung_tugas_guru">
                                {{
                                    number_format(
                                        $pak->pendukung_tugas_guru + $pak->pendukung_tugas_guru2
                                    ,3);
                                }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">3. Memperoleh Penghargaan</td>
                        <td style="text-align:right">
                            {{$user->memperoleh_penghargaan != null ? $user->memperoleh_penghargaan : 0}}
                        </td>
                        <td style="text-align:right">
                            <span id="jml_penghargaan">
                                {{
                                    number_format(
                                        ($pak->memperoleh_penghargaan + $pak->memperoleh_penghargaan2) -  $user->memperoleh_penghargaan
                                    ,3);
                                }}
                            </span>
                        </td>
                        <td style="text-align:right">
                            <span id="jml_penghargaan">
                                {{
                                    number_format(
                                        $pak->memperoleh_penghargaan + $pak->memperoleh_penghargaan2
                                    ,3);
                                }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4"><b>Jumlah Unsur Penunjang	</b></td>
                        <td style="text-align:right">
                            <b>
                                {{
                                    $ak_penunjang_akhir = number_format(
                                        $user->ijazah_tidak_sesuai
                                        + $user->pendukung_tugas_guru
                                        + $user->memperoleh_penghargaan
                                    ,3);
                                }}
                            </b>
                        </td>
                        <td style="text-align:right">
                            <b>
                                {{
                                    $ak_penunjang = number_format(
                                        ($pak->ijazah_tidak_sesuai + $pak->ijazah_tidak_sesuai2 +
                                        $pak->pendukung_tugas_guru + $pak->pendukung_tugas_guru2 +
                                        $pak->memperoleh_penghargaan + $pak->memperoleh_penghargaan2)
                                        -
                                        ($user->ijazah_tidak_sesuai
                                        + $user->pendukung_tugas_guru
                                        + $user->memperoleh_penghargaan)
                                    ,3);
                                }}
                            </b>
                        </td>
                        <td style="text-align:right">
                            <b>
                                {{
                                   number_format(
                                        $pak->ijazah_tidak_sesuai + $pak->ijazah_tidak_sesuai2 +
                                        $pak->pendukung_tugas_guru + $pak->pendukung_tugas_guru2 +
                                        $pak->memperoleh_penghargaan + $pak->memperoleh_penghargaan2
                                    ,3);
                                }}
                            </b>
                        </td>
                    </tr>
                    <td colspan="4"><b> Jumlah Unsur Utama dan Unsur Penunjang</b></td>
                        <td style="text-align:right">
                            <b>
                                {{
                                    $ak_terakhir =  number_format(
                                     $user->pendidikan_sekolah
                                     + $user->pelatihan_prajabatan
                                     + $user->proses_pembelajaran
                                     + $user->proses_bimbingan
                                     + $user->tugas_lain
                                     + $user->pengembangan_diri
                                     + $user->publikasi_ilmiah
                                     + $user->karya_inovatif
                                     + $user->ijazah_tidak_sesuai
                                         + $user->pendukung_tugas_guru
                                         + $user->memperoleh_penghargaan
                                         + $user->tertinggal
                                     ,3);
                                 }}
                            </b>
                        </td>
                        <td style="text-align:right">
                            <b>
                                {{
                                    $ak_diperoleh_saatini = number_format(
                                   ( $pak->pendidikan_sekolah + $pak->pendidikan_sekolah2 +
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
                                        $pak->memperoleh_penghargaan + $pak->memperoleh_penghargaan2)
                                    -

                                   ( $user->pendidikan_sekolah
                                    + $user->pelatihan_prajabatan
                                    + $user->proses_pembelajaran
                                    + $user->proses_bimbingan
                                    + $user->tugas_lain
                                    + $user->pengembangan_diri
                                    + $user->publikasi_ilmiah
                                    + $user->karya_inovatif
                                    + $user->ijazah_tidak_sesuai
                                        + $user->pendukung_tugas_guru
                                        + $user->tertinggal
                                        + $user->memperoleh_penghargaan)

                                    ,3);
                                }}
                            </b>
                        </td>
                        <td style="text-align:right">
                            <b>
                                {{
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
                                }}
                            </b>
                        </td>
                    </tr>

                </tbody>
            </table>

            <p>
                Komposisi Perolehan Angka Kredit yang harus di penuhi adalah sebagai berikut:
            </p>

            <table width="100%" style="font-size: 10">
                <tbody>
                    <tr >
                        <td rowspan="2">Uraian</td>
                        <td rowspan="2">Angka Kredit Komulatif</td>
                        <td colspan="3" style="text-align: center">Unsur Utama</td>
                        <td rowspan="2" width="20%">Unsur Penunjang Maksimal 10%</td>
                    </tr>
                    <tr>
                        <td>Utama (90%)</td>
                        <td>PD</td>
                        <td>PI/KI</td>
                    </tr>
                    <tr>
                        <td>AK Yang Di Peroleh</td>
                        <td style="text-align:right">
                            {{ $ak_diperoleh }}
                        </td>
                        <td style="text-align:right">
                            {{
                                number_format(
                                    $ak_utama_total - (90/100*$jabatan_pak->target_sebelum) + ($pak->tertinggal + $pak->tertinggal2 + $user->tertinggal)
                                ,3);
                            }}
                        </td>
                        <td style="text-align:right">
                            {{
                               $ak_pd = number_format(
                                $pak->pengembangan_diri + $pak->pengembangan_diri2 - $user->pengembangan_diri
                                ,3);
                            }}
                        </td>
                        <td style="text-align:right">
                            {{
                               $ak_piki = number_format(
                                    $pak->publikasi_ilmiah + $pak->publikasi_ilmiah2 +
                                    $pak->karya_inovatif + $pak->karya_inovatif2 - $user->publikasi_ilmiah
                                    - $user->karya_inovatif
                                ,3);
                            }}
                        </td>
                        <td style="text-align:right">
                            {{
                                number_format($ak_penunjang,3 )
                            }}
                        </td>
                    </tr>
                    <tr>
                        <td>AK Yang Wajib Peroleh</td>
                        <td style="text-align:right">
                            {{
                             number_format(
                                 $jabatan_pak->target
                                 ,3);
                            }}
                        </td>
                        <td style="text-align:right">
                            {{
                                number_format(
                                    90/100*$jabatan_pak->akk
                                 ,3);
                            }}
                        </td>
                        <td style="text-align:right">
                            {{
                                number_format(
                                    $jabatan_pak->akpkbpd
                                 ,3);
                            }}
                        </td>
                        <td style="text-align:right">
                            {{
                                number_format(
                                 $jabatan_pak->akpkbpiki
                                 ,3);
                            }}
                        </td>
                        <td style="text-align:right">
                            {{
                                number_format(
                                    $jabatan_pak->akp
                                 ,3);
                            }}
                        </td>
                    </tr>

                    @php $jml_1 = number_format($ak_diperoleh - $jabatan_pak->target,3)  @endphp
                    @php $jml_4 = number_format(($ak_utama_total - (90/100*$jabatan_pak->target_sebelum)) - (90/100*$jabatan_pak->akk) ,3) + ($pak->tertinggal + $pak->tertinggal2 + $user->tertinggal) @endphp
                    @php $jml_2 = number_format($ak_pd - $jabatan_pak->akpkbpd,3) @endphp
                    @php $jml_3 = number_format($ak_piki - $jabatan_pak->akpkbpiki,3) @endphp
                    @php $jml_5 = number_format($ak_penunjang - $ak_penunjang_akhir - $jabatan_pak->akp,3 );

                        if($jml_1>=0 && $jml_2>=0 && $jml_3>=0 && $jml_4>=0 && $jml_5<=0){
                            $naik_pangkat = 1;
                        }else{
                            $naik_pangkat = 0;
                        }
                    @endphp

                    <tr style="font-weight: 900">
                        <td>Kelebihan/Kekurangan</td>
                        <td style="{{ $jml_1 >= 0 ? 'color: green;' : 'color: red;'  }} text-align:right">{{ $jml_1 }}</td>
                        <td style="{{ $jml_4>=0 ? 'color: green;' : 'color: red;'  }} text-align:right">{{ $jml_4 }}</td>
                        <td style="{{ $jml_2>=0 ? 'color: green;' : 'color: red;'  }} text-align:right">{{ $jml_2 }}</td>
                        <td style="{{ $jml_3>=0 ? 'color: green;' : 'color: red;'  }} text-align:right">{{ $jml_3 }}</td>
                        <td style="{{ $jml_5<=0 ? 'color: green;' : 'color: red;'  }} text-align:right">{{ $jml_5 }}</td>
                    </tr>
                </tbody>
            </table>

            <span style="font-size: 11; text-align:center">

                Adapun bukti fisik yg tidak di berikan angka kredit denga alasan sebagaimana terlampir pada Lampiran 2 PKB,
                Pengajuan usulan penilaian angka kredit baru, termasuk yang dapat di perbaiki agar di lengkapi dengan Surat Usul/Pengantar DUPAK,
                Daftar Usul Pnetapan Angka Kredit (DUPAK), SK Kebaikan Pangkat Terakhir, PAK terakhir, Penyesuaian PAK, Ijazah dengan kelngkapanya untuk
                yang tugas belajar/ijin belajar, Konversi NIP, SK Pengalihan PNSD dari Kabupaten/Kota ke Provinsi oleh BKN, SK Gubernur tentang penetapan Tugas,
                Sertifikat Profesi, SK Jabatan terakhir, Laporan PKB, Laporan PKG, tahun terakhir untuk di kirim kembali ke sekretariat Tim PAK Provinsi
                Dinas Pendidikan dan Kebudayaan Kalimantan Utara dengan melampirkan fotocopy/legalisir surat ini. <br>
                Atas perhatian saudara, kami mengucapkan terimakasih.
            </span>

            <div style="text-align:left;padding-left:70%">
                <br>
                <br>
                                    {{ ucfirst(Auth::user()->wilayah_kerja).', '.tgl_indo( \Carbon\Carbon::now()->format('Y-m-d') ) }}
                                <br>
                                <br>
                                <br>
                                <br>

                                {{ Auth::user()->name }}
                                <br>
                                {{ 'NIP. '.Auth::user()->username}}
            </div>

            <pagebreak/>

            <table>
                <thead>
                    <tr>
                      <th>ID DUPAK</th>
                      <th>USULAN</th>
                      <th>Kode</th>
                      <th>Deskripsi</th>
                      <th>Saran</th>
                      <th>Jenis</th>
                    </tr>
                  </thead>
                  <tbody>
                         @foreach ($lampiran_hapak as $l2pkb )
                          <tr>
                              <td>{{$l2pkb->pendidikan_id}}</td>
                              <td>{{$l2pkb->kegiatan}}</td>
                              <td>{{$l2pkb->kode}}</td>
                              <td>{{$l2pkb->diskripsi}}</td>
                              <td>{{$l2pkb->saran}}</td>
                              <td>{{$l2pkb->jenis}}</td>
                          </tr>
                          @endforeach
                  </tbody>
                </table>
            </table>

            <div style="text-align:left;padding-left:70%">
                <br>
                <br>
                                    {{ ucfirst(Auth::user()->wilayah_kerja).', '.tgl_indo( \Carbon\Carbon::now()->format('Y-m-d') ) }}
                                <br>
                                <br>
                                <br>
                                <br>

                                {{ Auth::user()->name }}
                                <br>
                                {{ 'NIP. '.Auth::user()->username}}
            </div>

</body>
</html>
