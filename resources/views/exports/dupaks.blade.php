<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }
        </style>
</head>
<body>
    <table>
        <tr>
            <td  colspan="5">
                <h1>Daftar Usulan Angka Kredit</h1>
            </td>
        </tr>
        <tr>
            <td  colspan="4">Unsur / Sub Unsur</td>
            <td  width="10%">Nilai</td>
        </tr>
        <tr>
            <td  width="2%" style="vertical-align: top;">1</td>
            <td  colspan="3">Unsur Utama</td>
            <td td>
        </tr>
        <tr>
            <td  width="2%" style="vertical-align: top;"></td>
            <td  width="2%" style="vertical-align: top;">A</td>
            <td  colspan="2">Pendidikan</td>
            <td td>
        </tr>
        @php $no = 1; @endphp
            @foreach ($pendidikan1 as $item)
            <tr>
                <td  width="2%"></td>
                <td  width="2%"></td>
                <td  width="2%">{{$no++}}</td>
                <td  >{{'['.$item->sub_unsur.']  '.$item->kegiatan}}</td>
                <td>
                    {{$item->nilai}}
                </td>
            </tr>
            @endforeach
            @foreach ($prajab as $item)
            <tr>
                <td  width="2%"></td>
                <td  width="2%"></td>
                <td  width="2%">{{$no++}}</td>
                <td  >{{'['.$item->sub_unsur.']  '.$item->kegiatan}}</td>
                <td>
                    {{$item->nilai}}
                </td>
            </tr>
            @endforeach
            <tr>
                <td  width="2%" style="vertical-align: top;"></td>
                <td  width="2%" style="vertical-align: top;">B</td>
                <td  colspan="2">Pembelajaran / Bimbingan dan Tugas Tertentu</td>
                <td> </td>
            </tr>

            @php $no = 1; @endphp
            @foreach ($penugasan as $item)
            <tr>
                <td  width="2%"></td>
                <td  width="2%"></td>
                <td  width="2%">{{$no++}}</td>
                <td  >{{'['.$item->sub_unsur.']  '.$item->kegiatan}}</td>
                <td>
                    {{$item->nilai}}
                </td>
            </tr>
            @endforeach
            <tr>
                <td  width="2%" style="vertical-align: top;"></td>
                <td  width="2%" style="vertical-align: top;">C</td>
                <td  colspan="2">Pengembangan Keprofesian Bekelanjutan</td>
                <td> </td>
            </tr>

            @php $no = 1; @endphp
            @foreach ($pkb as $item)
            <tr>
                <td  width="2%"></td>
                <td  width="2%"></td>
                <td  width="2%">{{$no++}}</td>
                <td  >{{'['.$item->sub_unsur.']  '.$item->kegiatan}}</td>
                <td>
                    {{$item->nilai}}
                </td>
            </tr>
            @endforeach

            <tr>
                <td  width="2%"></td>
                <td  colspan="3" >Jumlah Unsur Utama</td>
                <td>
                    {{$sum_pendidikan1+$sum_prajab+$sum_penugasan+$sum_pkb}}
                </td>
            </tr>
            <tr>
                <td  width="2%" style="vertical-align: top;">2</td>
                <td  colspan="3">Unsur Penunjang</td>
                <td> </td>
            </tr>

            @php $no = 1; @endphp
            @foreach ($penunjang as $item)
            <tr>
                <td  width="2%"></td>
                <td  width="2%"></td>
                <td  width="2%">{{$no++}}</td>
                <td> {{'['.$item->sub_unsur.']  '.$item->kegiatan}}</td>
                <td>
                    {{$item->nilai}}
                </td>
            </tr>
            @endforeach


            <tr>
                <td  width="2%"></td>
                <td  colspan="3" >Jumlah Unsur Penunjang</td>
                <td>
                    {{$sum_penunjang}}
                </td>
            </tr>

            <tr>
                <td>Jumlah Unsur Utama dan Penunjang</td>
                <td colspan="4">  {{ $sum_pendidikan1+$sum_prajab+$sum_penugasan+$sum_pkb+$sum_penunjang }}</td>
            </tr>


    </table>

</body>
</html>
