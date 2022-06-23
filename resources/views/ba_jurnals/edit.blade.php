@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Pengguna</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('kegiatans.index') }}">
                <span class="btn-label">
                  <i class="material-icons">reply</i>
                </span>
                Kembali
              <div class="ripple-container"></div>
            </a>
        </div>
    </div>
</div>


{{-- @if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif --}}


<div class="col-md-12">
    <div class="card ">
      <div class="card-header card-header-rose card-header-text">
        <div class="card-text">
          <h4 class="card-title">
            <span class="material-icons md-72">
                edit_note
                </span>
          </h4>
        </div>
      </div>
      <div class="card-body">
        {{-- {!! Form::file(array('route' => 'users.store','method'=>'POST')) !!} --}}
        <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('kegiatans.update',$data)}}" method="POST">
            @csrf
            <input type="hidden" value="PUT" name="_method">
            <div class="row">
                <label class="col-sm-2 col-form-label">Unsur</label>
                <div class="col-sm-10">
                    <div class="form-group">
                    <input class="form-control"  value="{{$data->unsur}}" placeholder="Unsur" type="text" name="unsur"  required="true" aria-required="true">
                    {{-- <span class="bmd-help">A block of help text that breaks onto a new line.</span> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Sub Unsur</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <input class="form-control" value="{{$data->sub_unsur}}" placeholder="Sub unsur" type="text" name="sub_unsur"  required="true" aria-required="true">
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Kegiatan</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <textarea cols="10" rows="4" class="form-control" name="kegiatan" id="input-description" type="text" placeholder="" required="true" aria-required="true">{{$data->kegiatan}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Kode</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <input class="form-control" value="{{$data->kode}}"  placeholder="Kode" type="text" name="kode"  required="true" aria-required="true">
                    </div>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-form-label">Satuan Hasil</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <input class="form-control" value="{{$data->satuan_hasil}}"  placeholder="Satuan Hasil" type="text" name="satuan_hasil"  required="true" aria-required="true">
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Nilai Angka Kredit</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <input class="form-control" value="{{$data->angka_kredit}}" placeholder="Angka Kredit" type="text" name="angka_kredit"  required="true" aria-required="true">
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Pelaksana</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <input class="form-control" value="{{$data->pelaksana}}" placeholder="Pelaksana" type="text" name="pelaksana"  required="true" aria-required="true">
                    </div>
                </div>
            </div>

            <button class="btn btn-success">
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
              defaultDate: '2/5/2022',
              format: 'D-M-Y',
          });
          $('#datetimepickertmt').datetimepicker({
              icons: {
                  time: "fa fa-clock-o",
                  date: "fa fa-calendar",
                  up: "fa fa-arrow-up",
                  down: "fa fa-arrow-down"
              },
              format: 'D-M-Y',
          });
          $('#datetimepickercp').datetimepicker({
              icons: {
                  time: "fa fa-clock-o",
                  date: "fa fa-calendar",
                  up: "fa fa-arrow-up",
                  down: "fa fa-arrow-down"
              },
              format: 'D-M-Y',
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
