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

        <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('users.update_pak',Auth::user()->id)}}" method="POST">
            @csrf
            <input type="hidden" value="PUT" name="_method">
      <div class="card-body">
        <div class="pull-left">
            STATUS USULAN :
            <span class="badge  badge-info">{{ Auth::user()->status_naik_pangkat }}</span>
            <h2>
            </h2>
        </div>
        <table class="table table-bordered" >
            <tbody>
                <tr>
                    <td scope="col" colspan="{{$no+7}}" class="text-center font-weight-bolder">
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
                    <td scope="col" width="10%">PAK Pangkat Terakhir</td>
                </tr>
                <tr>
                    <td scope="col" rowspan="13" width="%" style="vertical-align: top;">1</td>
                    <td scope="col" colspan="3">Unsur Utama</td>
                    <td scope="col"> {{$pak_first->tertinggal}} </td>
                    @foreach ($pak as $item)
                    @php $sum_tertinggal += sum_tertinggal($item->id); @endphp
                    <td scope="col">
                        <span>
                            {{sum_tertinggal($item->id)}}
                        </span>
                    </td>
                    @endforeach

                    <td scope="col">
                        <span>
                            {{ number_format($pak_first->tertinggal + $sum_tertinggal,3) }}
                        </span>
                    </td>

                    <td scope="col" colspan="3">
                        <input type="number" step="any" name="tertinggal" id="tertinggal" oninput="jml_utama();jml_semua();" value="{{Auth::user()->tertinggal}}" class="form-control">
                    </td>
                </tr>

                {{-- Pendidikan --}}
                <tr>
                    <td scope="col" rowspan="3" width="2%" style="vertical-align: top;">A</td>
                    <td scope="col" colspan="2">Pendidikan</td>
                    <td scope="col"></td>
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
                    <td scope="col">
                        <input type="number" step="any" name="pendidikan_sekolah" id="sekolah" oninput="jml_utama();jml_semua();" value="{{Auth::user()->pendidikan_sekolah}}" class="form-control">
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
                    <td scope="col">
                        <input type="number" step="any" name="pelatihan_prajabatan" id="pra_jabatan" oninput="jml_utama();jml_semua();" value="{{Auth::user()->pelatihan_prajabatan}}" class="form-control">
                    </td>
                    </tr>
                {{-- Pembelajaran / Bimbingan dan Tugas Tertentu --}}
                <tr>
                    <td scope="col" rowspan="4" width="2%" style="vertical-align: top;"> B</td>
                    <td scope="col" colspan="2">Pembelajaran / Bimbingan dan Tugas Tertentu</td>
                    <td scope="col"></td>
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
                    <td scope="col">
                        <input type="number" step="any" name="proses_pembelajaran" id="prose_pembelajaran" oninput="jml_utama();jml_semua();" value="{{Auth::user()->proses_pembelajaran}}" class="form-control">
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
                    <td scope="col">
                        <input type="number" step="any" name="proses_bimbingan" id="proses_bimbingan" oninput="jml_utama();jml_semua();" value="{{Auth::user()->proses_bimbingan}}" class="form-control">
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
                    <td scope="col">
                        <input type="number" step="any" name="tugas_lain" id="tugas_lain" oninput="jml_utama();jml_semua();" value="{{Auth::user()->tugas_lain}}" class="form-control">
                    </td>
                </tr>

                {{-- Pengembangan Keprofesian Bekelanjutan --}}
                <tr>
                    <td scope="col" rowspan="4" width="2%" style="vertical-align: top;"> C</td>
                    <td scope="col" colspan="2">Pengembangan Keprofesian Bekelanjutan</td>
                    <td scope="col"></td>
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
                    <td scope="col">
                        <input type="number" step="any" name="pengembangan_diri"  id="pengembangan_diri" oninput="jml_utama();jml_semua();" value="{{Auth::user()->pengembangan_diri}}" class="form-control">
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
                    <td scope="col">
                        <input type="number" step="any" name="publikasi_ilmiah" id="karya_ilmiah" oninput="jml_utama();jml_semua();" value="{{Auth::user()->publikasi_ilmiah}}" class="form-control">
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
                        <td scope="col">
                            <input type="number" step="any" name="karya_inovatif" id="karya_inovatif" oninput="jml_utama();jml_semua();" value="{{Auth::user()->karya_inovatif}}" class="form-control">
                        </td>
                </tr>
                <tr style="font-weight: 900;font-size: 20px;">
                    <td scope="col" colspan="3">Jumlah Unsur Utama</td>
                    <td scope="col">
                        <span>
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
                        <span>
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
                        <span>
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
                    <td scope="col">
                        <span id="jml_utama">
                            {{
                                $jml_utama_terakhir =
                            number_format(
                                Auth::user()->pendidikan_sekolah+
                                Auth::user()->pelatihan_prajabatan+
                                Auth::user()->proses_pembelajaran +
                                Auth::user()->proses_bimbingan +
                                Auth::user()->tugas_lain +
                                Auth::user()->pengembangan_diri +
                                Auth::user()->publikasi_ilmiah +
                                Auth::user()->karya_inovatif,3)
                                }}
                        </span>
                    </td>
                </tr>

                {{-- Unsur Penunjang --}}
                <tr>
                    <td scope="col" rowspan="5" width="2%" style="vertical-align: top;">2</td>
                    <td scope="col" colspan="3">Unsur Penunjang</td>
                    <td scope="col"> </td>
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
                    <td scope="col">
                        <input type="number" step="any" name="ijazah_tidak_sesuai" id="ijazah_tidak_sesuai" oninput="jml_penunjang();jml_semua();" value="{{Auth::user()->ijazah_tidak_sesuai}}" class="form-control">
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
                    <td scope="col">
                        <input type="number" step="any" name="pendukung_tugas_guru" id="pendukung_tugas_guru" oninput="jml_penunjang();jml_semua();" value="{{Auth::user()->pendukung_tugas_guru}}" class="form-control">
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
                    <td scope="col">
                        <input type="number" step="any" name="memperoleh_penghargaan" id="penghargaan" oninput="jml_penunjang();jml_semua();" value="{{Auth::user()->memperoleh_penghargaan}}" class="form-control">
                    </td>
                </tr>
                <tr style="font-weight: 900;font-size: 20px;">
                    <td scope="col" colspan="3">Jumlah Unsur Penunjang</td>
                    <td scope="col">
                        <span>
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
                        <span>
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
                        <span>
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
                    <td scope="col">
                        <span id="jml_penunjang">
                            {{
                                $jml_penunjang_terakhir =
                                number_format(
                                Auth::user()->ijazah_tidak_sesuai+
                                Auth::user()->pendukung_tugas_guru+
                                Auth::user()->memperoleh_penghargaan
                                ,3)
                            }}
                        </span>
                    </td>
                </tr>
                <tr style="font-weight: 900;font-size: 20px;">
                    <td scope="col" colspan="4">Jumlah Unsur Utama & Penunjang</td>
                    <td scope="col">
                        <span>
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
                                $pak_first->karya_inovatif
                                ) + $pak_first->tertinggal
                                ,3)
                                }}
                        </span>
                    </td>
                    @foreach ($pak as $item)
                    <td scope="col" style="font-weight: 900">
                        <span>
                            {{
                                number_format(
                                ijazah_tidak_sesuai($item->id)+
                                pendukung_tugas_guru($item->id)+
                                memperoleh_penghargaan($item->id)+karya_ilmiah($item->id) +  karya_inovatif($item->id) + sum_pendidikan1($item->id) + sum_prajab($item->id)+
                                proses_pembelajaran($item->id) + proses_bimbingan($item->id) + tugas_lain($item->id) + pengembangan_diri($item->id) + + sum_tertinggal($item->id)
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

                                    +

                                    $pak_first->tertinggal
                                    +
                                    $sum_tertinggal

                                    ,3)


                            }}
                            </span>
                    </td>
                    <td scope="col">
                        <span id="jml_semua">
                            {{
                                number_format(
                               $total_semua2 = (Auth::user()->ijazah_tidak_sesuai+
                                Auth::user()->pendukung_tugas_guru+
                                Auth::user()->memperoleh_penghargaan+

                                Auth::user()->pendidikan_sekolah+
                                Auth::user()->pelatihan_prajabatan+
                                Auth::user()->proses_pembelajaran +
                                Auth::user()->proses_bimbingan +
                                Auth::user()->tugas_lain +
                                Auth::user()->pengembangan_diri +
                                Auth::user()->publikasi_ilmiah +
                                Auth::user()->karya_inovatif +
                                Auth::user()->tertinggal

                                )
                                ,3)

                            }}
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-sm btn-success col-sm-12">
            <span class="btn-label">
              <i class="material-icons">check</i>
            </span>
            Hitung
            <div class="ripple-container"></div>
        </button>

    {!! Form::close() !!}

    @php $jml_1 = $ak_peroleh - $jabatan->target; @endphp
    @php $jml_4 = ($ak_utama - $jml_utama_terakhir + $ak_penunjang - $jml_penunjang_terakhir) - $jabatan->akk; @endphp
    @php $jml_2 = (($pak_first->pengembangan_diri + $pengembangan_diri) - $jabatan->akpkbpd) - Auth::user()->pengembangan_diri; @endphp
    @php $jml_3 = (($pak_first->publikasi_ilmiah + $pak_first->karya_inovatif +$karya_ilmiah +  $karya_inovatif) - $jabatan->akpkbpiki) - (Auth::user()->publikasi_ilmiah +  Auth::user()->karya_inovatif); @endphp
    @php $jml_5 = ($ak_penunjang - $jml_penunjang_terakhir) - $jabatan->akp;

        if($jml_1>=0 && $jml_2>=0 && $jml_3>=0 && $jml_4>=0 && $jml_5<=0){
            $naik_pangkat = 1;
        }else{
            $naik_pangkat = 0;
        }
    @endphp

    <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('penilais.usul_naik_pangkat',$naik_pangkat)}}" method="POST">
        @csrf
        <input type="hidden" value="PUT" name="_method">
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
                    <td>AKK</td>
                    <td>PD</td>
                    <td>PI/KI</td>
                </tr>
                <tr>
                    <td>AK Yang Di Peroleh</td>
                    <td>{{$ak_peroleh}}</td>
                    <td>{{$ak_utama - $jml_utama_terakhir + $ak_penunjang - $jml_penunjang_terakhir }}</td>
                    <td>{{($pak_first->pengembangan_diri + $pengembangan_diri) - Auth::user()->pengembangan_diri}}</td>
                    <td>{{($pak_first->publikasi_ilmiah + $pak_first->karya_inovatif +$karya_ilmiah +  $karya_inovatif) -  (Auth::user()->publikasi_ilmiah +  Auth::user()->karya_inovatif) }}</td>
                    <td>{{$ak_penunjang - $jml_penunjang_terakhir}}</td>
                </tr>
                <tr>
                    <td>AK Yang Wajib Peroleh</td>
                    <td>{{ $jabatan->target }}</td>
                    <td>{{ $jabatan->akk }}</td>
                    <td>{{ $jabatan->akpkbpd }}</td>
                    <td>{{ $jabatan->akpkbpiki }}</td>
                    <td>{{ $jabatan->akp }}</td>
                </tr>
                <tr style="font-weight: 900">
                    <td>Kelebihan/Kekurangan</td>
                    <td style="{{ $jml_1 >= 0 ? 'color: green;' : 'color: red;'  }}">{{ $jml_1 }}</td>
                    <td style="{{ $jml_4>=0 ? 'color: green;' : 'color: red;'  }}">{{ $jml_4 }}</td>
                    <td style="{{ $jml_2>=0 ? 'color: green;' : 'color: red;'  }}">{{ $jml_2 }}</td>
                    <td style="{{ $jml_3>=0 ? 'color: green;' : 'color: red;'  }}">{{ $jml_3 }}</td>
                    <td style="{{ $jml_5<=0 ? 'color: green;' : 'color: red;'  }}">{{ $jml_5 }}</td>
                </tr>
            </tbody>
        </table>

        <button type="submit" class="btn btn-sm btn-info col-sm-12">
            <span class="btn-label">
              <i class="material-icons">send</i>
            </span>
            Usul Naik Pangkat
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
