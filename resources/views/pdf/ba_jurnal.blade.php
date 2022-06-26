<!DOCTYPE html>
<html>
<head>
    <title>Berita Acara Laporan Penelitian dan Jurnal</title>
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



        <div class="container center" style="text-align:center;">
            <h3>
                BERITA ACARA PENILAIAN ANGKA KREDIT
                    <br>
            </h3>

            <div style="font-size:12; text-align:justify">
                Pada hari ini {{$settings->hari_ba}}, {{tgl_indo($settings->tgl_berita_acara_atas)}} bertempat di
                @if (Auth::user()->wilayah_kerja == 'tarakan')
                   Kantor Cabang Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Utara Wilayah Tarakan di Tarakan
                @elseif(Auth::user()->wilayah_kerja == 'nunukan')
                   Kantor Cabang Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Utara Wilayah Nunukan di Nunukan
                @elseif(Auth::user()->wilayah_kerja == 'malinau')
                    Kantor Cabang Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Utara Wilayah Malinau dan Tana Tidung di Malinau
                @elseif(Auth::user()->wilayah_kerja == 'bulungan')
                    Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Utara di Bulungan
                @endif

                telah dilakukan pemeriksaan dan penilaian terhadap Laporan Hasil Penelitian dan/atau Jurnal Ilmiah dengan judul dan/atau terbitan:
            </div>

            @foreach ($ba as $b)
                <p style="font-size:12; text-align:left;font-weight:bold">
                    {{ $no++.' '.$b->judul}}
                </p>
            @endforeach
                <p style="font-size:12; text-align:justify;">
                    yang disusun dan diusulkan oleh:
                </p>
            <table width="100%" style=" border: none !important;font-size:12">
                <tr style=" border: none !important;">
                    <td  width="15%" style=" border: none !important;">
                        Nama
                    </td>
                    <td width="1%" style=" border: none !important;" >
                        :
                    </td>
                    <td width="60%" style=" border: none !important;">
                        {{$user->name}}
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
                        {{$user->username}}
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
                        {{$user->tempat_lahir.','.tgl_indo($user->tanggal_lahir)}}
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
                        {{$pangkat->pangkat}}
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
                        {{$user->sekolah}}
                    </td>
                </tr>
            </table>

            <p style="font-size:12; text-align:justify;">
                Demikian berita acara ini dibuat sebagai bukti kepada penilai telah melaksanakan tugasnya sesuai dengan ketentuan yang berlaku.

            </p>

            <div style="text-align:left;padding-left:70%">
                <br>
                <br>
                                    {{ ucfirst(Auth::user()->wilayah_kerja).', '.tgl_indo($settings->tgl_berita_acara_ttd) }}
                                <br>
                                <br>
                                <br>
                                <br>
                                @if ( $pak->penilai_id != null)
                                    {{ get_data_penilai($pak->penilai_id)->name  }}
                                    <br>
                                    {{ 'NIP. '.get_data_penilai($pak->penilai_id)->username}}
                                @endif
            </div>


</body>
</html>
