@include('penilais.kelengkapan')
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
            <td scope="col">{{$sum_tertinggal}}</td>
        </tr>
        <tr>
            <td scope="col" width="2%" style="vertical-align: top;"></td>
            <td scope="col" width="2%" style="vertical-align: top;">A</td>
            <td scope="col" colspan="2">Pendidikan</td>
            <td scope="col"></td>
        </tr>
        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%">1</td>
            <td scope="col" >Pendidikan Sekolah</td>
            <td scope="col">

            </td>
        </tr>
        @php $no = 1; @endphp
        @foreach ($pendidikan1 as $item)
        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" >{{'['.$item->sub_unsur.']  '.$item->kegiatan}}</td>
            <td scope="col">
                <input type="number" disabled name="pendidikan_sekolah" id="sekolah"  value="{{$item->nilai}}" class="form-control">
            </td>
        </tr>
        @endforeach
        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%">2</td>
            <td scope="col" >Pelatihan Prajabatan</td>
            <td scope="col">

            </td>
        </tr>

        @foreach ($prajab as $item)
        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
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
        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%">1</td>
            <td scope="col" >Proses Pembelajaran</td>
            <td scope="col">

            </td>
        </tr>
        @php $no = 1; @endphp
        @foreach ($proses_pembelajaran as $item)
        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" >{{'['.$item->sub_unsur.']  '.$item->kegiatan}}</td>
            <td scope="col">
                <input type="number" disabled name="pendidikan_sekolah" id="sekolah"  value="{{$item->nilai}}" class="form-control">
            </td>
        </tr>
        @endforeach

        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%">2</td>
            <td scope="col" >Proses Bimbingan</td>
            <td scope="col">

            </td>
        </tr>

        @php $no = 1; @endphp
        @foreach ($proses_bimbingan as $item)
        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" >{{'['.$item->sub_unsur.']  '.$item->kegiatan}}</td>
            <td scope="col">
                <input type="number" disabled name="pendidikan_sekolah" id="sekolah"  value="{{$item->nilai}}" class="form-control">
            </td>
        </tr>
        @endforeach

        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%">3</td>
            <td scope="col" >Tugas Lainya</td>
            <td scope="col">

            </td>
        </tr>


        @php $no = 1; @endphp
        @foreach ($tugas_lain as $item)
        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
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
        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%">1</td>
            <td scope="col" >Pengembangan Diri</td>
            <td scope="col">

            </td>
        </tr>

        @php $no = 1; @endphp
        @foreach ($pengembangan_diri as $item)
        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" >{{'['.$item->sub_unsur.']  '.$item->kegiatan}}</td>
            <td scope="col">
                <input type="number" disabled name="pendidikan_sekolah" id="sekolah"  value="{{$item->nilai}}" class="form-control">
            </td>
        </tr>
        @endforeach

        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%">2</td>
            <td scope="col" >Publikasi Ilmiah</td>
            <td scope="col">

            </td>
        </tr>

        @php $no = 1; @endphp
        @foreach ($karya_ilmiah as $item)
        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" >{{'['.$item->sub_unsur.']  '.$item->kegiatan}}</td>
            <td scope="col">
                <input type="number" disabled name="pendidikan_sekolah" id="sekolah"  value="{{$item->nilai}}" class="form-control">
            </td>
        </tr>
        @endforeach

        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%">3</td>
            <td scope="col" >Karya Inovatf</td>
            <td scope="col">

            </td>
        </tr>

        @php $no = 1; @endphp
        @foreach ($karya_inovatif as $item)
        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
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
                {{-- <input type="number" disabled name="pendidikan_sekolah" id="sekolah"  value="{{ $sum_prajab $sum_penugasan}}" class="form-control"> --}}
                <span id=""> {{
                                $pendidikan1->sum('nilai') + $prajab->sum('nilai') +
                                $proses_pembelajaran->sum('nilai') + $proses_bimbingan->sum('nilai') +
                                $karya_ilmiah->sum('nilai') + $karya_inovatif->sum('nilai') +
                                $pengembangan_diri->sum('nilai')
                            }}</span>
            </td>
        </tr>
        <tr>
            <td scope="col" width="2%" style="vertical-align: top;">2</td>
            <td scope="col" colspan="3">Unsur Penunjang</td>
            <td scope="col"></td>
        </tr>
        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%">1</td>
            <td scope="col" >Ijazah Tidak Sesuai</td>
            <td scope="col">

            </td>
        </tr>
        @php $no = 1; @endphp
        @foreach ($ijazah_tidak_sesuai as $item)
        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" >{{'['.$item->sub_unsur.']  '.$item->kegiatan}}</td>
            <td scope="col">
                <input type="number" disabled name="pendidikan_sekolah" id="sekolah"  value="{{$item->nilai}}" class="form-control">
            </td>
        </tr>
        @endforeach


        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%">3</td>
            <td scope="col" >Pendukung Tugas Guru</td>
            <td scope="col">

            </td>
        </tr>

        @php $no = 1; @endphp
        @foreach ($pendukung_tugas_guru as $item)
        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" >{{'['.$item->sub_unsur.']  '.$item->kegiatan}}</td>
            <td scope="col">
                <input type="number" disabled name="pendidikan_sekolah" id="sekolah"  value="{{$item->nilai}}" class="form-control">
            </td>
        </tr>
        @endforeach


        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%">2</td>
            <td scope="col" >Memperoleh Penghargaan</td>
            <td scope="col">

            </td>
        </tr>

        @php $no = 1; @endphp
        @foreach ($memperoleh_penghargaan as $item)
        <tr>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
            <td scope="col" width="2%"></td>
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
                {{-- <input type="number" disabled name="pendidikan_sekolah" id="sekolah"  value="{{$sum_penunjang}}" class="form-control"> --}}
                <span id=""> {{
                    $ijazah_tidak_sesuai->sum('nilai') + $memperoleh_penghargaan->sum('nilai') +
                    $pendukung_tugas_guru->sum('nilai')
                }}</span>
            </td>
        </tr>
        <tr>
            <td scope="col" colspan="4" >Jumlah Unsur Utama & Penunjang</td>
            <td scope="col">
                <span id=""> {{
                    number_format(
                        $pendidikan1->sum('nilai') + $prajab->sum('nilai') +
                        $proses_pembelajaran->sum('nilai') + $proses_bimbingan->sum('nilai') +
                        $karya_ilmiah->sum('nilai') + $karya_inovatif->sum('nilai') +
                        $pengembangan_diri->sum('nilai') +

                        $ijazah_tidak_sesuai->sum('nilai') + $memperoleh_penghargaan->sum('nilai') +
                        $pendukung_tugas_guru->sum('nilai') + $sum_tertinggal
                        ,3)

                }}</span>
                {{-- <input type="number" disabled name="pendidikan_sekolah" id="sekolah"  value="{{$sum_pendidikan1+$sum_prajab+$sum_penugasan+$sum_pkb+$sum_penunjang}}" class="form-control"> --}}

            </td>
        </tr>
    </tbody>
  </table>
</table>



