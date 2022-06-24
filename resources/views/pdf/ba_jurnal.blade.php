<!DOCTYPE html>
<html>
<head>
    <title>Berita Acara</title>
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

            <div style="font-size:10; text-align:justify">
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

                telah dilakukan penilaian terhadap usulan penilaian angka kredit jabatan fungsional guru dengan hasil sebagai berikut:
            </div>
            @foreach ($ba as $b)
                {{$b->judul}}
            @endforeach

            <div style="text-align:left;padding-left:70%">
                <br>
                <br>
                                    {{ ucfirst(Auth::user()->wilayah_kerja).', '.tgl_indo($settings->tgl_berita_acara_ttd) }}
                                <br>
                                <br>
                                <br>
                                <br>

                                {{-- {{ get_data_penilai($pak->penilai_id)->name  }} --}}
                                <br>
                                {{-- {{ 'NIP. '.get_data_penilai($pak->penilai_id)->username}} --}}
            </div>


</body>
</html>
