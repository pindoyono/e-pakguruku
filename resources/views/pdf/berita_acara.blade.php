<!DOCTYPE html>
<html>

<head>
    <title>Berita Acara</title>
</head>

<body>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
        }


        @page {
            margin: 0.5em 3em;
        }

        table {

            border-collapse: collapse;
        }

        .wrapper {
            border: 0px solid white;
        }
    </style>



    <div class="container center" style="text-align:center;">
        <h3>
            BERITA ACARA PENILAIAN ANGKA KREDIT
            <br>
        </h3>

        <div style="font-size:10; text-align:justify">
            Pada hari ini {{ $settings->hari_ba }}, {{ tgl_indo($settings->tgl_berita_acara_atas) }} bertempat di
            @if (Auth::user()->wilayah_kerja == 'tarakan')
                Kantor Cabang Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Utara Wilayah Tarakan di Tarakan
            @elseif(Auth::user()->wilayah_kerja == 'nunukan')
                Kantor Cabang Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Utara Wilayah Nunukan di Nunukan
            @elseif(Auth::user()->wilayah_kerja == 'malinau')
                Kantor Cabang Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Utara Wilayah Malinau dan Tana Tidung
                di Malinau
            @elseif(Auth::user()->wilayah_kerja == 'bulungan')
                Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Utara di Bulungan
            @endif

            telah dilakukan penilaian terhadap usulan penilaian angka kredit jabatan fungsional guru dengan hasil
            sebagai berikut:
        </div>
        <table>
            <tbody style="font-size:10">
                <tr>
                    <td colspan=4 style="font-size:9; text-align:left">
                        Instansi : Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Utara
                    </td>
                    <td colspan=4 style="font-size:9;text-align:right">
                        Masa Penilaian : {{ tgl_indo($pak->awal) . ' s/d ' . tgl_indo($pak->akhir) }}
                    </td>
                </tr>
                <tr>
                    <td width="3%">I</td>
                    <td colspan=7 class="text-left"> KETERANGAN PERORANGAN</td>
                </tr>
                <tr>
                    <td rowspan=14></td>
                    <td width="3%"> 1</td>
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
                    <td colspan=4>{{ $pak->tempat_lahir . ', ' . tgl_indo($pak->tanggal_lahir) }}</td>
                </tr>
                <tr>
                    <td> 5</td>
                    <td colspan=2>Jenis Kelamin</td>
                    <td colspan=4>{{ $pak->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td> 6</td>
                    <td colspan=2>Pendidikan yang telah diperhitungkan angka kreditnya</td>
                    {{-- <td colspan=2 style="font-size:9;">Pendidikan yang telah diperhitungkan angka kreditnya</td> --}}
                    <td colspan=4>{{ $pak->pendidikan }}</td>
                </tr>
                <tr>
                    <td> 7</td>
                    <td colspan=2>Pangkat / Golongan ruang / TMT</td>
                    <td colspan=4>
                        {{ $pangkat->pangkat . ' / ' . tgl_indo($pak->tmt_pns) }}
                    </td>
                </tr>
                <tr>
                    <td> 8</td>
                    <td colspan=2>Jabatan Guru / TMT</td>
                    <td colspan=4> {{ $pangkat->jabatan . ' / ' . tgl_indo($pak->tmt_jabatan) }}</td>
                </tr>
                <tr>
                    <td rowspan=2> 9</td>
                    <td rowspan=2>Masa Kerja Golongan</td>
                    <td>Lama</td>
                    <td colspan=4>
                        {{-- {{ masa_kerja(\Carbon\Carbon::parse(\Carbon\Carbon::parse($pak->tmt_pns)->format('y') . '-12-31'), $pak->tmt_cpns) }} --}}
                        {{ $pak->lama }}


                    </td>
                </tr>
                <tr>
                    <td>Baru</td>
                    <td colspan=4>
                        {{-- {{ masa_kerja(\Carbon\Carbon::parse(\Carbon\Carbon::parse($pak->awal)->format('y') . '-12-31'), $pak->tmt_cpns) }} --}}
                        {{ $pak->baru }}

                    </td>
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



                <tr style="text-align:center">
                    <td>II</td>
                    <td colspan=4> PENETAPAN ANGKA KREDIT</td>
                    <td width="10%"> LAMA</td>
                    <td width="10%"> BARU</td>
                    <td width="10%"> JUMLAH</td>
                </tr>
                <tr>
                    <td rowspan="20"></td>
                    <td>1</td>
                    <td colspan=3> <b>Unsur Utama</b></td>
                    <td style="text-align:right"> <b>
                            {{ $pak2->tertinggal != 0 ? str_replace('.', ',', $pak2->tertinggal) : '-' }} </b></td>
                    <td style="text-align:right"> <b>
                            {{ $pak2->tertinggal2 != 0 ? str_replace('.', ',', $pak2->tertinggal2) : '-' }} </b></td>
                    <td style="text-align:right"> <b>
                            {{ number_format($pak2->tertinggal + $pak2->tertinggal2, 3) != 0 ? str_replace('.', ',', number_format($pak2->tertinggal + $pak2->tertinggal2, 3)) : '-' }}
                        </b></td>
                </tr>
                <tr>
                    <td rowspan="12"></td>
                    <td colspan=3> a. Pendidikan</td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td colspan="3">1) Pendidikan sekolah dan memperoleh gelar ijazah </td>
                    <td style="text-align:right">
                        {{ $pak2->pendidikan_sekolah != 0 ? str_replace('.', ',', $pak2->pendidikan_sekolah) : '-' }}
                    </td>
                    <td style="text-align:right">
                        {{ $pak2->pendidikan_sekolah2 != 0 ? str_replace('.', ',', $pak2->pendidikan_sekolah2) : '-' }}
                    </td>
                    <td style="text-align:right">
                        {{ number_format($pak2->pendidikan_sekolah + $pak2->pendidikan_sekolah2, 3) != 0 ? str_replace('.', ',', number_format($pak2->pendidikan_sekolah + $pak2->pendidikan_sekolah2, 3)) : '-' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="3">2) Mengikuti pelatihan prajabatan</td>
                    <td style="text-align:right">
                        {{ $pak2->pelatihan_prajabatan != 0 ? str_replace('.', ',', $pak2->pelatihan_prajabatan) : '-' }}
                    </td>
                    <td style="text-align:right">
                        {{ $pak2->pelatihan_prajabatan2 != 0 ? str_replace('.', ',', $pak2->pelatihan_prajabatan2) : '-' }}
                    </td>
                    <td style="text-align:right">
                        {{ number_format($pak2->pelatihan_prajabatan + $pak2->pelatihan_prajabatan2, 3) != 0 ? str_replace('.', ',', number_format($pak2->pelatihan_prajabatan + $pak2->pelatihan_prajabatan2, 3)) : '-' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="3">b. Pembelajaran / bimbingan dan tugas tertentu</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3"> 1) Proses pembelajaran </td>
                    <td style="text-align:right">
                        {{ $pak2->proses_pembelajaran != 0 ? str_replace('.', ',', $pak2->proses_pembelajaran) : '-' }}
                    </td>
                    <td style="text-align:right">
                        {{ $pak2->proses_pembelajaran2 != 0 ? str_replace('.', ',', $pak2->proses_pembelajaran2) : '-' }}
                    </td>
                    <td style="text-align:right">
                        {{ number_format($pak2->proses_pembelajaran + $pak2->proses_pembelajaran2, 3) != 0 ? str_replace('.', ',', number_format($pak2->proses_pembelajaran + $pak2->proses_pembelajaran2, 3)) : '-' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="3"> 2) Proses bimbingan </td>
                    <td style="text-align:right">
                        {{ $pak2->proses_bimbingan != 0 ? str_replace('.', ',', $pak2->proses_bimbingan) : '-' }} </td>
                    <td style="text-align:right">
                        {{ $pak2->proses_bimbingan2 != 0 ? str_replace('.', ',', $pak2->proses_bimbingan2) : '-' }}
                    </td>
                    <td style="text-align:right">
                        {{ number_format($pak2->proses_bimbingan + $pak2->proses_bimbingan2, 3) != 0 ? str_replace('.', ',', number_format($pak2->proses_bimbingan + $pak2->proses_bimbingan2, 3)) : '-' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="3"> 3) Tugas lain yang relevan</td>
                    <td style="text-align:right">
                        {{ $pak2->tugas_lain != 0 ? str_replace('.', ',', $pak2->tugas_lain) : '-' }} </td>
                    <td style="text-align:right">
                        {{ $pak2->tugas_lain2 != 0 ? str_replace('.', ',', $pak2->tugas_lain2) : '-' }} </td>
                    <td style="text-align:right">
                        {{ number_format($pak2->tugas_lain + $pak2->tugas_lain2, 3) != 0 ? str_replace('.', ',', number_format($pak2->tugas_lain + $pak2->tugas_lain2, 3)) : '-' }}
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
                        {{ $pak2->pengembangan_diri != 0 ? str_replace('.', ',', $pak2->pengembangan_diri) : '-' }}
                    </td>
                    <td style="text-align:right">
                        {{ $pak2->pengembangan_diri2 != 0 ? str_replace('.', ',', $pak2->pengembangan_diri2) : '-' }}
                    </td>
                    <td style="text-align:right">
                        {{ number_format($pak2->pengembangan_diri + $pak2->pengembangan_diri2, 3) != 0 ? str_replace('.', ',', number_format($pak2->pengembangan_diri + $pak2->pengembangan_diri2, 3)) : '-' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="3">2) Publikasi Ilmiah</td>
                    <td style="text-align:right">
                        {{ $pak2->publikasi_ilmiah != 0 ? str_replace('.', ',', $pak2->publikasi_ilmiah) : '-' }} </td>
                    <td style="text-align:right">
                        {{ $pak2->publikasi_ilmiah2 != 0 ? str_replace('.', ',', $pak2->publikasi_ilmiah2) : '-' }}
                    </td>
                    <td style="text-align:right">
                        {{ number_format($pak2->publikasi_ilmiah + $pak2->publikasi_ilmiah2, 3) != 0 ? str_replace('.', ',', number_format($pak2->publikasi_ilmiah + $pak2->publikasi_ilmiah2, 3)) : '-' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="3"> 3) Karya Inovatif</td>
                    <td style="text-align:right">
                        {{ $pak2->karya_inovatif != 0 ? str_replace('.', ',', $pak2->karya_inovatif) : '-' }} </td>
                    <td style="text-align:right">
                        {{ $pak2->karya_inovatif2 != 0 ? str_replace('.', ',', $pak2->karya_inovatif2) : '-' }} </td>
                    <td style="text-align:right">
                        {{ number_format($pak2->karya_inovatif + $pak2->karya_inovatif2, 3) != 0 ? str_replace('.', ',', number_format($pak2->karya_inovatif + $pak2->karya_inovatif2, 3)) : '-' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="3"> <b>Jumlah Unsur Utama</b></td>
                    <td style="text-align:right">
                        <b>
                            {{ number_format(
                                $pak2->pendidikan_sekolah +
                                    $pak2->pelatihan_prajabatan +
                                    $pak2->proses_pembelajaran +
                                    $pak2->proses_bimbingan +
                                    $pak2->tugas_lain +
                                    $pak2->pengembangan_diri +
                                    $pak2->publikasi_ilmiah +
                                    $pak2->karya_inovatif +
                                    $pak2->tertinggal,
                                3,
                            ) != 0
                                ? str_replace(
                                    '.',
                                    ',',
                                    number_format(
                                        $pak2->pendidikan_sekolah +
                                            $pak2->pelatihan_prajabatan +
                                            $pak2->proses_pembelajaran +
                                            $pak2->proses_bimbingan +
                                            $pak2->tugas_lain +
                                            $pak2->pengembangan_diri +
                                            $pak2->publikasi_ilmiah +
                                            $pak2->karya_inovatif +
                                            $pak2->tertinggal,
                                        3,
                                    ),
                                )
                                : '-' }}
                        </b>
                    </td>
                    <td style="text-align:right">
                        <b>
                            {{ number_format(
                                $pak2->pendidikan_sekolah2 +
                                    $pak2->pelatihan_prajabatan2 +
                                    $pak2->proses_pembelajaran2 +
                                    $pak2->proses_bimbingan2 +
                                    $pak2->tugas_lain2 +
                                    $pak2->pengembangan_diri2 +
                                    $pak2->publikasi_ilmiah2 +
                                    $pak2->karya_inovatif2 +
                                    $pak2->tertinggal2,
                                3,
                            ) != 0
                                ? str_replace(
                                    '.',
                                    ',',
                                    number_format(
                                        $pak2->pendidikan_sekolah2 +
                                            $pak2->pelatihan_prajabatan2 +
                                            $pak2->proses_pembelajaran2 +
                                            $pak2->proses_bimbingan2 +
                                            $pak2->tugas_lain2 +
                                            $pak2->pengembangan_diri2 +
                                            $pak2->publikasi_ilmiah2 +
                                            $pak2->karya_inovatif2 +
                                            $pak2->tertinggal2,
                                        3,
                                    ),
                                )
                                : '-' }}
                        </b>
                    </td>
                    <td style="text-align:right">
                        <b>
                            {{ number_format(
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
                                    $pak2->tertinggal2,
                                3,
                            ) != 0
                                ? str_replace(
                                    '.',
                                    ',',
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
                                            $pak2->tertinggal2,
                                        3,
                                    ),
                                )
                                : '-' }}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td colspan="3"><b>Unsur Penunjang</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="2"></td>
                    <td colspan="3">1. Ijazah yang tidak sesuai</td>
                    <td style="text-align:right">
                        {{ $pak2->ijazah_tidak_sesuai != 0 ? str_replace('.', ',', $pak2->ijazah_tidak_sesuai) : '-' }}
                    </td>
                    <td style="text-align:right">
                        {{ $pak2->ijazah_tidak_sesuai2 != 0 ? str_replace('.', ',', $pak2->ijazah_tidak_sesuai2) : '-' }}
                    </td>
                    <td style="text-align:right">
                        {{ number_format($pak2->ijazah_tidak_sesuai + $pak2->ijazah_tidak_sesuai2, 3) != 0 ? str_replace('.', ',', number_format($pak2->ijazah_tidak_sesuai + $pak2->ijazah_tidak_sesuai2, 3)) : '-' }}
                    </td>
                </tr>


                <tr>
                    <td colspan="3">2. Pendukung tugas guru</td>
                    <td style="text-align:right">
                        {{ $pak2->pendukung_tugas_guru != 0 ? str_replace('.', ',', $pak2->pendukung_tugas_guru) : '-' }}
                    </td>
                    <td style="text-align:right">
                        {{ $pak2->pendukung_tugas_guru2 != 0 ? str_replace('.', ',', $pak2->pendukung_tugas_guru2) : '-' }}
                    </td>
                    <td style="text-align:right">
                        {{ number_format($pak2->pendukung_tugas_guru + $pak2->pendukung_tugas_guru2, 3) != 0 ? str_replace('.', ',', number_format($pak2->pendukung_tugas_guru + $pak2->pendukung_tugas_guru2, 3)) : '-' }}
                    </td>
                </tr>
                {{-- <tr>
                        <td colspan="3">3. Memperoleh Penghargaan</td>
                        <td style="text-align:right"> {{ $pak2->memperoleh_penghargaan }} </td>
                        <td style="text-align:right"> {{ $pak2->memperoleh_penghargaan2 }} </td>
                        <td style="text-align:right"> {{ number_format($pak2->memperoleh_penghargaan + $pak2->memperoleh_penghargaan2,3) }} </td>
                    </tr> --}}
                <tr>
                    <td colspan="4"><b>Jumlah Unsur Penunjang </b></td>
                    <td style="text-align:right">
                        <b>
                            {{ number_format($pak2->ijazah_tidak_sesuai + $pak2->pendukung_tugas_guru + $pak2->memperoleh_penghargaan, 3) !=
                            0
                                ? str_replace(
                                    '.',
                                    ',',
                                    number_format($pak2->ijazah_tidak_sesuai + $pak2->pendukung_tugas_guru + $pak2->memperoleh_penghargaan, 3),
                                )
                                : '-' }}
                        </b>
                    </td>
                    <td style="text-align:right">
                        <b>
                            {{ number_format(
                                $pak2->ijazah_tidak_sesuai2 + $pak2->pendukung_tugas_guru2 + $pak2->memperoleh_penghargaan2,
                                3,
                            ) != 0
                                ? str_replace(
                                    '.',
                                    ',',
                                    number_format($pak2->ijazah_tidak_sesuai2 + $pak2->pendukung_tugas_guru2 + $pak2->memperoleh_penghargaan2, 3),
                                )
                                : '-' }}
                        </b>
                    </td>
                    <td style="text-align:right">
                        <b>
                            {{ number_format(
                                $pak2->ijazah_tidak_sesuai +
                                    $pak2->pendukung_tugas_guru +
                                    $pak2->memperoleh_penghargaan +
                                    $pak2->ijazah_tidak_sesuai2 +
                                    $pak2->pendukung_tugas_guru2 +
                                    $pak2->memperoleh_penghargaan2,
                                3,
                            ) != 0
                                ? str_replace(
                                    '.',
                                    ',',
                                    number_format(
                                        $pak2->ijazah_tidak_sesuai +
                                            $pak2->pendukung_tugas_guru +
                                            $pak2->memperoleh_penghargaan +
                                            $pak2->ijazah_tidak_sesuai2 +
                                            $pak2->pendukung_tugas_guru2 +
                                            $pak2->memperoleh_penghargaan2,
                                        3,
                                    ),
                                )
                                : '-' }}
                        </b>
                    </td>
                </tr>
                <td colspan="4"><b> Jumlah Unsur Utama dan Unsur Penunjang</b></td>
                <td style="text-align:right">
                    <b>
                        {{ number_format(
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
                                $pak2->tertinggal,
                        
                            3,
                        ) != 0
                            ? str_replace(
                                '.',
                                ',',
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
                                        $pak2->tertinggal,
                        
                                    3,
                                ),
                            )
                            : '-' }}
                    </b>
                </td>
                <td style="text-align:right">
                    <b>
                        {{ number_format(
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
                                $pak2->tertinggal2,
                        
                            3,
                        ) != 0
                            ? str_replace(
                                '.',
                                ',',
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
                                        $pak2->tertinggal2,
                        
                                    3,
                                ),
                            )
                            : '-' }}
                    </b>
                </td>
                <td style="text-align:right">
                    <b>
                        {{ number_format(
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
                                $pak2->tertinggal2,
                        
                            3,
                        ) != 0
                            ? str_replace(
                                '.',
                                ',',
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
                                        $pak2->tertinggal2,
                        
                                    3,
                                ),
                            )
                            : '-' }}
                    </b>
                </td>
                </tr>

            </tbody>
        </table>

        <div style="text-align:left;padding-left:65%;font-size:10">
            <br>
            <br>
            {{ ucfirst(Auth::user()->wilayah_kerja) . ', ' . tgl_indo($settings->tgl_berita_acara_ttd) }}
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            @if ($pak->penilai_id != null)
                {{ ucwords(get_data_penilai($pak->penilai_id)->name) }}
                <br>
                {{ 'NIP. ' . get_data_penilai($pak->penilai_id)->username }}
            @endif
        </div>


</body>

</html>
