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
                <th rowspan="2">Nama</th>
                <th rowspan="2">Nip</th>
                <th rowspan="2">Pendidikan Terakhir</th>
                <th rowspan="2">Diklatpim/STLUKPI/STLUR</th>
                <th colspan="2">Golongan Lama</th>
                <th colspan="2">Masa Kerja Golongan</th>
                <th colspan="2">Golongan Baru</th>
                <th colspan="2">Masa Kerja Golongan</th>
                <th rowspan="2">Jabatan Terakhir</th>
                <th rowspan="2">TMT Pelantikan</th>
                <th rowspan="2">Eselon</th>
                <th rowspan="2">Jabatan Atasan Langsung</th>
                <th rowspan="2">Gol Atasan Langsung</th>
                <th rowspan="2">Unit Kerja</th>
            </tr>
            <tr>

                <th>Gol</th>
                <th>TMT</th>

                <th>Th</th>
                <th>Bln</th>

                <th>Gol</th>
                <th>TMT</th>

                <th>Th</th>
                <th>Bln</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $pak)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $pak->name }}</td>
                    <td>{{ "'" . $pak->nip }}</td>
                    <td>{{ $pak->pendidikan }}</td>
                    <td>{{ '-' }}</td>

                    <td>{{ get_jabatan($pak->pangkat_golongan)->pangkat }}</td>
                    <td>{{ tgl_indo($pak->tmt_pns) }}</td>

                    <td>{{ masa_kerja_tahun(\Carbon\Carbon::parse($pak->tmt_pns), $pak->tmt_cpns) }}
                        Tahun
                    </td>
                    <td>{{ masa_kerja_bulan(\Carbon\Carbon::parse($pak->tmt_pns), $pak->tmt_cpns) }}
                    </td>

                    <td>{{ get_jabatan($pak->pangkat_golongan + 1)->pangkat }}</td>
                    <td> {{ \Carbon\Carbon::parse(now())->format('m') <= 4 || \Carbon\Carbon::parse(now())->format('m') >= 10? tgl_indo(\Carbon\Carbon::parse(\Carbon\Carbon::parse(now())->format('Y') . '-04-01')->addYears(1)->format('Y-m-d')): tgl_indo(\Carbon\Carbon::parse(\Carbon\Carbon::parse($pak->awal)->format('y') . '-10-01')->format('Y-m-d')) }}
                    </td>


                    <td>
                        {{ \Carbon\Carbon::parse(now())->format('m') <= 4 || \Carbon\Carbon::parse(now())->format('m') >= 10
                            ? masa_kerja_tahun(
                                \Carbon\Carbon::parse(\Carbon\Carbon::parse($pak->awal)->format('y') . '-04-01')->addYears(1),
                                $pak->tmt_cpns,
                            )
                            : masa_kerja_tahun(
                                \Carbon\Carbon::parse(\Carbon\Carbon::parse($pak->awal)->format('y') . '-10-01')->addYears(1),
                                $pak->tmt_cpns,
                            ) }}
                        Tahun
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse(now())->format('m') <= 4 || \Carbon\Carbon::parse(now())->format('m') >= 10
                            ? masa_kerja_bulan(
                                \Carbon\Carbon::parse(\Carbon\Carbon::parse($pak->awal)->format('y') . '-04-01')->addYears(1),
                                $pak->tmt_cpns,
                            )
                            : masa_kerja_bulan(
                                \Carbon\Carbon::parse(\Carbon\Carbon::parse($pak->awal)->format('y') . '-10-01')->addYears(1),
                                $pak->tmt_cpns,
                            ) }}
                    </td>
                    <td>{{ get_jabatan($pak->pangkat_golongan + 1)->jabatan }}</td>
                    <td>{{ tgl_indo($pak->tmt_jabatan) }}</td>
                    <td>Non Eselon</td>
                    <td>Kepala Sekolah</td>
                    <td></td>
                    <td>{{ $pak->sekolah }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
