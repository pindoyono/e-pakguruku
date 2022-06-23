
 <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('penilais.update_pak_penilai',$pak_id)}}" method="POST">
    @csrf
    <input type="hidden" value="PUT" name="_method">
<table class="table table-bordered" >
    <thead>
    <tbody>
        <tr>
            <td scope="col" colspan="7" class="text-center font-weight-bolder">
                <h1>Berita Acara Penetapan Angka Kredit</h1>
            </td>
        </tr>
        <tr>
            <td scope="col" colspan="4">Unsur / Sub Unsur</td>
            <td scope="col" width="10%">Lama</td>
            <td scope="col" width="10%">Baru</td>
            <td scope="col" width="10%">Total</td>
        </tr>
        <tr>
            <td scope="col" rowspan="13" width="2%" style="vertical-align: top;">1</td>
            <td scope="col" colspan="3">Unsur Utama</td>
            <td scope="col">
                <input type="number" step="any" name="tertinggal" id="tertinggal" oninput="jml_utama();jml_semua();" value="{{$pak->tertinggal != null ? $pak->tertinggal : 0}}" class="form-control">
            </td>
            <td scope="col">
                <input type="number" step="any" name="tertinggal2" id="tertinggal2" oninput="jml_utama();jml_semua();"  value="{{$pak->tertinggal2 != null ? $pak->tertinggal2 : 0}}" class="form-control">
            </td>
            <td scope="col">
                <span id="jml_tertinggal">
                    {{
                        number_format(
                            $pak->tertinggal + $pak->tertinggal2
                        ,3);
                    }}
                </span>
            </td>
        </tr>

        {{-- Pendidikan --}}
        <tr>
            <td scope="col" rowspan="3" width="2%" style="vertical-align: top;">A</td>
            <td scope="col" colspan="2">Pendidikan</td>
            <td scope="col"></td>
            <td scope="col"></td>
            <td scope="col"></td>
        </tr>
        <tr>
            <td scope="col" width="2%">1</td>
            <td scope="col">Pendidikan Sekolah</td>
            <td scope="col">
                <input type="number" step="any" name="pendidikan_sekolah" id="sekolah" oninput="jml_utama();jml_semua();" value="{{$pak->pendidikan_sekolah != null ? $pak->pendidikan_sekolah : 0}}" class="form-control">
            </td>
            <td scope="col">
                <input type="number" step="any" name="pendidikan_sekolah2" id="sekolah2" oninput="jml_utama();jml_semua();"  value="{{$pak->pendidikan_sekolah2 != null ? $pak->pendidikan_sekolah2 : 0}}" class="form-control">
            </td>
            <td scope="col">
                <span id="jml_sekolah">
                    {{
                        number_format(
                            $pak->pendidikan_sekolah + $pak->pendidikan_sekolah2
                        ,3);
                    }}
                </span>
            </td>
        </tr>
        <tr>
            <td scope="col">2</td>
            <td scope="col">Pelatihan Prajabatan</td>
            <td scope="col">
                <input type="number" step="any" name="pelatihan_prajabatan" id="pra_jabatan" oninput="jml_utama();jml_semua();" value="{{$pak->pelatihan_prajabatan != null ? $pak->pelatihan_prajabatan : 0}}"  class="form-control">
            </td>
            <td scope="col">
                <input type="number" step="any" name="pelatihan_prajabatan2" id="pra_jabatan2" oninput="jml_utama();jml_semua();" value="{{$pak->pelatihan_prajabatan2 != null ? $pak->pelatihan_prajabatan2 : 0}}"  class="form-control">
            </td>
            <td scope="col">
                <span id="jml_pra_jabatan">
                    {{
                        number_format(
                            $pak->pelatihan_prajabatan + $pak->pelatihan_prajabatan2
                        ,3);
                    }}
                </span>
            </td>
        </tr>
        {{-- Pembelajaran / Bimbingan dan Tugas Tertentu --}}
        <tr>
            <td scope="col" rowspan="4" width="2%" style="vertical-align: top;"> B</td>
            <td scope="col" colspan="2">Pembelajaran / Bimbingan dan Tugas Tertentu</td>
            <td scope="col"></td>
            <td scope="col"></td>
            <td scope="col"></td>
        </tr>
        <tr>
            <td scope="col" width="2%">1</td>
            <td scope="col">Proses Pembelajaran</td>
            <td scope="col">
                <input type="number" step="any" name="proses_pembelajaran" id="prose_pembelajaran" oninput="jml_utama();jml_semua();" value="{{$pak->proses_pembelajaran != null ? $pak->proses_pembelajaran : 0}}" class="form-control">
            </td>
            <td scope="col">
                <input type="number" step="any" name="proses_pembelajaran2" id="prose_pembelajaran2" oninput="jml_utama();jml_semua();" value="{{$pak->proses_pembelajaran2 != null ? $pak->proses_pembelajaran2 : 0}}" class="form-control">
            </td>
            <td scope="col">
                <span id="jml_prose_pembelajaran">
                    {{
                        number_format(
                            $pak->proses_pembelajaran + $pak->proses_pembelajaran2
                        ,3);
                    }}
                </span>
            </td>

        </tr>
        <tr>
            <td scope="col">2</td>
            <td scope="col">Proses Bimbingan</td>
            <td scope="col">
                <input type="number" step="any" name="proses_bimbingan" id="proses_bimbingan" oninput="jml_utama();jml_semua();" value="{{$pak->proses_bimbingan != null ? $pak->proses_bimbingan : 0}}" class="form-control">
            </td>
            <td scope="col">
                <input type="number" step="any" name="proses_bimbingan2" id="proses_bimbingan2" oninput="jml_utama();jml_semua();" value="{{$pak->proses_bimbingan2 != null ? $pak->proses_bimbingan2 : 0}}" class="form-control">
            </td>
            <td scope="col">
                <span id="jml_proses_bimbingan">
                    {{
                        number_format(
                            $pak->proses_bimbingan + $pak->proses_bimbingan2
                        ,3);
                    }}
                </span>
            </td>
        </tr>
        <tr>
            <td scope="col">3</td>
            <td scope="col">Tugas Lainya</td>
            <td scope="col">
                <input type="number" step="any" name="tugas_lain" id="tugas_lain" oninput="jml_utama();jml_semua();" value="{{$pak->tugas_lain != null ? $pak->tugas_lain : 0}}" class="form-control">
            </td>
            <td scope="col">
                <input type="number" step="any" name="tugas_lain2" id="tugas_lain2" oninput="jml_utama();jml_semua();" value="{{$pak->tugas_lain2 != null ? $pak->tugas_lain2 : 0}}" class="form-control">
            </td>
            <td scope="col">
                <span id="jml_tugas_lain">
                    {{
                        number_format(
                            $pak->tugas_lain + $pak->tugas_lain2
                        ,3);
                    }}
                </span>
            </td>
        </tr>

        {{-- Pengembangan Keprofesian Bekelanjutan --}}
        <tr>
            <td scope="col" rowspan="4" width="2%" style="vertical-align: top;"> C</td>
            <td scope="col" colspan="2">Pengembangan Keprofesian Bekelanjutan</td>
            <td scope="col"></td>
            <td scope="col"></td>
            <td scope="col"></td>
        </tr>
        <tr>
            <td scope="col" width="2%">1</td>
            <td scope="col">Pengembangan Diri</td>
            <td scope="col">
                <input type="number" step="any" name="pengembangan_diri"  id="pengembangan_diri" oninput="jml_utama();jml_semua();" value="{{$pak->pengembangan_diri != null ? $pak->pengembangan_diri : 0}}" class="form-control">
            </td>
            <td scope="col">
                <input type="number" step="any" name="pengembangan_diri2" id="pengembangan_diri2" oninput="jml_utama();jml_semua();" value="{{$pak->pengembangan_diri2 != null ? $pak->pengembangan_diri2 : 0}}" class="form-control">
            </td>
            <td scope="col">
                <span id="jml_pengembangan_diri">
                    {{
                        number_format(
                            $pak->pengembangan_diri + $pak->pengembangan_diri2
                        ,3);
                    }}
                </span>
            </td>
        </tr>
        <tr>
            <td scope="col">2</td>
            <td scope="col">Publikasi Ilmiah</td>
            <td scope="col">
                <input type="number" step="any" name="publikasi_ilmiah" id="karya_ilmiah" oninput="jml_utama();jml_semua();" value="{{$pak->publikasi_ilmiah != null ? $pak->publikasi_ilmiah : 0}}" class="form-control">
            </td>
            <td scope="col">
                <input type="number" step="any" name="publikasi_ilmiah2" id="karya_ilmiah2" oninput="jml_utama();jml_semua();" value="{{$pak->publikasi_ilmiah2 != null ? $pak->publikasi_ilmiah2 : 0}}" class="form-control">
            </td>
            <td scope="col">
                <span id="jml_karya_ilmiah">
                    {{
                        number_format(
                            $pak->publikasi_ilmiah + $pak->publikasi_ilmiah2
                        ,3);
                    }}
                </span>
            </td>
        </tr>
        <tr>
            <td scope="col">3</td>
                <td scope="col">Karya Inovatif</td>
            <td scope="col">
                <input type="number" step="any" name="karya_inovatif" id="karya_inovatif" oninput="jml_utama();jml_semua();" value="{{$pak->karya_inovatif != null ? $pak->karya_inovatif : 0}}" class="form-control">
            </td>
            <td scope="col">
                <input type="number" step="any" name="karya_inovatif2" id="karya_inovatif2" oninput="jml_utama();jml_semua();" value="{{$pak->karya_inovatif2 != null ? $pak->karya_inovatif2 : 0}}" class="form-control">
            </td>
            <td scope="col">
                <span id="jml_karya_inovatif">
                    {{
                        number_format(
                        $pak->karya_inovatif + $pak->karya_inovatif2
                        ,3);
                    }}
                </span>
            </td>
        </tr>


        <tr>
            <td scope="col" colspan="3">Jumlah Unsur Utama</td>
            <td scope="col">
                <span id="jml_utama">
                    {{
                         number_format(
                        $pak->pendidikan_sekolah
                        + $pak->pelatihan_prajabatan
                        + $pak->proses_pembelajaran
                        + $pak->proses_bimbingan
                        + $pak->tugas_lain
                        + $pak->pengembangan_diri
                        + $pak->publikasi_ilmiah
                        + $pak->karya_inovatif
                        ,3);
                    }}
                </span>
            </td>
            <td scope="col">
                <span id="jml_utama2">
                    {{
                        number_format(
                        $pak->pendidikan_sekolah2
                        + $pak->pelatihan_prajabatan2
                        + $pak->proses_pembelajaran2
                        + $pak->proses_bimbingan2
                        + $pak->tugas_lain2
                        + $pak->pengembangan_diri2
                        + $pak->publikasi_ilmiah2
                        + $pak->karya_inovatif2
                        ,3);
                    }}
                </span>
            </td>
            <td scope="col">
                <span id="jml_utama3">
                    {{
                        number_format(
                        $pak->pendidikan_sekolah + $pak->pendidikan_sekolah2 +
                        $pak->pelatihan_prajabatan + $pak->pelatihan_prajabatan2 +
                        $pak->proses_pembelajaran + $pak->proses_pembelajaran2 +
                        $pak->proses_bimbingan + $pak->proses_bimbingan2 +
                        $pak->tugas_lain + $pak->tugas_lain2 +
                        $pak->pengembangan_diri + $pak->pengembangan_diri2 +
                        $pak->publikasi_ilmiah + $pak->publikasi_ilmiah2 +
                        $pak->karya_inovatif + $pak->karya_inovatif2
                        ,3);
                    }}
                </span>
            </td>
        </tr>

        {{-- Unsur Penunjang --}}
        <tr>
            <td scope="col" rowspan="5" width="2%" style="vertical-align: top;">2</td>
            <td scope="col" colspan="3">Unsur Penunjang</td>
            <td scope="col">
                {{-- <input type="number" step="any"  id="" oninput="jml_utama()" value="" class="form-control"> --}}
            </td>
            <td scope="col">
                {{-- <input type="number" step="any"  id="" oninput="jml_utama()" value="" class="form-control"> --}}
            </td>
            <td scope="col">
                {{-- <input type="number" step="any"  id="" oninput="jml_utama()" value="" class="form-control"> --}}
            </td>
        </tr>

        <tr>
            <td scope="col width="2%">A</td>
            <td scope="col" colspan="2">Ijazah Tidak Sesuai</td>
            <td scope="col">
                <input type="number" step="any" name="ijazah_tidak_sesuai" id="ijazah_tidak_sesuai" oninput="jml_penunjang();jml_semua();" value="{{$pak->ijazah_tidak_sesuai != null ? $pak->ijazah_tidak_sesuai : 0}}" class="form-control">
            </td>
            <td scope="col">
                <input type="number" step="any" name="ijazah_tidak_sesuai2" id="ijazah_tidak_sesuai2" oninput="jml_penunjang();jml_semua();" value="{{$pak->ijazah_tidak_sesuai2 != null ? $pak->ijazah_tidak_sesuai2 : 0}}" class="form-control">
            </td>
            <td scope="col">
                <span id="jml_ijazah_tidak_sesuai">
                    {{
                        number_format(
                            $pak->ijazah_tidak_sesuai + $pak->ijazah_tidak_sesuai2
                        ,3);
                    }}
                </span>
            </td>
        </tr>
        <tr>
            <td scope="col width="2%">C</td>
            <td scope="col" colspan="2">Pendukung Tugas Guru</td>
            <td scope="col">
                <input type="number" step="any" name="pendukung_tugas_guru" id="pendukung_tugas_guru" oninput="jml_penunjang();jml_semua();" value="{{$pak->pendukung_tugas_guru != null ? $pak->pendukung_tugas_guru : 0}}" class="form-control">
            </td>
            <td scope="col">
                <input type="number" step="any" name="pendukung_tugas_guru2" id="pendukung_tugas_guru2" oninput="jml_penunjang();jml_semua();" value="{{$pak->pendukung_tugas_guru2 != null ? $pak->pendukung_tugas_guru2 : 0}}" class="form-control">
            </td>
            <td scope="col">
                <span id="jml_pendukung_tugas_guru">
                    {{
                        number_format(
                            $pak->pendukung_tugas_guru + $pak->pendukung_tugas_guru2
                        ,3);
                    }}
                </span>
            </td>
        </tr>
        <tr>
            <td scope="col width="2%">B</td>
            <td scope="col" colspan="2">Memperoleh Penghargaan</td>
            <td scope="col">
                <input type="number" step="any" name="memperoleh_penghargaan" id="penghargaan" oninput="jml_penunjang();jml_semua();" value="{{$pak->memperoleh_penghargaan != null ? $pak->memperoleh_penghargaan : 0}}" class="form-control">
            </td>
            <td scope="col">
                <input type="number" step="any" name="memperoleh_penghargaan2" id="penghargaan2" oninput="jml_penunjang();jml_semua();" value="{{$pak->memperoleh_penghargaan2 != null ? $pak->memperoleh_penghargaan2 : 0}}" class="form-control">
            </td>
            <td scope="col">
                <span id="jml_penghargaan">
                    {{
                        number_format(
                            $pak->memperoleh_penghargaan + $pak->memperoleh_penghargaan2
                        ,3);
                    }}
                </span>
            </td>
        </tr>
        <tr>
            <td scope="col" colspan="3">Jumlah Unsur Penunjang</td>
            <td scope="col">
                <span id="jml_penunjang">
                    {{
                        number_format(
                            $pak->ijazah_tidak_sesuai
                            + $pak->pendukung_tugas_guru
                            + $pak->memperoleh_penghargaan
                        ,3);
                    }}
                </span>
            </td>
            <td scope="col">
                <span id="jml_penunjang2">
                    {{
                        number_format(
                            $pak->ijazah_tidak_sesuai2
                            + $pak->pendukung_tugas_guru2
                            + $pak->memperoleh_penghargaan2
                        ,3);
                    }}
                </span>
            </td>
            <td scope="col">
                <span id="jml_penunjang3">
                    {{
                        number_format(
                            $pak->ijazah_tidak_sesuai + $pak->ijazah_tidak_sesuai2 +
                            $pak->pendukung_tugas_guru + $pak->pendukung_tugas_guru2 +
                            $pak->memperoleh_penghargaan + $pak->memperoleh_penghargaan2
                        ,3);
                    }}
                </span>
            </td>
        </tr>
        <tr>
            <td scope="col" colspan="4">Jumlah Unsur Utama & Penunjang</td>
            <td scope="col">
                <span id="jml_semua">
                    {{
                         number_format(
                        $pak->tertinggal +
                         $pak->pendidikan_sekolah
                        + $pak->pelatihan_prajabatan
                        + $pak->proses_pembelajaran
                        + $pak->proses_bimbingan
                        + $pak->tugas_lain
                        + $pak->pengembangan_diri
                        + $pak->publikasi_ilmiah
                        + $pak->karya_inovatif
                        + $pak->ijazah_tidak_sesuai
                            + $pak->pendukung_tugas_guru
                            + $pak->memperoleh_penghargaan
                        ,3);
                    }}
                </span>
            </td>
            <td scope="col">
                <span id="jml_semua2">
                    {{
                         number_format(
                        $pak->tertinggal2 +
                        $pak->pendidikan_sekolah2
                        + $pak->pelatihan_prajabatan2
                        + $pak->proses_pembelajaran2
                        + $pak->proses_bimbingan2
                        + $pak->tugas_lain2
                        + $pak->pengembangan_diri2
                        + $pak->publikasi_ilmiah2
                        + $pak->karya_inovatif2
                        +$pak->ijazah_tidak_sesuai2
                            + $pak->pendukung_tugas_guru2
                            + $pak->memperoleh_penghargaan2
                        ,3);
                    }}
                </span>
            </td>
            <td scope="col">
                <span id="jml_semua3">
                    {{
                         number_format(
                        $pak->pendidikan_sekolah + $pak->pendidikan_sekolah2 +
                        $pak->pelatihan_prajabatan + $pak->pelatihan_prajabatan2 +
                        $pak->proses_pembelajaran + $pak->proses_pembelajaran2 +
                        $pak->proses_bimbingan + $pak->proses_bimbingan2 +
                        $pak->tugas_lain + $pak->tugas_lain2 +
                        $pak->pengembangan_diri + $pak->pengembangan_diri2 +
                        $pak->publikasi_ilmiah + $pak->publikasi_ilmiah2 +
                        $pak->karya_inovatif + $pak->karya_inovatif2 +
                            $pak->ijazah_tidak_sesuai + $pak->ijazah_tidak_sesuai2 +
                            $pak->pendukung_tugas_guru + $pak->pendukung_tugas_guru2 +
                            $pak->memperoleh_penghargaan + $pak->memperoleh_penghargaan2
                            + $pak->tertinggal + $pak->tertinggal2
                        ,3);
                    }}
                </span>
            </td>
        </tr>
    </tbody>
  </table>
