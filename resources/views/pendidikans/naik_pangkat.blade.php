@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            {{-- <h2>Tambah DUPAK</h2> --}}
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
      <div class="card-body">
        <table class="table table-bordered" >
            <tbody>
                <tr>
                    <td scope="col" colspan="{{$no+6}}" class="text-center font-weight-bolder">
                        <h1>Rekapitulasi Usulan</h1>
                    </td>
                </tr>
                <tr style="font-weight: 900;font-size: 20px;text-align:center">
                    <td scope="col" colspan="4">Unsur / Sub Unsur</td>
                        <td scope="col" width="10%">PAK Terakhir</td>
                    @foreach ($pak as $item)
                        <td scope="col" width="10%">{{tahun_aja($item->awal)}}</td>
                    @endforeach
                    <td scope="col" width="10%">Total</td>
                </tr>
                <tr>
                    <td scope="col" rowspan="13" width="%" style="vertical-align: top;">1</td>
                    <td scope="col" colspan="3">Unsur Utama</td>
                    <td scope="col">  </td>
                    @foreach ($pak as $item)
                    <td scope="col">
                    </td>
                    @endforeach
                    <td scope="col" colspan="3"></td>
                </tr>

                {{-- Pendidikan --}}
                <tr>
                    <td scope="col" rowspan="3" width="2%" style="vertical-align: top;">A</td>
                    <td scope="col" colspan="2">Pendidikan</td>
                    <td scope="col"></td>
                    @foreach ($pak as $item)
                    <td scope="col"></td>
                    @endforeach
                    <td scope="col"></td>
                </tr>
                <tr>
                    <td scope="col" width="2%">1</td>
                    <td scope="col">Pendidikan Sekolah</td>
                    <td scope="col">
                        <span>
                            {{$pak_first->pendidikan_sekolah}}
                        </span>
                    </td>
                    @foreach ($pak as $item)
                    @php $sum_pendidikan1 += sum_pendidikan1($item->id); @endphp
                    <td scope="col">
                        <span>
                            {{sum_pendidikan1($item->id)}}
                        </span>
                    </td>
                    @endforeach
                    <td scope="col">
                        <span>
                            {{ number_format($pak_first->pendidikan_sekolah + $sum_pendidikan1,3) }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td scope="col">2</td>
                    <td scope="col">Pelatihan Prajabatan</td>
                    <td scope="col">
                        <span>
                            {{$pak_first->pelatihan_prajabatan}}
                        </span>
                    </td>
                    @foreach ($pak as $item)
                    @php $sum_prajab += sum_prajab($item->id); @endphp
                    <td scope="col">
                        <span>
                            {{sum_prajab($item->id)}}
                        </span>
                    </td>
                    @endforeach
                    <td scope="col">
                        <span>
                            {{ number_format($pak_first->pelatihan_prajabatan + $sum_prajab,3)}}
                        </span>
                    </td>
                    </tr>
                {{-- Pembelajaran / Bimbingan dan Tugas Tertentu --}}
                <tr>
                    <td scope="col" rowspan="4" width="2%" style="vertical-align: top;"> B</td>
                    <td scope="col" colspan="2">Pembelajaran / Bimbingan dan Tugas Tertentu</td>
                    <td scope="col"></td>
                    @foreach ($pak as $item)
                    <td scope="col"></td>
                    @endforeach
                    <td scope="col"></td>
                </tr>
                <tr>
                    <td scope="col" width="2%">1</td>
                    <td scope="col">Proses Pembelajaran</td>
                    <td scope="col">
                        <span>
                            {{$pak_first->proses_pembelajaran}}
                        </span>
                    </td>
                    @foreach ($pak as $item)
                    @php $proses_pembelajaran += proses_pembelajaran($item->id); @endphp
                    <td scope="col">
                        <span>
                            {{proses_pembelajaran($item->id)}}
                        </span>
                    </td>
                    @endforeach
                    <td scope="col">
                        <span>
                            {{ number_format($pak_first->proses_pembelajaran + $proses_pembelajaran,3)}}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td scope="col">2</td>
                    <td scope="col">Proses Bimbingan</td>
                    <td scope="col">
                        <span>
                            {{$pak_first->proses_bimbingan}}
                        </span>
                    </td>
                    @foreach ($pak as $item)
                    @php $proses_bimbingan += proses_bimbingan($item->id); @endphp
                    <td scope="col">
                        <span>
                            {{proses_bimbingan($item->id)}}
                        </span>
                    </td>
                    @endforeach
                    <td scope="col">
                        <span>
                            {{ number_format($pak_first->proses_bimbingan + $proses_bimbingan,3)}}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td scope="col">3</td>
                    <td scope="col">Tugas Lainya</td>
                    <td scope="col">
                        <span>
                            {{$pak_first->tugas_lain}}
                        </span>
                    </td>
                    @foreach ($pak as $item)
                    @php $tugas_lain += tugas_lain($item->id); @endphp
                    <td scope="col">
                        <span>
                            {{tugas_lain($item->id)}}
                        </span>
                    </td>
                    @endforeach
                    <td scope="col">
                        <span>
                            {{ number_format($pak_first->tugas_lain + $tugas_lain,3)}}
                        </span>
                    </td>
                </tr>

                {{-- Pengembangan Keprofesian Bekelanjutan --}}
                <tr>
                    <td scope="col" rowspan="4" width="2%" style="vertical-align: top;"> C</td>
                    <td scope="col" colspan="2">Pengembangan Keprofesian Bekelanjutan</td>
                    <td scope="col"></td>
                    @foreach ($pak as $item)
                    <td scope="col"></td>
                    @endforeach
                    <td scope="col"></td>
                </tr>
                <tr>
                    <td scope="col" width="2%">1</td>
                    <td scope="col">Pengembangan Diri</td>
                    <td scope="col">
                        <span>
                            {{$pak_first->pengembangan_diri}}
                        </span>
                    </td>
                    @foreach ($pak as $item)
                    @php $pengembangan_diri += pengembangan_diri($item->id); @endphp
                    <td scope="col">
                        <span>
                            {{pengembangan_diri($item->id)}}
                        </span>
                    </td>
                    @endforeach
                    <td scope="col">
                        <span>
                            {{ number_format($pak_first->pengembangan_diri + $pengembangan_diri,3)}}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td scope="col">2</td>
                    <td scope="col">Karya Ilmiah</td>
                    <td scope="col">
                        <span>
                            {{$pak_first->publikasi_ilmiah}}
                        </span>
                    </td>
                    @foreach ($pak as $item)
                    @php $karya_ilmiah += karya_ilmiah($item->id); @endphp
                    <td scope="col">
                        <span>
                            {{karya_ilmiah($item->id)}}
                        </span>
                    </td>
                    @endforeach
                    <td scope="col">
                        <span>
                            {{ number_format($pak_first->publikasi_ilmiah + $karya_ilmiah,3)}}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td scope="col">3</td>
                        <td scope="col">Karya Inovatif</td>
                        <td scope="col">
                            <span>
                                {{$pak_first->karya_inovatif}}
                            </span>
                        </td>
                        @foreach ($pak as $item)
                    @php $karya_inovatif += karya_inovatif($item->id); @endphp
                        <td scope="col">
                            <span>
                                {{karya_inovatif($item->id)}}
                            </span>
                        </td>
                        @endforeach
                        <td scope="col">
                            <span>
                                {{ number_format($pak_first->karya_inovatif + $karya_inovatif,3)}}
                            </span>
                        </td>
                </tr>


                <tr style="font-weight: 900;font-size: 20px;">
                    <td scope="col" colspan="3">Jumlah Unsur Utama</td>
                    <td scope="col">
                        <span id="jml_utama">
                            {{
                                number_format(
                                $pak_first->pendidikan_sekolah+
                                $pak_first->pelatihan_prajabatan+
                                $pak_first->proses_pembelajaran +
                                $pak_first->proses_bimbingan +
                                $pak_first->tugas_lain +
                                $pak_first->pengembangan_diri +
                                $pak_first->publikasi_ilmiah +
                                $pak_first->karya_inovatif,3)
                                }}
                        </span>
                    </td>
                    @foreach ($pak as $item)
                    <td scope="col">
                        <span id="jml_utama">
                            {{
                                number_format(
                                 karya_ilmiah($item->id) +  karya_inovatif($item->id) + sum_pendidikan1($item->id) + sum_prajab($item->id)+
                                proses_pembelajaran($item->id) + proses_bimbingan($item->id) + tugas_lain($item->id) + pengembangan_diri($item->id)
                                ,3)
                            }}
                        </span>
                    </td>
                    @endforeach
                    <td scope="col">
                        <span id="jml_utama">
                            {{
                                 $ak_utama = number_format(
                                $pak_first->pendidikan_sekolah+
                                $pak_first->pelatihan_prajabatan+
                                $pak_first->proses_pembelajaran +
                                $pak_first->proses_bimbingan +
                                $pak_first->tugas_lain +
                                $pak_first->pengembangan_diri +
                                $pak_first->publikasi_ilmiah +
                                $pak_first->karya_inovatif +

                                $karya_ilmiah +  $karya_inovatif + $sum_pendidikan1 + $sum_prajab+ $proses_pembelajaran +
                                 $proses_bimbingan + $tugas_lain + $pengembangan_diri
                                 ,3)
                                }}
                        </span>
                    </td>
                </tr>

                {{-- Unsur Penunjang --}}
                <tr>
                    <td scope="col" rowspan="5" width="2%" style="vertical-align: top;">2</td>
                    <td scope="col" colspan="3">Unsur Penunjang</td>
                    <td scope="col"> </td>
                    @foreach ($pak as $item)
                    <td scope="col">
                        {{-- <input type="number" disabled  id="" oninput="jml_utama()" value=" --}}
                    </td>
                    @endforeach
                    <td scope="col"> </td>
                </tr>

                <tr>
                    <td scope="col width="2%">A</td>
                    <td scope="col" colspan="2">Ijazah Tidak Sesuai</td>
                    <td scope="col">
                        <span>
                            {{$pak_first->ijazah_tidak_sesuai}}
                        </span>
                    </td>
                    @foreach ($pak as $item)
                    @php $ijazah_tidak_sesuai += ijazah_tidak_sesuai($item->id); @endphp
                    <td scope="col">
                        <span>
                            {{ijazah_tidak_sesuai($item->id)}}
                        </span>
                    </td>
                    @endforeach
                    <td scope="col">
                        <span>
                            {{ number_format($pak_first->ijazah_tidak_sesuai + $ijazah_tidak_sesuai,3)}}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td scope="col width="2%">C</td>
                    <td scope="col" colspan="2">Pendukung Tugas Guru</td>
                    <td scope="col">
                        <span>
                            {{$pak_first->pendukung_tugas_guru}}
                        </span>
                    </td>
                    @foreach ($pak as $item)
                    @php $pendukung_tugas_guru += pendukung_tugas_guru($item->id); @endphp
                    <td scope="col">
                        <span>
                            {{pendukung_tugas_guru($item->id)}}
                        </span>
                    </td>
                    @endforeach
                    <td scope="col">
                        <span>
                            {{ number_format($pak_first->pendukung_tugas_guru + $pendukung_tugas_guru,3)}}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td scope="col width="2%">B</td>
                    <td scope="col" colspan="2">Memperoleh Penghargaan</td>
                    <td scope="col">
                        <span>
                            {{$pak_first->memperoleh_penghargaan}}
                        </span>
                    </td>
                    @foreach ($pak as $item)
                    @php $memperoleh_penghargaan += memperoleh_penghargaan($item->id); @endphp
                    <td scope="col">
                        <span>
                            {{memperoleh_penghargaan($item->id)}}
                        </span>
                    </td>
                    @endforeach
                    <td scope="col">
                        <span>
                            {{ number_format($pak_first->memperoleh_penghargaan + $memperoleh_penghargaan,3)}}
                        </span>
                    </td>
                </tr>
                <tr style="font-weight: 900;font-size: 20px;">
                    <td scope="col" colspan="3">Jumlah Unsur Penunjang</td>
                    <td scope="col">
                        <span id="jml_penunjang">
                        {{
                            number_format(
                            $pak_first->ijazah_tidak_sesuai+
                                $pak_first->pendukung_tugas_guru+
                                $pak_first->memperoleh_penghargaan
                                ,3)
                        }}
                        </span></h4>
                    </td>
                    @foreach ($pak as $item)
                    <td scope="col">
                        <span id="jml_penunjang">
                            {{
                                number_format(
                                ijazah_tidak_sesuai($item->id)+
                                pendukung_tugas_guru($item->id)+
                                memperoleh_penghargaan($item->id)
                                ,3)
                            }}
                        </span>
                    </td>
                    @endforeach
                    <td scope="col">
                        <span id="jml_penunjang">
                        {{
                             $ak_penunjang = number_format(
                            $pak_first->ijazah_tidak_sesuai+
                                $pak_first->pendukung_tugas_guru+
                                $pak_first->memperoleh_penghargaan +

                                $ijazah_tidak_sesuai+
                                $pendukung_tugas_guru+
                                $memperoleh_penghargaan
                                ,3)
                        }}
                        </span>
                    </td>
                </tr>
                <tr style="font-weight: 900;font-size: 20px;">
                    <td scope="col" colspan="4">Jumlah Unsur Utama & Penunjang</td>
                    <td scope="col">
                        <span id="jml_semua">
                            {{
                                number_format(
                                ($pak_first->ijazah_tidak_sesuai+
                                $pak_first->pendukung_tugas_guru+
                                $pak_first->memperoleh_penghargaan+

                                $pak_first->pendidikan_sekolah+
                                $pak_first->pelatihan_prajabatan+
                                $pak_first->proses_pembelajaran +
                                $pak_first->proses_bimbingan +
                                $pak_first->tugas_lain +
                                $pak_first->pengembangan_diri +
                                $pak_first->publikasi_ilmiah +
                                $pak_first->karya_inovatif)
                                ,3)
                                }}
                        </span>
                    </td>
                    @foreach ($pak as $item)
                    <td scope="col" style="font-weight: 900">
                        <span id="jml_semua">
                            {{
                                number_format(
                                ijazah_tidak_sesuai($item->id)+
                                pendukung_tugas_guru($item->id)+
                                memperoleh_penghargaan($item->id)+karya_ilmiah($item->id) +  karya_inovatif($item->id) + sum_pendidikan1($item->id) + sum_prajab($item->id)+
                                proses_pembelajaran($item->id) + proses_bimbingan($item->id) + tugas_lain($item->id) + pengembangan_diri($item->id)
                                ,3)
                            }}
                        </span>
                    </td>
                    @endforeach
                    <td scope="col">
                        <span>
                            {{

                                $ak_peroleh = number_format(
                                    ($pak_first->pendidikan_sekolah+
                                $pak_first->pelatihan_prajabatan+
                                $pak_first->proses_pembelajaran +
                                $pak_first->proses_bimbingan +
                                $pak_first->tugas_lain +
                                $pak_first->pengembangan_diri +
                                $pak_first->publikasi_ilmiah +
                                $pak_first->karya_inovatif) +

                                ($karya_ilmiah +  $karya_inovatif + $sum_pendidikan1 + $sum_prajab+ $proses_pembelajaran +
                                 $proses_bimbingan + $tugas_lain + $pengembangan_diri) +

                                 $pak_first->ijazah_tidak_sesuai+
                                    $pak_first->pendukung_tugas_guru+
                                    $pak_first->memperoleh_penghargaan +

                                    $ijazah_tidak_sesuai+
                                    $pendukung_tugas_guru+
                                    $memperoleh_penghargaan
                                    ,3)
                            }}
                            </span>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered" >
            <tbody>
                <tr>
                    <td scope="col" colspan="8" class="text-center font-weight-bolder">
                        <h1>Rekapitulasi Perhitungan Naik Pangkat</h1>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2">Uraian</td>
                    <td rowspan="2">Angka Kredit Komulatif</td>
                    <td colspan="3">Unsur Utama</td>
                    <td rowspan="2">Unsur Penunjang Maksimal 10%</td>
                </tr>
                <tr>
                    <td>PD</td>
                    <td>PI/KI</td>
                    <td>Unsur Utama Minimanl 90%</td>
                </tr>
                <tr>
                    <td>AK Yang Di Peroleh</td>
                    <td>{{$ak_peroleh}}</td>
                    <td>{{$pak_first->pengembangan_diri + $pengembangan_diri}}</td>
                    <td>{{$pak_first->publikasi_ilmiah + $pak_first->karya_inovatif +$karya_ilmiah +  $karya_inovatif }}</td>
                    <td>{{$ak_utama}}</td>
                    <td>{{$ak_penunjang}}</td>
                </tr>
                <tr>
                    <td>AK Yang Wajib Peroleh</td>
                    <td>{{ $jabatan->target }}</td>
                    <td>{{ $jabatan->akpkbpd }}</td>
                    <td>{{ $jabatan->akpkbpiki }}</td>
                    <td>{{ $jabatan->akk }}</td>
                    <td>{{ $jabatan->akp }}</td>
                </tr>
                <tr>
                    <td>Kelebihan/Kekurangan</td>
                    @php $jml_1 = $ak_peroleh - $jabatan->target; @endphp
                    <td style="{{ $jml_1 <= 0 ? 'color: red;' : ''  }}">{{ $jml_1 }}</td>
                    @php $jml_2 = ($pak_first->pengembangan_diri + $pengembangan_diri) - $jabatan->akpkbpd; @endphp
                    <td style="{{ $jml_2<=0 ? 'color: red;' : ''  }}">{{ $jml_2 }}</td>
                    @php $jml_3 = ($pak_first->publikasi_ilmiah + $pak_first->karya_inovatif +$karya_ilmiah +  $karya_inovatif) - $jabatan->akpkbpiki; @endphp
                    <td style="{{ $jml_3<=0 ? 'color: red;' : ''  }}">{{ $jml_3 }}</td>
                    @php $jml_4 = $ak_utama - $jabatan->akk; @endphp
                    <td style="{{ $jml_4<=0 ? 'color: red;' : ''  }}">{{ $jml_4 }}</td>
                    @php $jml_5 = $ak_penunjang - $jabatan->akp; @endphp
                    <td style="{{ $jml_5>=0 ? 'color: red;' : ''  }}">{{ $jml_5 }}</td>
                </tr>
            </tbody>
        </table>
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

@endpush
