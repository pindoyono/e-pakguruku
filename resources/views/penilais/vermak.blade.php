@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Pengguna</h2>
        </div>

    </div>
</div>

<div class="col-md-12">
    <div class="card ">
      <div class="card-header card-header-rose card-header-text">
        <div class="card-text">
          <h4 class="card-title">
            <span class="material-icons md-72">
                post_add
                </span>
          </h4>
        </div>
        </div>
        <div class="col-sm-12">
            <div class="pull-right">
                <a class="btn btn-sm btn-primary" href="{{ route('users.index') }}">
                    <span class="btn-label">
                        <i class="material-icons">reply</i>
                    </span>
                    Kembali
                    <div class="ripple-container"></div>
                </a>
            </div>
        </div>
      <div class="card-body">
        {{-- {!! Form::file(array('route' => 'users.store','method'=>'POST')) !!} --}}
        <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('users.store')}}" method="POST">

            @csrf



            <table class="table table-bordered" >
                <thead>
                <tbody>
                    <tr>
                        <td  colspan=4 style="font-size:9; text-align:left" width="100px">
                            Instansi : Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Utara
                        </td>
                        <td colspan=4 style="font-size:9;text-align:right" width="100px">
                            Masa Penilaian : das.' s/d '.dasd
                        </td>
                        </tr>
                        <tr>
                            <td width ="3%">I</td>
                            <td colspan=7 class="text-left"> KETERANGAN PERORANGAN</td>
                        </tr>
                        <tr>
                            <td rowspan=14></td>
                            <td width ="3%" > 1</td>
                            <td colspan=2>Nama</td>
                            <td colspan=4>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td> 2</td>
                            <td colspan=2>NIP</td>
                            <td colspan=4>
                                <input type="text" name="username" value="{{$user->username}}" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td> 3</td>
                            <td colspan=2>NUPTK</td>
                            <td colspan=4>
                                <input type="text" name="nuptk" value="{{$user->nuptk}}" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td> 4</td>
                            <td colspan=2>Tempat, Tanggal Lahir</td>
                            <td colspan=4>
                                <input type="text" name="tmp_lahir" value="{{$user->tempat_lahir.','.tgl_indo($user->tanggal_lahir)}}" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td> 5</td>
                            <td colspan=2>Jenis Kelamin</td>
                            <td colspan=4>
                                <input type="text" name="jenis_kelamin" value="{{$user->jenis_kelamin}}" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td> 6</td>
                            <td colspan=2 >Pendidikan yang telah diperhitungkan angka kreditnya</td>
                            {{-- <td colspan=2 style="font-size:9;">Pendidikan yang telah diperhitungkan angka kreditnya</td> --}}
                            <td colspan=4>
                                <input type="text" name="pendidikan" value="{{$user->pendidikan}}" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td> 7</td>
                            <td colspan=2>Pangkat / Golongan ruang / TMT</td>
                            <td colspan=4>
                                <input type="text" name="pangkat" value="{{ get_jabatan($user->pangkat_golongan)->pangkat }}" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td> 8</td>
                            <td colspan=2>Jabatan Guru / TMT</td>
                            <td colspan=4>
                                <input type="text" name="jabatan" value="{{ get_jabatan($user->pangkat_golongan)->jabatan }}" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td rowspan=2> 9</td>
                            <td rowspan=2>Masa Kerja Golongan</td>
                            <td>Lama</td>
                            <td colspan=4>
                                <input type="text" name="lama" value="{{ masa_kerja(\Carbon\Carbon::parse($user->tmt_pns), $user->tmt_cpns) }}" class="form-control">
                            </td>d
                        </tr>
                        <tr>
                            <td>Baru</td>
                            <td colspan=4>
                                <input type="text" name="baru" value="{{
                                         \Carbon\Carbon::parse(now())->format('m')<=4?
                                        masa_kerja(\Carbon\Carbon::parse( date("Y")."-04-01" ), $user->tmt_cpns)
                                        :
                                        masa_kerja(\Carbon\Carbon::parse( date("Y")."-10-01" ), $user->tmt_cpns)
                                    }}" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td> 10</td>
                            <td colspan=2>Jenis Guru </td>
                            <td colspan=4>
                                <input type="text" name="jenis_guru" value="{{ $user->jenis_guru }}" class="form-control">

                            </td>
                        </tr>
                        <tr>
                            <td> 11</td>
                            <td colspan=2>Unit Kerja </td>
                            <td colspan=4>
                                <input type="text" name="jenis_guru" value="{{ $user->sekolah }}" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td rowspan=2> 12</td>
                            <td rowspan=2>Alamat</td>
                            <td>Sekolah</td>
                            <td colspan=4 style="font-size:9;">
                                <input type="text" name="jenis_guru" value="{{ $user->alamat_sekolah }}" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>Rumah</td>
                            <td colspan=4 >
                                <input type="text" name="jenis_guru" value="{{ $user->alamat_rumah }}" class="form-control">
                            </td>
                        </tr>


                    <tr>
                        <td scope="col" colspan="7" class="text-center font-weight-bolder" width="100px">
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
                            <input type="number" step="any" name="tertinggal" id="tertinggal" oninput="jml_utama();jml_semua();" value="" class="form-control">
                        </td>
                        <td scope="col">
                            <input type="number" step="any" name="tertinggal2" id="tertinggal2" oninput="jml_utama();jml_semua();"  value="" class="form-control">
                        </td>
                        <td scope="col">
                            <span id="jml_tertinggal">
                                0
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
                            <input type="number" step="any" name="pendidikan_sekolah" id="sekolah" oninput="jml_utama();jml_semua();" value="" class="form-control">
                        </td>
                        <td scope="col">
                            <input type="number" step="any" name="pendidikan_sekolah2" id="sekolah2" oninput="jml_utama();jml_semua();"  value="" class="form-control">
                        </td>
                        <td scope="col">
                            <span id="jml_sekolah">
                                0
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">2</td>
                        <td scope="col">Pelatihan Prajabatan</td>
                        <td scope="col">
                            <input type="number" step="any" name="pelatihan_prajabatan" id="pra_jabatan" oninput="jml_utama();jml_semua();" value=""  class="form-control">
                        </td>
                        <td scope="col">
                            <input type="number" step="any" name="pelatihan_prajabatan2" id="pra_jabatan2" oninput="jml_utama();jml_semua();" value=""  class="form-control">
                        </td>
                        <td scope="col">
                            <span id="jml_pra_jabatan">
                                0
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
                            <input type="number" step="any" name="proses_pembelajaran" id="prose_pembelajaran" oninput="jml_utama();jml_semua();" value="" class="form-control">
                        </td>
                        <td scope="col">
                            <input type="number" step="any" name="proses_pembelajaran2" id="prose_pembelajaran2" oninput="jml_utama();jml_semua();" value="" class="form-control">
                        </td>
                        <td scope="col">
                            <span id="jml_prose_pembelajaran">
                                0
                            </span>
                        </td>

                    </tr>
                    <tr>
                        <td scope="col">2</td>
                        <td scope="col">Proses Bimbingan</td>
                        <td scope="col">
                            <input type="number" step="any" name="proses_bimbingan" id="proses_bimbingan" oninput="jml_utama();jml_semua();" value="" class="form-control">
                        </td>
                        <td scope="col">
                            <input type="number" step="any" name="proses_bimbingan2" id="proses_bimbingan2" oninput="jml_utama();jml_semua();" value="" class="form-control">
                        </td>
                        <td scope="col">
                            <span id="jml_proses_bimbingan">
                               0
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">3</td>
                        <td scope="col">Tugas Lainya</td>
                        <td scope="col">
                            <input type="number" step="any" name="tugas_lain" id="tugas_lain" oninput="jml_utama();jml_semua();" value="" class="form-control">
                        </td>
                        <td scope="col">
                            <input type="number" step="any" name="tugas_lain2" id="tugas_lain2" oninput="jml_utama();jml_semua();" value="" class="form-control">
                        </td>
                        <td scope="col">
                            <span id="jml_tugas_lain">
                                0
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
                            <input type="number" step="any" name="pengembangan_diri"  id="pengembangan_diri" oninput="jml_utama();jml_semua();" value="" class="form-control">
                        </td>
                        <td scope="col">
                            <input type="number" step="any" name="pengembangan_diri2" id="pengembangan_diri2" oninput="jml_utama();jml_semua();" value="" class="form-control">
                        </td>
                        <td scope="col">
                            <span id="jml_pengembangan_diri">
                                0
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">2</td>
                        <td scope="col">Publikasi Ilmiah</td>
                        <td scope="col">
                            <input type="number" step="any" name="publikasi_ilmiah" id="karya_ilmiah" oninput="jml_utama();jml_semua();" value="" class="form-control">
                        </td>
                        <td scope="col">
                            <input type="number" step="any" name="publikasi_ilmiah2" id="karya_ilmiah2" oninput="jml_utama();jml_semua();" value="" class="form-control">
                        </td>
                        <td scope="col">
                            <span id="jml_karya_ilmiah">
                                0
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col">3</td>
                            <td scope="col">Karya Inovatif</td>
                        <td scope="col">
                            <input type="number" step="any" name="karya_inovatif" id="karya_inovatif" oninput="jml_utama();jml_semua();" value="" class="form-control">
                        </td>
                        <td scope="col">
                            <input type="number" step="any" name="karya_inovatif2" id="karya_inovatif2" oninput="jml_utama();jml_semua();" value="" class="form-control">
                        </td>
                        <td scope="col">
                            <span id="jml_karya_inovatif">
                               0
                            </span>
                        </td>
                    </tr>


                    <tr>
                        <td scope="col" colspan="3">Jumlah Unsur Utama</td>
                        <td scope="col">
                            <span id="jml_utama">
                                0
                            </span>
                        </td>
                        <td scope="col">
                            <span id="jml_utama2">
                                0
                            </span>
                        </td>
                        <td scope="col">
                            <span id="jml_utama3">
                               0
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
                            <input type="number" step="any" name="ijazah_tidak_sesuai" id="ijazah_tidak_sesuai" oninput="jml_penunjang();jml_semua();" value="" class="form-control">
                        </td>
                        <td scope="col">
                            <input type="number" step="any" name="ijazah_tidak_sesuai2" id="ijazah_tidak_sesuai2" oninput="jml_penunjang();jml_semua();" value="" class="form-control">
                        </td>
                        <td scope="col">
                            <span id="jml_ijazah_tidak_sesuai">
                             0
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col width="2%">C</td>
                        <td scope="col" colspan="2">Pendukung Tugas Guru</td>
                        <td scope="col">
                            <input type="number" step="any" name="pendukung_tugas_guru" id="pendukung_tugas_guru" oninput="jml_penunjang();jml_semua();" value="" class="form-control">
                        </td>
                        <td scope="col">
                            <input type="number" step="any" name="pendukung_tugas_guru2" id="pendukung_tugas_guru2" oninput="jml_penunjang();jml_semua();" value="" class="form-control">
                        </td>
                        <td scope="col">
                            <span id="jml_pendukung_tugas_guru">
                                0
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col width="2%">B</td>
                        <td scope="col" colspan="2">Memperoleh Penghargaan</td>
                        <td scope="col">
                            <input type="number" step="any" name="memperoleh_penghargaan" id="penghargaan" oninput="jml_penunjang();jml_semua();" value="" class="form-control">
                        </td>
                        <td scope="col">
                            <input type="number" step="any" name="memperoleh_penghargaan2" id="penghargaan2" oninput="jml_penunjang();jml_semua();" value="" class="form-control">
                        </td>
                        <td scope="col">
                            <span id="jml_penghargaan">
                                0
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col" colspan="3">Jumlah Unsur Penunjang</td>
                        <td scope="col">
                            <span id="jml_penunjang">
                                0
                            </span>
                        </td>
                        <td scope="col">
                            <span id="jml_penunjang2">
                                0
                            </span>
                        </td>
                        <td scope="col">
                            <span id="jml_penunjang3">
                             0
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col" colspan="4">Jumlah Unsur Utama & Penunjang</td>
                        <td scope="col">
                            <span id="jml_semua">
                               0
                            </span>
                        </td>
                        <td scope="col">
                            <span id="jml_semua2">
                                0
                            </span>
                        </td>
                        <td scope="col">
                            <span id="jml_semua3">
                               0
                            </span>
                        </td>
                    </tr>
                </tbody>
              </table>
            </table>

            <button type="submit" class="btn btn-success">
                <span class="btn-label">
                  <i class="material-icons">print</i>
                </span>
                Cetak
                <div class="ripple-container"></div>
            </button>
        {!! Form::close() !!}
      </div>
    </div>
  </div>

