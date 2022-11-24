@extends('layouts.app')


@section('content')
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
                <a class="btn btn-sm btn-primary" href="{{ route('kepegawaians.index') }}">
                    <span class="btn-label">
                        <i class="material-icons">reply</i>
                    </span>
                    Kembali
                    <div class="ripple-container"></div>
                </a>
            </div>
        </div>
      <div class="card-body">
        <h3>Isikan data yg perlu di edit saya tidak perlu di isi semua</h3>
        <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('kepegawaians.update',$kepegawaian)}}" method="POST">
            @csrf
            <input type="hidden" value="PUT" name="_method">
        <div class="row">
            <label class="col-sm-3 col-form-label">SK CPNS</label>
            <div class="col-md-2">
                <input type="file" name="sk_cpns" class="form-control" placeholder=".col-md-3">
            </div>
            <label class="col-sm-3 col-form-label"><b>Sk pangkat terakhir + PAK kenpa terakhir ( digabung jadi 1 file ) <br> PAK kenpa adalah PAK yg nilai AK nya tertera pada SK Kenpa Terakhir</b></label>
            <div class="col-md-2">
                <input type="file" name="sk_pangkat" class="form-control" placeholder=".col-md-3">
            </div>
        </div>

        <br>

        <div class="row">
            <label class="col-sm-3 col-form-label">SK Jabfung Pertama + PAK Jabfung bagi kenaikan pangkat pertama ( digabung jadi 1 file ) <br> PAK jabfung adalah PAK yg nilai ak nya tertera pada SK jafung</label>
            <div class="col-md-2">
                <input type="file" name="sk_jafung" class="form-control" placeholder=".col-md-3">
            </div>
            <label class="col-sm-3 col-form-label">IJAZAH</label>
            <div class="col-md-2">
                <input type="file" name="ijazah" class="form-control" placeholder=".col-md-3">
            </div>
        </div>

        <br>

        <div class="row">
            <label class="col-sm-3 col-form-label">Karpeg</label>
            <div class="col-md-2">
                <input type="file" name="karpeg" class="form-control" placeholder=".col-md-3">
            </div>
            <label class="col-sm-3 col-form-label">Sk Penyesuaian (kab ke prov)</label>
            <div class="col-md-2">
                <input type="file" name="sk_penyesuaian" class="form-control" placeholder=".col-md-3">
            </div>
        </div>
        <br>

        <div class="row">
            <label class="col-sm-3 col-form-label">Sertifikat Pendidik</label>
            <div class="col-md-2">
                <input type="file" name="serdik" class="form-control" placeholder=".col-md-3">
            </div>

            {{-- <label class="col-sm-3 col-form-label">Sk Penyesuaian (kab ke prov)</label>
            <div class="col-md-2">
                <input type="file" name="sk_penyesuaian" class="form-control" placeholder=".col-md-3">
            </div> --}}
        </div>

        {{-- <div class="row">
            <label class="col-sm-3 col-form-label">Nilai AK PAK Pangkat Terakhir</label>
            <div class="col-md-8">
                <input type="number" step="any" name="nilai_pak_pangkat_akhir" value="{{$kepegawaian->nilai_pak_pangkat_akhir}}" class="form-control" placeholder="Nilai PAK Pangkat Terkahir">
            </div>
            <label class="col-sm-3 col-form-label">Sk Penyesuaian (kab ke prov)</label>
            <div class="col-md-2">
                <input type="file" name="sk_penyesuaian" class="form-control" placeholder=".col-md-3">
            </div>
        </div> --}}

        <br>

            <button type="submit" class="btn btn-sm btn-success">
                <span class="btn-label">
                  <i class="material-icons">check</i>
                </span>
                Simpan
                <div class="ripple-container"></div>
            </button>

            <a class="btn btn-sm btn-info" href="{{ route('kepegawaians.index') }}">
                <span class="btn-label">
                  <i class="material-icons">reply</i>
                </span>
                Kembali
              <div class="ripple-container"></div>
            </a>
        </table>
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
