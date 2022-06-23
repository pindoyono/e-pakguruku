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
                <a class="btn btn-sm btn-primary" href="{{ route('kegiatans.index') }}">
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
        <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('kegiatans.store')}}" method="POST">
            @csrf
            <div class="row">
                <label class="col-sm-2 col-form-label">Unsur</label>
                <div class="col-sm-10">
                    <div class="form-group">
                    <input class="form-control"  placeholder="Unsur" type="text" name="unsur"  required="true" aria-required="true">
                    {{-- <span class="bmd-help">A block of help text that breaks onto a new line.</span> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Sub Unsur</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <input class="form-control"  placeholder="Sub unsur" type="text" name="sub_unsur"  required="true" aria-required="true">
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Keguatan</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <textarea cols="10" rows="4" class="form-control" name="kegiatan" id="input-description" type="text" placeholder="" required="true" aria-required="true"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Kode</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <input class="form-control"  placeholder="Kode" type="text" name="kode"  required="true" aria-required="true">
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Satuan Hasil</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <input class="form-control"  placeholder="Satuan Hasil" type="text" name="satuan_hasil"  required="true" aria-required="true">
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Nilai Angka Kredit</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <input class="form-control"  placeholder="Angka Kredit" type="text" name="angka_kredit"  required="true" aria-required="true">
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Pelaksana</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <input class="form-control"  placeholder="Pelaksana" type="text" name="pelaksana"  required="true" aria-required="true">
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-success">
                <span class="btn-label">
                  <i class="material-icons">check</i>
                </span>
                Simpan
                <div class="ripple-container"></div>
            </button>

            <a class="btn btn-info" href="{{ route('kegiatans.index') }}">
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