@endsection



@push('body-scripts')

<script src="{{asset('assets/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/bootstrap-tagsinput.js"></scrip')}}"></script>

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

<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
              icons: {
                  time: "fa fa-clock-o",
                  date: "fa fa-calendar",
                  up: "fa fa-arrow-up",
                  down: "fa fa-arrow-down"
              },
              format: 'D-M-Y'
          });
          $('#datetimepickertmt').datetimepicker({
              icons: {
                  time: "fa fa-clock-o",
                  date: "fa fa-calendar",
                  up: "fa fa-arrow-up",
                  down: "fa fa-arrow-down"
              },
              format: 'D-M-Y'
          });
          $('#datetimepickercp').datetimepicker({
              icons: {
                  time: "fa fa-clock-o",
                  date: "fa fa-calendar",
                  up: "fa fa-arrow-up",
                  down: "fa fa-arrow-down"
              },
              format: 'D-M-Y'
          });
          $('#datetimepickerjabatan').datetimepicker({
              icons: {
                  time: "fa fa-clock-o",
                  date: "fa fa-calendar",
                  up: "fa fa-arrow-up",
                  down: "fa fa-arrow-down"
              },
              format: 'D-M-Y'
          });
    });
 </script>
<script>
    $(document).ready(function() {
      // initialise Datetimepicker and Sliders
    //   md.initFormExtendedDatetimepickers();
      if ($('.slider').length != 0) {
        md.initSliders();
      }
    });
  </script>
@endpush
