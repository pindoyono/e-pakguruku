<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%"
        style="width:100%">

        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Penilai</th>
                <th rowspan="2">Nama</th>
                <th rowspan="2">NIP</th>
                <th rowspan="2">No Hp</th>
                <th rowspan="2">Sekolah</th>
                <th rowspan="2">Tgl Buat</th>
                <th rowspan="2">Nama</th>
                <th colspan="2">Usulan Gol</th>
                <th colspan="3">Angka Kredit</th>
                <th colspan="3">AKK Utama 90%</th>
                <th colspan="3">PD</th>
                <th colspan="3">PIKI</th>
                <th colspan="3">AK P 10%</th>
                <th colspan="3">Masa Kerja</th>
                <th colspan="2">K I 50%</th>
                <th rowspan="2">L PI</th>
                <th rowspan="2">Jurnal</th>
                <th rowspan="2">Kesimpulan</th>
                <th rowspan="2">Hapak</th>
            </tr>
            <tr>
                <th>Dari</th>
                <th>Ke</th>

                <th>Ak Diperoleh</th>
                <th>Ak Wajib</th>
                <th>L/TL</th>

                <th>Ak</th>
                <th>Wajib</th>
                <th>L/TL</th>

                <th>PD</th>
                <th>Wajib</th>
                <th>L/TL</th>

                <th>PIKI</th>
                <th>Wajib</th>
                <th>L/TL</th>

                <th>AKP</th>
                <th>MAX</th>
                <th>L/TL</th>

                <th>TMT</th>
                <th>Wajib</th>
                <th>L/TL</th>

                <th> MAX </th>
                <th> KI</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $pak)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $pak->penilai_id != null ? get_data_penilai($pak->penilai_id)->name : 'Belum Di Nilai' }}
                    </td>
                    <td>{{ $pak->name }}</td>
                    <td>{{ "'" . $pak->username }}</td>
                    <td>{{ $pak->no_hp }}</td>
                    <td>{{ $pak->sekolah }}</td>
                    <th>{{ $pak->created_at }}</th>
                    <td>{{ $pak->pangkat }}</td>
                    <td>{{ get_jabatan($pak->pangkat_golongan + 1)->pangkat }}</td>
                    <td>
                        {{ $ak_diperoleh = number_format(
                            $pak->pendidikan_sekolah +
                                $pak->pendidikan_sekolah2 +
                                $pak->pelatihan_prajabatan +
                                $pak->pelatihan_prajabatan2 +
                                $pak->proses_pembelajaran +
                                $pak->proses_pembelajaran2 +
                                $pak->proses_bimbingan +
                                $pak->proses_bimbingan2 +
                                $pak->tugas_lain +
                                $pak->tugas_lain2 +
                                $pak->pengembangan_diri +
                                $pak->pengembangan_diri2 +
                                $pak->publikasi_ilmiah +
                                $pak->publikasi_ilmiah2 +
                                $pak->karya_inovatif +
                                $pak->karya_inovatif2 +
                                $pak->ijazah_tidak_sesuai +
                                $pak->ijazah_tidak_sesuai2 +
                                $pak->pendukung_tugas_guru +
                                $pak->pendukung_tugas_guru2 +
                                $pak->tertinggal +
                                $pak->tertinggal2 +
                                $pak->memperoleh_penghargaan +
                                $pak->memperoleh_penghargaan2,
                            3,
                        ) }}
                    </td>
                    <td>{{ $pak->target }}</td>
                    <td
                        style="{{ number_format($ak_diperoleh - $pak->target, 3) >= 0 ? 'color: green;' : 'color: red;' }} text-align:right; font-weight:bold">
                        {{ str_replace('.', ',', number_format($ak_diperoleh - $pak->target, 3)) }}</td>



                    <td>
                        {{ $ak_utama_total = number_format(
                            $pak->pendidikan_sekolah +
                                $pak->pendidikan_sekolah2 +
                                $pak->pelatihan_prajabatan +
                                $pak->pelatihan_prajabatan2 +
                                $pak->proses_pembelajaran +
                                $pak->proses_pembelajaran2 +
                                $pak->proses_bimbingan +
                                $pak->proses_bimbingan2 +
                                $pak->tugas_lain +
                                $pak->tugas_lain2 +
                                $pak->pengembangan_diri +
                                $pak->pengembangan_diri2 +
                                $pak->publikasi_ilmiah +
                                $pak->publikasi_ilmiah2 +
                                $pak->karya_inovatif +
                                $pak->karya_inovatif2 -
                                (90 / 100) * $pak->target_sebelum +
                                ($pak->tertinggal + $pak->tertinggal2 + $pak->tertinggal_user),
                            3,
                        ) }}
                    </td>
                    <td>
                        {{ number_format((90 / 100) * $pak->akk) }}
                    </td>

                    <td
                        style="{{ number_format($ak_utama_total - (90 / 100) * $pak->akk, 3) >= 0 ? 'color: green;' : 'color: red;' }} text-align:right;font-weight:bold">
                        {{ str_replace('.', ',', number_format($ak_utama_total - (90 / 100) * $pak->akk, 3)) }}</td>



                    <td>
                        {{ str_replace(
                            '.',
                            ',',
                            $ak_pd = number_format($pak->pengembangan_diri + $pak->pengembangan_diri2 - $pak->pd_user, 3, '.', ''),
                        ) }}
                    </td>
                    <td>
                        {{ str_replace('.', ',', number_format($pak->akpkbpd, 3)) }}
                    </td>
                    <td
                        style="{{ number_format($ak_pd - $pak->akpkbpd, 3, '.', '') >= 0 ? 'color: green;' : 'color: red;' }} text-align:right;font-weight:bold">
                        {{ str_replace('.', ',', number_format($ak_pd - $pak->akpkbpd, 3)) }}</td>

                    <td>
                        {{ str_replace(
                            '.',
                            ',',
                            $ak_piki = number_format(
                                $pak->publikasi_ilmiah +
                                    $pak->publikasi_ilmiah2 +
                                    $pak->karya_inovatif +
                                    $pak->karya_inovatif2 -
                                    $pak->pi_user -
                                    $pak->ki_user,
                                3,
                                '.',
                                '',
                            ),
                        ) }}
                    </td>
                    <td>
                        {{ str_replace('.', ',', number_format($pak->akpkbpiki, 3)) }}
                    </td>

                    <td
                        style="{{ number_format($ak_piki - $pak->akpkbpiki, 3, '.', '') >= 0 ? 'color: green;' : 'color: red;' }} text-align:right">
                        {{ str_replace('.', ',', number_format($ak_piki - $pak->akpkbpiki, 3)) }}</td>

                    <td>
                        {{ $ak_penunjang = number_format(
                            $pak->ijazah_tidak_sesuai +
                                $pak->ijazah_tidak_sesuai2 +
                                $pak->pendukung_tugas_guru +
                                $pak->pendukung_tugas_guru2 +
                                $pak->memperoleh_penghargaan +
                                $pak->memperoleh_penghargaan2 -
                                ($pak->ijazah_tidak_sesuai_user + $pak->pendukung_tugas_guru_user + $pak->memperoleh_penghargaan_user),
                            3,
                        ) }}
                    </td>
                    <td>
                        {{ $pak->akp }}
                    </td>
                    <td
                        style="{{ number_format($ak_penunjang - $pak->akp, 3, '.', '') <= 0 ? 'color: green;' : 'color: red;' }} text-align:right">
                        {{ str_replace('.', ',', number_format($ak_penunjang - $pak->akp, 3)) }}</td>

                    <td>
                        {{ tgl_indo($pak->tmt_pns) }}
                    </td>
                    <td> Minimal 2 Tahun</td>
                    {{-- <td style="{{ masa_kerja(\Carbon\Carbon::parse(date("Y")."-10-01"), $pak->tmt_pns) >= 2 ? 'color: green;' : 'color: red;'  }}" >{{ masa_kerja(\Carbon\Carbon::parse(date("Y")."-10-01"), $pak->tmt_pns)  }} </td> --}}
                    <td
                        style=" {{ masa_kerja(\Carbon\Carbon::parse($pak->akhir)->addMonths(1), $pak->tmt_pns) >= 2 ? 'color: green;' : 'color: red;' }}">
                        {{ masa_kerja(\Carbon\Carbon::parse($pak->akhir)->addMonths(1), $pak->tmt_pns) }}
                    </td>

                    <td> {{ (50 / 100) * $pak->akpkbpiki }} </td>
                    @if ($pak->jabatan_id >= 4)
                        <td
                            style="{{ $pak->karya_inovatif + $pak->karya_inovatif2 - $pak->ki_user <= (50 / 100) * $pak->akpkbpiki ? 'color: green;' : 'color: red;' }}">
                            Perolehan ({{ $pak->karya_inovatif + $pak->karya_inovatif2 - $pak->ki_user }}) </td>
                    @else
                        <td style="color:green"> di Bawah IIID</td>
                    @endif

                    @if ($pak->jabatan_id >= 4)
                        <td style="{{ $pak->lap_pi == 'Ada' ? 'color: green;' : 'color: red;' }}"> Perolehan
                            ({{ $pak->lap_pi == 'Ada' ? 'Ada' : 'Tidak Ada' }})
                        </td>
                    @else
                        <td style="color:green"> di Bawah IIID</td>
                    @endif

                    @if ($pak->jabatan_id >= 5)
                        <td style="{{ $pak->jurnal == 'Ada' ? 'color: green;' : 'color: red;' }}"> Perolehan
                            ({{ $pak->jurnal == 'Ada' ? 'Ada' : 'Tidak Ada' }}) </td>
                    @else
                        <td style="color:green"> di Bawah IIID</td>
                    @endif

                    <td style="{{ lolos($pak->pak_id) == 'Lolos' ? 'color: green;' : 'color: red;' }}">
                        {{ lolos($pak->pak_id) }}</td>
                    @if (lolos($pak->pak_id) != 'Lolos')
                        <td><a target="_blank"
                                href="{{ lolos($pak->pak_id) != 'Lolos' ? route('penilais.cetak_hapak', $pak->pak_id) : '' }}">Hapak</a>
                        <td>
                        @else
                        <td style="color:green"> - </td>
                    @endif

                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
