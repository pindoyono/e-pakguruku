<!DOCTYPE html>
<html>

<head>
    <title>Penetapan Angka Kredit</title>
</head>

<body>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
        }


        @page {
            margin: 0.5em 1em;
        }

        table {

            border-collapse: collapse;
        }

        .wrapper {
            border: 0px solid white;
        }

        .spasi {
            padding-left: 5px;
        }
    </style>



    <div class="container">
        <table width="100%" style="border: none !important;  vertical-align:top; font-size:8 !important">
            <tr style="border: none !important;  vertical-align:top;">
                <td width="10%" style="border: none !important;  vertical-align:top;">

                </td>
                <td style="border: none !important;  vertical-align:top;">

                </td>
                <td width="12%" style="border: none !important;  vertical-align:top;">
                    Lampiran V
                </td>
                <td width="1%" style="border: none !important; vertical-align:top;">
                    :
                </td>
                <td width="35%" style="border: none !important;  vertical-align:top;">
                    <table style="border: none !important;">
                        <tr style="border: none !important;">
                            <td colspan="3" style="border: none !important;">
                                Peraturan Bersama
                            </td>
                        </tr>
                        <tr style="border: none !important;">
                            <td colspan="3" style="border: none !important;">
                                Menteri Pendidikan Nasional <br>
                                dan Kepala Badan Kepegawaian Negara
                            </td>
                        </tr>
                        <tr style="border: none !important;">
                            <td width="8px" style="border: none !important;">
                                Nomor
                            </td>
                            <td width="3px" style="border: none !important;">
                                :
                            </td>
                            <td width="150px" style="border: none !important;">
                                03/V/PB/2010
                            </td>
                        </tr>
                        <tr style="border: none !important;">
                            <td width="8px" style="border: none !important;">
                                Nomor
                            </td>
                            <td width="3px" style="border: none !important;">
                                :
                            </td>
                            <td width="100px" style="border: none !important;">
                                14 TAHUN 2010
                            </td>
                        </tr>
                        <tr style="border: none !important;">
                            <td width="8px" style="border: none !important;">
                                Tanggal
                            </td>
                            <td width="3px" style="border: none !important;">
                                :
                            </td>
                            <td width="100px" style="border: none !important;">
                                6 Mei 2010
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <div style="text-align:center; border: none !important;">
            <span style="font-size:12; font-weight:bold; ">
                PENETAPAN ANGKA KREDIT JABATAN FUNGSIONAL GURU <br>
                DINAS PENDIDIKAN DAN KEBUDAYAAN PROVINSI KALIMANTAN UTARA <br>
            </span>
            <span style="font-size:10">
                Nomor : {!! $pak->no_sk == null
                    ? '823.3/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/Disdikbud/KU/I/2023'
                    : $pak->no_sk !!}
                <br>
            </span>
            <span style="font-size:12; font-weight:bold">
                Masa Penilaian : {{ tgl_indo($pak->awal) . ' s/d ' . tgl_indo($pak->akhir) }} <br>
            </span>

        </div>

        <table width="100%">
            <tbody style="font-size:10;">
                <tr>
                    <td width="3%" style="text-align:center !important">I</td>
                    <td colspan=7 class="font-size:9; text-left spasi"> KETERANGAN PERORANGAN</td>
                </tr>
                <tr>
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
                    <td class="spasi" colspan=4>{{ $pak->tempat_lahir . ', ' . tgl_indo($pak->tanggal_lahir) }}</td>
                </tr>
                <tr>
                    <td class="spasi"> 5</td>
                    <td class="spasi" colspan=2>Jenis Kelamin</td>
                    <td class="spasi" colspan=4>{{ $pak->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td class="spasi"> 6</td>
                    <td class="spasi" colspan=2>Pendidikan yang telah diperhitungkan angka kreditnya</td>
                    {{-- <td class="spasi" colspan=2 style="font-size:9;">Pendidikan yang telah diperhitungkan angka kreditnya</td> --}}
                    <td class="spasi" colspan=4>{{ $pak->pendidikan }}</td>
                </tr>
                <tr>
                    <td class="spasi"> 7</td>
                    <td class="spasi" colspan=2>Pangkat / Golongan ruang / TMT</td>
                    <td class="spasi" colspan=4>
                        {{ $pangkat->pangkat . ' / ' . tgl_indo($pak->tmt_pns) }}
                    </td>
                </tr>
                <tr>
                    <td class="spasi"> 8</td>
                    <td class="spasi" colspan=2>Jabatan Guru / TMT</td>
                    <td class="spasi" colspan=4> {{ $pangkat->jabatan . ' / ' . tgl_indo($pak->tmt_jabatan) }}</td>
                </tr>
                <tr>
                    <td class="spasi" rowspan=2> 9</td>
                    <td class="spasi" rowspan=2>Masa Kerja Golongan</td>
                    <td class="spasi">Lama</td>
                    <td class="spasi" colspan=4>
                        {{-- {{ masa_kerja(\Carbon\Carbon::parse(\Carbon\Carbon::parse($pak->tmt_pns)->subYears()->format('y') . '-12-31')->addMonths(1),$pak->tmt_cpns) }} --}}
                        {{-- {{ masa_kerja(\Carbon\Carbon::parse(\Carbon\Carbon::parse($pak->tmt_pns)->format('y') . '-12-31'), $pak->tmt_cpns) }} --}}
                        {{ $pak->lama }}

                    </td>
                </tr>
                <tr>
                    <td class="spasi">Baru</td>
                    <td class="spasi" colspan=4>
                        {{-- {{ masa_kerja(\Carbon\Carbon::parse(\Carbon\Carbon::parse($pak->awal)->format('y') . '-12-31'), $pak->tmt_cpns) }} --}}
                        {{ $pak->baru }}

                    </td>
                </tr>
                <tr>
                    <td> 10</td>
                    <td class="spasi" colspan=2>Jenis Guru </td>
                    <td class="spasi" colspan=4>{{ $pak->jenis_guru }}</td>
                </tr>
                <tr>
                    <td> 11</td>
                    <td class="spasi" colspan=2>Unit Kerja </td>
                    <td class="spasi" colspan=4>{{ $pak->sekolah }}</td>
                </tr>
                <tr>
                    <td rowspan=2> 12</td>
                    <td class="spasi" rowspan=2>Alamat</td>
                    <td class="spasi">Sekolah</td>
                    <td class="spasi" colspan=4 style="font-size:9;">{{ $pak->alamat_sekolah }}</td>
                </tr>
                <tr>
                    <td class="spasi">Rumah</td>
                    <td class="spasi" colspan=4 style="font-size:9;">{{ $pak->alamat_rumah }}</td>
                </tr>




        </table>
        <h1 style="text-align: center; margin-top: 200px  ">
            DRAFT <br>
            <br>
            PENILAIAN ANGKA KREDIT
        </h1>
</body>

</html>
