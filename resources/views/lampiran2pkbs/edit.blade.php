@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit L2PKB</h2>
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
                <a class="btn btn-sm btn-primary" href="{{ route('lampiran2pkbs.index') }}">
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
        <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('lampiran2pkbs.update',$data)}}" method="POST">
            <input type="hidden" value="PUT" name="_method">
            @csrf
            <div class="row">
                <label class="col-sm-2 col-form-label">Kode</label>
                <div class="col-sm-10">
                    <div class="form-group">
                    <input class="form-control"  placeholder="Kode" type="text" name="kode" value="{{ $data->kode }}" required="true" aria-required="true">
                    {{-- <span class="bmd-help">A block of help text that breaks onto a new line.</span> --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <textarea cols="10" rows="4" class="form-control" value="" name="diskripsi" id="input-description" type="text" placeholder="" required="true" aria-required="true">
                            {{$data->diskripsi}}
                        </textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Jenis</label>
                <div class="col-sm-10">
                    <div class="form-group">
                    <input class="form-control"  placeholder="Jenis" type="text" name="jenis" value="{{ $data->jenis }}" required="true" aria-required="true">
                    {{-- <span class="bmd-help">A block of help text that breaks onto a new line.</span> --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Saran</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <textarea cols="10" rows="4" class="form-control" value="" name="saran" id="input-description" type="text" placeholder="" required="true" aria-required="true">
                            {{$data->saran}}
                        </textarea>
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

            <a class="btn btn-info" href="{{ route('lampiran2pkbs.index') }}">
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
