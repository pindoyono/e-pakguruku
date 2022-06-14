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
                <a class="btn btn-sm btn-primary" href="{{ route('settings.index') }}">
                    <span class="btn-label">
                        <i class="material-icons">reply</i>
                    </span>
                    Kembali
                    <div class="ripple-container"></div>
                </a>
            </div>
        </div>
      <div class="card-body">

        <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('settings_controller.store1')}}" method="POST">
            @csrf

        <div class="row">
            <label class="col-sm-3 col-form-label">Tanggal Berita Acara Atas</label>
            <div class="col-md-2">
                <input name="tgl_berita_acara_atas" type="text" class="form-control" id='datetimepicker1'>
            </div>
            <label class="col-sm-3 col-form-label">Tanggal Berita Acara TTD</label>
            <div class="col-md-2">
                <input name="tgl_berita_acara_ttd" type="text" class="form-control" id='datetimepicker2'>
            </div>
        </div>

        <div class="row">
            <label class="col-sm-3 col-form-label">Hari Berita Acara</label>
            <div class="col-md-2">
                <input name="hari_ba" type="text" class="form-control" >
            </div>
            <label class="col-sm-3 col-form-label">Tanggal Hapak ATAS</label>
            <div class="col-md-2">
                <input name="tgl_hapak_atas" type="text" class="form-control" id='datetimepicker3'>
            </div>
        </div>

        <div class="row">
            <label class="col-sm-3 col-form-label">Awal Hapak</label>
            <div class="col-md-2">
                <input name="awal_hapak" type="text" class="form-control" id='datetimepicker4' >
            </div>
            <label class="col-sm-3 col-form-label">Akhir Hapak</label>
            <div class="col-md-2">
                <input name="akhir_hapak" type="text" class="form-control" id='datetimepicker5'>
            </div>
        </div>

        <br>

        <div class="row">
            <label class="col-sm-3 col-form-label">Tanggal Hapak TTD</label>
            <div class="col-md-2">
                <input name="tgl_hapak_ttd" type="text" class="form-control" id='datetimepicker6' >
            </div>
            <label class="col-sm-3 col-form-label">Tanggal PAK TTD</label>
            <div class="col-md-2">
                <input name="tgl_pak_ttd" type="text" class="form-control" id='datetimepicker7'>
            </div>
        </div>


        <div class="row">
            <label class="col-sm-3 col-form-label">Tag KADIS</label>
            <div class="col-md-2">
                <input name="kadis" type="text" class="form-control" id='' >
            </div>
            <label class="col-sm-3 col-form-label">Nama Kadis</label>
            <div class="col-md-2">
                <input name="nama_kadis" type="text" class="form-control" id=''>
            </div>
        </div>


        <div class="row">
            <label class="col-sm-3 col-form-label">Jabatan Kadis</label>
            <div class="col-md-2">
                <input name="jabatan_kadis" type="text" class="form-control" id='' >
            </div>
            <label class="col-sm-3 col-form-label">NIP Kadis</label>
            <div class="col-md-2">
                <input name="nip_kadis" type="text" class="form-control" id=''>
            </div>
        </div>

        <br>

            <button type="submit" class="btn btn-sm btn-success">
                <span class="btn-label">
                  <i class="material-icons">check</i>
                </span>
                Simpan
                <div class="ripple-container"></div>
            </button>

            {{-- <a class="btn btn-sm btn-info" href="{{ route('kepegawaians.index') }}">
                <span class="btn-label">
                  <i class="material-icons">reply</i>
                </span>
                Kembali
              <div class="ripple-container"></div>
            </a> --}}
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

          $('#datetimepicker2').datetimepicker({
              icons: {
                  time: "fa fa-clock-o",
                  date: "fa fa-calendar",
                  up: "fa fa-arrow-up",
                  down: "fa fa-arrow-down"
              },
              format: 'D-M-Y'
          });

          $('#datetimepicker3').datetimepicker({
              icons: {
                  time: "fa fa-clock-o",
                  date: "fa fa-calendar",
                  up: "fa fa-arrow-up",
                  down: "fa fa-arrow-down"
              },
              format: 'D-M-Y'
          });

          $('#datetimepicker4').datetimepicker({
              icons: {
                  time: "fa fa-clock-o",
                  date: "fa fa-calendar",
                  up: "fa fa-arrow-up",
                  down: "fa fa-arrow-down"
              },
              format: 'D-M-Y'
          });

          $('#datetimepicker5').datetimepicker({
              icons: {
                  time: "fa fa-clock-o",
                  date: "fa fa-calendar",
                  up: "fa fa-arrow-up",
                  down: "fa fa-arrow-down"
              },
              format: 'D-M-Y'
          });

          $('#datetimepicker6').datetimepicker({
              icons: {
                  time: "fa fa-clock-o",
                  date: "fa fa-calendar",
                  up: "fa fa-arrow-up",
                  down: "fa fa-arrow-down"
              },
              format: 'D-M-Y'
          });

          $('#datetimepicker7').datetimepicker({
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
