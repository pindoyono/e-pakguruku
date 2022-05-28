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
                <a class="btn btn-sm btn-primary" href="{{ route('pendidikans.index1', $pak_id) }}">
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
        <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('pendidikans.update1',$pendidikan->id)}}" method="POST">
            @csrf
            <input type="hidden" value="PUT" name="_method">

            <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <select name="kegiatan_id" data-style="select-with-transition" class="selectpicker" title="Pilih Kategori" data-live-search="true">
                    {{-- <select name="kegiatan_id" class="form-control selectpicker" data-live-search="true"> --}}
                        @foreach ($kegiatan as $item)
                        <option {{ ( $item->id == $pendidikan->kegiatan_id) ? 'selected' : '' }} value="{{ $item->id }}">{{ Str::limit($item->kegiatan, 150) }}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="bmd-label-floating">Nilai AK</label>
                        <input name="nilai"  value="{{$pendidikan->nilai}}" type="number" step="any" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="bmd-label-floating">Judul Berkas</label>
                        <input name="judul" value="{{$pendidikan->judul}}" type="text" class="form-control">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-4">
                    <input type="file" name="lampiran" class="form-control" placeholder="">
                </div>
            </div>


            <div class="pull-right">
                <button type="submit" class="btn btn-sm btn-success">
                    <span class="btn-label">
                      <i class="material-icons">check</i>
                    </span>
                    Simpan
                    <div class="ripple-container"></div>
                </button>
                <a class="btn btn-sm btn-primary" href="{{ route('pendidikans.index1', $pak_id) }}">
                    <span class="btn-label">
                        <i class="material-icons">reply</i>
                    </span>
                    Kembali
                    <div class="ripple-container"></div>
                </a>
            </div>
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
