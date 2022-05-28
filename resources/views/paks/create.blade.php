@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            {{-- <h2>Perkiraan Perhitungan Naik Pangkat</h2> --}}
        </div>

    </div>
</div>

<div class="col-md-12">
    <div class="card ">
      <div class="card-header card-header-rose card-header-text">
        <div class="card-text">
          <h4 class="card-title">
            <span class="material-icons md-72">
                trending_up
                </span>
          </h4>
        </div>
        </div>
        <div class="col-sm-12">
            <div class="pull-right">
                <a class="btn btn-sm btn-primary" href="{{ route('paks.index') }}">
                    <span class="btn-label">
                        <i class="material-icons">reply</i>
                    </span>
                    Kembali
                    <div class="ripple-container"></div>
                </a>
            </div>
        </div>
      <div class="card-body">

        <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('paks.store')}}" method="POST">
            @csrf
        <div class="row">
            <label class="col-sm-3 col-form-label">Periode Penilaian</label>
            <div class="col-md-2">
                <input name="awal" type="text" class="form-control" id='datetimepicker1'>
            </div>
            <div class="col-md-1">
                S/D
            </div>
            <div class="col-md-2">
                <input name="akhir" type="text" class="form-control" id='datetimepicker2'>
            </div>
        </div>
        <br>
        <div class="row">
            <label class="col-sm-3 col-form-label">Surat Pengantar Dari Sekolah</label>
            <div class="col-md-2">
                <input type="file" name="surat_pengantar" class="form-control" placeholder=".col-md-3">
            </div>
            <div class="col-md-1">
            </div>
            <label class="col-sm-3 col-form-label">Surat Pernyataan Tidak Pernah Di Hukum Disiplin</label>
            <div class="col-md-2">
                <input type="file" name="tidak_dihukum" class="form-control" placeholder=".col-md-3">
            </div>
        </div>

        <div class="row">
            <label class="col-sm-3 col-form-label">DUPAK</label>
            <div class="col-md-2">
                <input type="file" name="dupak" class="form-control" placeholder=".col-md-3">
            </div>
            <div class="col-md-1">
            </div>
            <label class="col-sm-3 col-form-label">Surat Pernyataan Melaksanakan Pembelajaran</label>
            <div class="col-md-2">
                <input type="file" name="surat_pembelajaran" class="form-control" placeholder=".col-md-3">
            </div>
        </div>

        <div class="row">
            <label class="col-sm-3 col-form-label">Surat Pernyataan Melaksanakan Bimbingan/Tugas Tertentu</label>
            <div class="col-md-2">
                <input type="file" name="surat_bimbingan_tertentu" class="form-control" placeholder=".col-md-3">
            </div>
            <div class="col-md-1">
            </div>
            <label class="col-sm-3 col-form-label">Surat Pernyataan Melaksanakan Unsur Penunjang</label>
            <div class="col-md-2">
                <input type="file" name="surat_penunjang" class="form-control" placeholder=".col-md-3">
            </div>
        </div>

        <div class="row">
            <label class="col-sm-3 col-form-label">Surat Pernyataan Melaksanakan PKB</label>
            <div class="col-md-2">
                <input type="file" name="surat_pkb" class="form-control" placeholder=".col-md-3">
            </div>
            <div class="col-md-1">
            </div>
            <label class="col-sm-3 col-form-label">SK Pembagian Tugas Ganjil</label>
            <div class="col-md-2">
                <input type="file" name="sk_ganjil" class="form-control" placeholder=".col-md-3">
            </div>
        </div>

        <div class="row">
            <label class="col-sm-3 col-form-label">SK Pembagian Tugas Genap</label>
            <div class="col-md-2">
                <input type="file" name="sk_genap" class="form-control" placeholder=".col-md-3">
            </div>
            <div class="col-md-1">
            </div>
            <label class="col-sm-3 col-form-label"> P A K Terakhir</label>
            <div class="col-md-2">
                <input type="file" name="scan_pak" class="form-control" placeholder=".col-md-3">
            </div>
        </div>

        <div class="row">
            {{-- <label class="col-sm-3 col-form-label">Laporan / form PKG/PKKS</label>
            <div class="col-md-2">
                <input type="file" name="pkg" class="form-control" placeholder=".col-md-3">
            </div> --}}
            {{-- <div class="col-md-1">
            </div> --}}
            <label class="col-sm-3 col-form-label">SKP</label>
            <div class="col-md-2">
                <input type="file" name="skp" class="form-control" placeholder="">
            </div>
        </div>

        @if ($cek_pak == 0)


        <br>
        <div class="progress progress-line-info">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
              {{-- <span class="sr-only">60% Complete</span> --}}
            </div>
          </div>

        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Info - </b> Isi Form dibawah ini sesuai nilai pada PAK terakhir anda  </span>
          </div>

        <table class="table table-bordered" >
            <thead>
            <tbody>
                <tr>
                    <td scope="col" colspan="5" class="text-center font-weight-bolder">
                        <h1>Penetapan Angka Kredit</h1>
                    </td>
                </tr>
                <tr>
                    <td scope="col" colspan="4">Unsur / Sub Unsur</td>
                    <td scope="col" width="30%">Nilai</td>
                </tr>
                <tr>
                    <td scope="col" rowspan="13" width="2%" style="vertical-align: top;">1</td>
                    <td scope="col" colspan="3">Unsur Utama</td>
                    <td scope="col">
                        {{-- <input type="number" step="any"  id="" oninput="jml_utama()" value="" class="form-control"> --}}
                    </td>
                </tr>

                {{-- Pendidikan --}}
                <tr>
                    <td scope="col" rowspan="3" width="2%" style="vertical-align: top;">A</td>
                    <td scope="col" colspan="2">Pendidikan</td>
                    <td scope="col"></td>
                </tr>
                <tr>
                    <td scope="col" width="2%">1</td>
                    <td scope="col">Pendidikan Sekolah</td>
                    <td scope="col">
                        <input type="number" step="any" name="pendidikan_sekolah" id="sekolah" oninput="jml_utama();jml_semua();" value="0" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td scope="col">2</td>
                    <td scope="col">Pelatihan Prajabatan</td>
                    <td scope="col">
                        <input type="number" step="any" name="pelatihan_prajabatan" id="pra_jabatan" oninput="jml_utama();jml_semua();" value="0" class="form-control">
                    </td>
                </tr>
                {{-- Pembelajaran / Bimbingan dan Tugas Tertentu --}}
                <tr>
                    <td scope="col" rowspan="4" width="2%" style="vertical-align: top;"> B</td>
                    <td scope="col" colspan="2">Pembelajaran / Bimbingan dan Tugas Tertentu</td>
                    <td scope="col"></td>
                </tr>
                <tr>
                    <td scope="col" width="2%">1</td>
                    <td scope="col">Proses Pembelajaran</td>
                    <td scope="col">
                        <input type="number" step="any" name="proses_pembelajaran" id="prose_pembelajaran" oninput="jml_utama();jml_semua();" value="0" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td scope="col">2</td>
                    <td scope="col">Proses Bimbingan</td>
                    <td scope="col">
                        <input type="number" step="any" name="proses_bimbingan" id="proses_bimbingan" oninput="jml_utama();jml_semua();" value="0" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td scope="col">3</td>
                    <td scope="col">Tugas Lainya</td>
                    <td scope="col">
                        <input type="number" step="any" name="tugas_lain" id="tugas_lain" oninput="jml_utama();jml_semua();" value="0" class="form-control">
                    </td>
                </tr>

                {{-- Pengembangan Keprofesian Bekelanjutan --}}
                <tr>
                    <td scope="col" rowspan="4" width="2%" style="vertical-align: top;"> C</td>
                    <td scope="col" colspan="2">Pengembangan Keprofesian Bekelanjutan</td>
                    <td scope="col"></td>
                </tr>
                <tr>
                    <td scope="col" width="2%">1</td>
                    <td scope="col">Pengembangan Diri</td>
                    <td scope="col">
                        <input type="number" step="any" name="pengembangan_diri"  id="pengembangan_diri" oninput="jml_utama();jml_semua();" value="0" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td scope="col">2</td>
                    <td scope="col">Karya Ilmiah</td>
                    <td scope="col">
                        <input type="number" step="any" name="publikasi_ilmiah" id="karya_ilmiah" oninput="jml_utama();jml_semua();" value="0" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td scope="col">3</td>
                        <td scope="col">Karya Inovatif</td>
                    <td scope="col">
                        <input type="number" step="any" name="karya_inovatif" id="karya_inovatif" oninput="jml_utama();jml_semua();" value="0" class="form-control">
                    </td>
                </tr>


                <tr>
                    <td scope="col" colspan="3">Jumlah Unsur Utama</td>
                    <td scope="col">
                        <span id="jml_utama">
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
                </tr>

                <tr>
                    <td scope="col width="2%">A</td>
                    <td scope="col" colspan="2">Ijazah Tidak Sesuai</td>
                    <td scope="col">
                        <input type="number" step="any" name="ijazah_tidak_sesuai" id="ijazah_tidak_sesuai" oninput="jml_penunjang();jml_semua();" value="0" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td scope="col width="2%">C</td>
                    <td scope="col" colspan="2">Pendukung Tugas Guru</td>
                    <td scope="col">
                        <input type="number" step="any" name="pendukung_tugas_guru" id="pendukung_tugas_guru" oninput="jml_penunjang();jml_semua();" value="0" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td scope="col width="2%">B</td>
                    <td scope="col" colspan="2">Memperoleh Penghargaan</td>
                    <td scope="col">
                        <input type="number" step="any" name="memperoleh_penghargaan" id="penghargaan" oninput="jml_penunjang();jml_semua();" value="0" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td scope="col" colspan="3">Jumlah Unsur Penunjang</td>
                    <td scope="col">
                        <span id="jml_penunjang">0</span></h4>
                    </td>
                </tr>
                <tr>
                    <td scope="col" colspan="4">Jumlah Unsur Utama & Penunjang</td>
                    <td scope="col">
                        <span id="jml_semua">
                            0
                        </span>
                    </td>
                </tr>
            </tbody>
          </table>
        </table>
        @endif
        <button type="submit" class="btn btn-sm btn-success">
            <span class="btn-label">
              <i class="material-icons">check</i>
            </span>
            Simpan
            <div class="ripple-container"></div>
        </button>

        <a class="btn btn-sm btn-info" href="{{ route('paks.index') }}">
            <span class="btn-label">
              <i class="material-icons">reply</i>
            </span>
            Kembali
          <div class="ripple-container"></div>
        </a>

        {!! Form::close() !!}
      </div>
    </div>
  </div>

