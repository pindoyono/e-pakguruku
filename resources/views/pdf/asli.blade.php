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


        /* @page {
            margin: 50px;
        } */

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
        <table width="100%" style="text-align: center; border: none !important;">
            <tr style="text-align: center; border: none !important;">
                <td style="text-align: center; border: none !important;"></td>
                <td style="text-align: center; border: none !important;">
                    <img style="height: auto; width: 70px;" src="http://e-pakguruku.id/assets/img/kaltara.png" />
                </td>
                <td style="text-align: center; border: none !important;"></td>
            </tr>
            <tr style="text-align: center; border: none !important;">
                <td width="10%" style="text-align: center; border: none !important;">
                </td>
                <td style="text-align: center; border: none !important;">
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
                        Tanjung Selor Kode Pos 77212, E-mail: kaltara.pendidikan@yahoo.com /
                        katara.pendidikan@gmail.com<br>
                    </span>
                    <span style="font-size:11">
                        TANJUNG SELOR
                    </span>
                </td>
                <td width="10%" style="text-align: center; border: none !important;"></td>
            </tr>
        </table>
        <hr>
        <hr>
        <div style="text-align:center; border: none !important;">
            <span style="font-size:14; font-weight:bold; ">
                <u>
                    Surat Keterangan <br>
                </u>
            </span>
            <span style="font-size:14">
                {{-- Nomor : {!! $pak->no_sk == null
                    ? '420/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/Disdikbud-A.1/KU/I/2023'
                    : $pak->no_sk !!} --}}

                Nomor : {!! '420/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/Disdikbud-A.1/KU/I/2023' !!}
                <br>
            </span>
        </div>

        Yang bertandatangan dibawah ini:
        <table style="border: none !important;margin-left: 50px ">
            <tr style="border: none !important;">
                <td style="border: none !important;">Nama</td>
                <td style="border: none !important;">:</td>
                <td style="border: none !important;">{{ ucfirst($settings->nama_kadis) }}</td>
            </tr>
            <tr>
                <td style="border: none !important;">NIP</td>
                <td style="border: none !important;">:</td>
                <td style="border: none !important;">{{ $settings->nip_kadis }}</td>
            </tr>
            <tr style="border: none !important;">
                <td style="border: none !important;">Pangkat/Golongan</td>
                <td style="border: none !important;">:</td>
                <td style="border: none !important;"> {{ $settings->jabatan_kadis }}</td>
            </tr>
            <tr style="border: none !important;">
                <td style="border: none !important;">Jabatan</td>
                <td style="border: none !important;">:</td>
                <td style="border: none !important;">{{ $settings->kadis }}</td>
            </tr>
        </table>
        <p style="text-align: justify">
            Dengan ini menerangkan bahwa Penilaian Angka Kredit (PAK) untuk Jabatan Fungsional pada Satuan Pendidikan di
            Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Utara yang tersebut dibawah ini dinyatakan Sah/Benar dan
            telah sesuai dengan prosedur Penilaian Angka Kredit di Kementerian Pendidikan dan Kebudayaan Republik
            Indonesia.
            Adapun nama-nama Pejabat Fungsional tersebut adalah sebagai berikut:
        </p>
        <table style="border: none !important;margin-left: 50px ">
            <tr style="border: none !important;">
                <td style="border: none !important;">Nama</td>
                <td style="border: none !important;">:</td>
                <td style="border: none !important;">{{ $pak->name }}</td>
            </tr>
            <tr>
                <td style="border: none !important;">NIP</td>
                <td style="border: none !important;">:</td>
                <td style="border: none !important;">{{ $pak->username }}</td>
            </tr>
            <tr style="border: none !important;">
                <td style="border: none !important;">Pangkat/Golongan</td>
                <td style="border: none !important;">:</td>
                <td style="border: none !important;"> {{ $pangkat->pangkat }}</td>
            </tr>
            <tr style="border: none !important;">
                <td style="border: none !important;">Jabatan</td>
                <td style="border: none !important;">:</td>
                <td style="border: none !important;">{{ $pangkat->jabatan }}</td>
            </tr>
            <tr style="border: none !important;">
                <td style="border: none !important;">Nomor PAK</td>
                <td style="border: none !important;">:</td>
                <td style="border: none !important;">{!! $pak->no_sk == null
                    ? '823.3/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/Disdikbud/KU/I/2023'
                    : $pak->no_sk !!}</td>
            </tr>
            <tr style="border: none !important;">
                <td style="border: none !important;">Jumlah Nilai</td>
                <td style="border: none !important;">:</td>
                <td style="border: none !important;">
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
        </table>
        <br>
        Demikian Surat Keterangan ini dibuat untuk dipergunakan sebagai kelengkapan persyaratan usul kenaikan jabatan
        fungsional dan kenaikan pangkat.
        <br>
        <br>
        <table width="100%" style=" border: none !important;">
            <tr style="width: 65%; border: none !important;">
                <td style="width: 65%; border: none !important;"></td>
                <td Style="border: none !important; vertical-align:top;align:right">
                    {{ 'TJ. Selor  ,' . tgl_indo($settings->tgl_pak_ttd) }}
                    <br>
                    {{ $settings->kadis }},
                    <br>
                    <br>
                    <br>
                    <br>
                    {{ ucfirst($settings->nama_kadis) }} <br>
                    {{ $settings->jabatan_kadis }} <br>
                    {{ $settings->nip_kadis }} <br>
                </td>
            </tr>
        </table>

</body>

</html>