</table>

@if($user->id != Auth::user()->id)
<button type="submit" class="btn btn-success">
    <span class="btn-label">
      <i class="material-icons">check</i>
    </span>
    Simpan
    <div class="ripple-container"></div>
</button>

<a class="btn btn-primary" target="_blank" href="{{ route('penilais.cetak_berita_acara',$pak->id)}}">
    <span class="btn-label">
        <i class="material-icons">print</i>
      </span>
      Cetak
      <div class="ripple-container"></div>
</a>

@else
    <h2 style="font-weight: bold">
        Tidak Bisa Menilai DUPAK INI
    </h2>
@endif

{!! Form::close() !!}


@push('body-scripts')

  <script>
    function jml_utama() {
        var sekolah = document.getElementById("sekolah").value;
        var sekolah2 = document.getElementById("sekolah2").value;
        var pra_jabatan = document.getElementById("pra_jabatan").value;
        var pra_jabatan2 = document.getElementById("pra_jabatan2").value;
        var prose_pembelajaran = document.getElementById("prose_pembelajaran").value;
        var prose_pembelajaran2 = document.getElementById("prose_pembelajaran2").value;
        var proses_bimbingan = document.getElementById("proses_bimbingan").value;
        var proses_bimbingan2 = document.getElementById("proses_bimbingan2").value;
        var tugas_lain = document.getElementById("tugas_lain").value;
        var tugas_lain2 = document.getElementById("tugas_lain2").value;
        var pengembangan_diri = document.getElementById("pengembangan_diri").value;
        var pengembangan_diri2 = document.getElementById("pengembangan_diri2").value;
        var karya_ilmiah = document.getElementById("karya_ilmiah").value;
        var karya_ilmiah2 = document.getElementById("karya_ilmiah2").value;
        var karya_inovatif = document.getElementById("karya_inovatif").value;
        var karya_inovatif2 = document.getElementById("karya_inovatif2").value;
        var total = + sekolah + + pra_jabatan + + prose_pembelajaran + + proses_bimbingan + + tugas_lain + +
        pengembangan_diri + + karya_ilmiah + + karya_inovatif;
        var total2 = + sekolah2 + + pra_jabatan2 + + prose_pembelajaran2 + + proses_bimbingan2 + + tugas_lain2 + +
        pengembangan_diri2 + + karya_ilmiah2 + + karya_inovatif2;
        document.getElementById("jml_utama").innerHTML = total;
        document.getElementById("jml_utama2").innerHTML = total2;
        document.getElementById("jml_sekolah").innerHTML = + sekolah + + sekolah2;
        document.getElementById("jml_pra_jabatan").innerHTML = + pra_jabatan + + pra_jabatan2;
        document.getElementById("jml_prose_pembelajaran").innerHTML = + prose_pembelajaran + + prose_pembelajaran2;
        document.getElementById("jml_proses_bimbingan").innerHTML = + proses_bimbingan + + proses_bimbingan2;
        document.getElementById("jml_tugas_lain").innerHTML = + tugas_lain + + tugas_lain2;
        document.getElementById("jml_pengembangan_diri").innerHTML = + pengembangan_diri + + pengembangan_diri2;
        document.getElementById("jml_karya_ilmiah").innerHTML = + karya_ilmiah + + karya_ilmiah2;
        document.getElementById("jml_karya_inovatif").innerHTML = + karya_inovatif + + karya_inovatif2;
    }

    function jml_penunjang() {
        var ijazah_tidak_sesuai = document.getElementById("ijazah_tidak_sesuai").value;
        var ijazah_tidak_sesuai2 = document.getElementById("ijazah_tidak_sesuai2").value;
        var pendukung_tugas_guru = document.getElementById("pendukung_tugas_guru").value;
        var pendukung_tugas_guru2 = document.getElementById("pendukung_tugas_guru2").value;
        var penghargaan = document.getElementById("penghargaan").value;
        var penghargaan2 = document.getElementById("penghargaan2").value;

        var total = +ijazah_tidak_sesuai + +pendukung_tugas_guru + +penghargaan;
        var total2 = +ijazah_tidak_sesuai2 + +pendukung_tugas_guru2 + +penghargaan2;
        document.getElementById("jml_penunjang").innerHTML = total;
        document.getElementById("jml_penunjang2").innerHTML = total2;
        document.getElementById("jml_penunjang3").innerHTML = total2 + + total;
        document.getElementById("jml_ijazah_tidak_sesuai").innerHTML = + ijazah_tidak_sesuai + + ijazah_tidak_sesuai2;
        document.getElementById("jml_pendukung_tugas_guru").innerHTML = + pendukung_tugas_guru + + pendukung_tugas_guru2;
        document.getElementById("jml_penghargaan").innerHTML = + penghargaan + + penghargaan2;
    }


    function jml_semua() {
        var sekolah = document.getElementById("sekolah").value;
        var pra_jabatan = document.getElementById("pra_jabatan").value;
        var prose_pembelajaran = document.getElementById("prose_pembelajaran").value;
        var proses_bimbingan = document.getElementById("proses_bimbingan").value;
        var tugas_lain = document.getElementById("tugas_lain").value;
        var pengembangan_diri = document.getElementById("pengembangan_diri").value;
        var karya_ilmiah = document.getElementById("karya_ilmiah").value;
        var karya_inovatif = document.getElementById("karya_inovatif").value;
        var total_utama = + sekolah + + pra_jabatan + + prose_pembelajaran + + proses_bimbingan + + tugas_lain + +
        pengembangan_diri + + karya_ilmiah + + karya_inovatif;

        var sekolah2 = document.getElementById("sekolah2").value;
        var pra_jabatan2 = document.getElementById("pra_jabatan2").value;
        var prose_pembelajaran2 = document.getElementById("prose_pembelajaran2").value;
        var proses_bimbingan2 = document.getElementById("proses_bimbingan2").value;
        var tugas_lain2 = document.getElementById("tugas_lain2").value;
        var pengembangan_diri2 = document.getElementById("pengembangan_diri2").value;
        var karya_ilmiah2 = document.getElementById("karya_ilmiah2").value;
        var karya_inovatif2 = document.getElementById("karya_inovatif2").value;
        var total_utama2 = + sekolah2 + + pra_jabatan2 + + prose_pembelajaran2 + + proses_bimbingan2 + + tugas_lain2 + +
        pengembangan_diri2 + + karya_ilmiah2 + + karya_inovatif2;


        var ijazah_tidak_sesuai = document.getElementById("ijazah_tidak_sesuai").value;
        var pendukung_tugas_guru = document.getElementById("pendukung_tugas_guru").value;
        var penghargaan = document.getElementById("penghargaan").value;

        var total_penunjang = +ijazah_tidak_sesuai + +pendukung_tugas_guru + +penghargaan;


        var ijazah_tidak_sesuai2 = document.getElementById("ijazah_tidak_sesuai2").value;
        var pendukung_tugas_guru2 = document.getElementById("pendukung_tugas_guru2").value;
        var penghargaan2 = document.getElementById("penghargaan2").value;

        var total_penunjang2 = +ijazah_tidak_sesuai2 + +pendukung_tugas_guru2 + +penghargaan2;



        document.getElementById("jml_semua").innerHTML = total_utama + + total_penunjang;
        document.getElementById("jml_semua2").innerHTML = total_utama2 + + total_penunjang2;
        document.getElementById("jml_semua3").innerHTML = total_utama2 + + total_penunjang2 + + total_utama + + total_penunjang;
    }


    </script>
@endpush