@endsection


@push('body-scripts')

<script src="{{asset('assets/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/bootstrap-tagsinput.js"></scrip')}}"></script>
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
          $('#datetimepicker2').datetimepicker({
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

  <script>
    function jml_utama() {
        var sekolah = document.getElementById("sekolah").value;
        var pra_jabatan = document.getElementById("pra_jabatan").value;
        var prose_pembelajaran = document.getElementById("prose_pembelajaran").value;
        var proses_bimbingan = document.getElementById("proses_bimbingan").value;
        var tugas_lain = document.getElementById("tugas_lain").value;
        var pengembangan_diri = document.getElementById("pengembangan_diri").value;
        var karya_ilmiah = document.getElementById("karya_ilmiah").value;
        var karya_inovatif = document.getElementById("karya_inovatif").value;
        var total = + sekolah + + pra_jabatan + + prose_pembelajaran + + proses_bimbingan + + tugas_lain + + pengembangan_diri + + karya_ilmiah + + karya_inovatif;
        document.getElementById("jml_utama").innerHTML = total;
    }

    function jml_penunjang() {
        var ijazah_tidak_sesuai = document.getElementById("ijazah_tidak_sesuai").value;
        var pendukung_tugas_guru = document.getElementById("pendukung_tugas_guru").value;
        var penghargaan = document.getElementById("penghargaan").value;

        var total = +ijazah_tidak_sesuai + +pendukung_tugas_guru + +penghargaan;
        document.getElementById("jml_penunjang").innerHTML = total;
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
        var total_utama = + sekolah + + pra_jabatan + + prose_pembelajaran + + proses_bimbingan + + tugas_lain + + pengembangan_diri + + karya_ilmiah + + karya_inovatif;


        var ijazah_tidak_sesuai = document.getElementById("ijazah_tidak_sesuai").value;
        var pendukung_tugas_guru = document.getElementById("pendukung_tugas_guru").value;
        var penghargaan = document.getElementById("penghargaan").value;

        var total_penunjang = +ijazah_tidak_sesuai + +pendukung_tugas_guru + +penghargaan;


        document.getElementById("jml_semua").innerHTML = total_utama + + total_penunjang;
    }
  </script>
@endpush
