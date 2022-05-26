<table class="table table-bordered" >
    <thead>
    <tbody>
        <tr>
            <td scope="col" colspan="5" class="text-center font-weight-bolder">
                <h1>Daftar Usulan Angka Kredit</h1>
            </td>
        </tr>
        <tr>
            <td scope="col" colspan="4">Unsur / Sub Unsur</td>
            <td scope="col" width="10%">Nilai</td>
        </tr>
        <tr>
            <td scope="col" width="2%" style="vertical-align: top;">1</td>
            <td scope="col" colspan="3">Unsur Utama</td>
            <td scope="col"></td>
        </tr>
        <tr>
            <td scope="col" width="2%" style="vertical-align: top;"></td>
            <td scope="col" width="2%" style="vertical-align: top;">A</td>
            <td scope="col" colspan="2">Pendidikan</td>
            <td scope="col"></td>
        </tr>
        @php $no = 1; @endphp
        @foreach ($pendidikan1 as $item)
        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%">{{$no++}}</td>
            <td scope="col" >{{'['.$item->sub_unsur.']  '.$item->kegiatan}}</td>
            <td scope="col">
                <input type="number" disabled name="pendidikan_sekolah" id="sekolah"  value="{{$item->nilai}}" class="form-control">
            </td>
        </tr>
        @endforeach

        @foreach ($prajab as $item)
        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%">{{$no++}}</td>
            <td scope="col" >{{'['.$item->sub_unsur.']  '.$item->kegiatan}}</td>
            <td scope="col">
                <input type="number" disabled name="pendidikan_sekolah" id="sekolah"  value="{{$item->nilai}}" class="form-control">
            </td>
        </tr>
        @endforeach

        <tr>
            <td scope="col" width="2%" style="vertical-align: top;"></td>
            <td scope="col" width="2%" style="vertical-align: top;">B</td>
            <td scope="col" colspan="2">Pembelajaran / Bimbingan dan Tugas Tertentu</td>
            <td scope="col"></td>
        </tr>

        @php $no = 1; @endphp
        @foreach ($penugasan as $item)
        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%">{{$no++}}</td>
            <td scope="col" >{{'['.$item->sub_unsur.']  '.$item->kegiatan}}</td>
            <td scope="col">
                <input type="number" disabled name="pendidikan_sekolah" id="sekolah"  value="{{$item->nilai}}" class="form-control">
            </td>
        </tr>
        @endforeach
        <tr>
            <td scope="col" width="2%" style="vertical-align: top;"></td>
            <td scope="col" width="2%" style="vertical-align: top;">C</td>
            <td scope="col" colspan="2">Pengembangan Keprofesian Bekelanjutan</td>
            <td scope="col"></td>
        </tr>

        @php $no = 1; @endphp
        @foreach ($pkb as $item)
        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%">{{$no++}}</td>
            <td scope="col" >{{'['.$item->sub_unsur.']  '.$item->kegiatan}}</td>
            <td scope="col">
                <input type="number" disabled name="pendidikan_sekolah" id="sekolah"  value="{{$item->nilai}}" class="form-control">
            </td>
        </tr>
        @endforeach


        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" colspan="3" >Jumlah Unsur Utama</td>
            <td scope="col">
                <input type="number" disabled name="pendidikan_sekolah" id="sekolah"  value="{{$sum_pendidikan1+$sum_prajab+$sum_penugasan+$sum_pkb}}" class="form-control">
            </td>
        </tr>
        <tr>
            <td scope="col" width="2%" style="vertical-align: top;">2</td>
            <td scope="col" colspan="3">Unsur Penunjang</td>
            <td scope="col"></td>
        </tr>

        @php $no = 1; @endphp
        @foreach ($penunjang as $item)
        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%">{{$no++}}</td>
            <td scope="col" >{{'['.$item->sub_unsur.']  '.$item->kegiatan}}</td>
            <td scope="col">
                <input type="number" disabled name="pendidikan_sekolah" id="sekolah"  value="{{$item->nilai}}" class="form-control">
            </td>
        </tr>
        @endforeach

        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" colspan="3" >Jumlah Unsur Penunjang</td>
            <td scope="col">
                <input type="number" disabled name="pendidikan_sekolah" id="sekolah"  value="{{$sum_penunjang}}" class="form-control">
            </td>
        </tr>
        <tr>
            <td scope="col" colspan="4" >Jumlah Unsur Utama & Penunjang</td>
            <td scope="col">
                <input type="number" disabled name="pendidikan_sekolah" id="sekolah"  value="{{$sum_pendidikan1+$sum_prajab+$sum_penugasan+$sum_pkb+$sum_penunjang}}" class="form-control">
            </td>
        </tr>
    </tbody>
  </table>
</table>

