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
            <div class="row">
                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input name="name" type="text" class="form-control">
                    {{-- <span class="bmd-help">A block of help text that breaks onto a new line.</span> --}}
                  </div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 col-form-label">Agama</label>
                <div class="col-sm-6">
                  <div class="form-group">
                    <select name="agama" class="selectpicker" title="Pilih Agama"  data-style="select-with-transition">
                        {{-- <option disabled selected>Pilih Agama</option> --}}
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katholik">Katholik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                      </select>
                  </div>
                </div>
              </div>



              <div class="row">
                <label class="col-sm-2 col-form-label">Pangkat dan Golongan</label>
                <div class="col-sm-6">
                    <select name="pangkat_golongan" class="selectpicker" data-style="select-with-transition" title="Pilih Pangkat Golongan">
                        {{-- <option disabled selected>Pilih Agama</option> --}}
                        @foreach ($jabatan as $item)
                        <option value="{{$item->pangkat}}">{{$item->pangkat}}</option>
                        @endforeach
                      </select>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 col-form-label">Wilayah Kerja</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <select name="wilayah_kerja" class="selectpicker" title="Pilih Wilayah Kerja"  data-style="select-with-transition" data-style="btn btn-default btn-round btn-sm" title="">
                        <option value="tarakan">Tarakan</option>
                        <option value="malinau">Malinau-KTT</option>
                        <option value="nunukan">Nunukan</option>
                        <option value="bulungan">Bulungan</option>
                      </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <div class="form-group">
                        <select name="roles[]" class="selectpicker" data-style="select-with-transition" title="Pilih Role">
                            {{-- <option disabled selected>Pilih Agama</option> --}}
                            @foreach ($roles as $role)
                                    <option value={{$role}}>{{$role}}</option>
                            @endforeach
                          </select>
                    </div>
                  </div>
                </div>
              </div>

             <div class="row">
                <label class="col-sm-2 col-form-label">NIP</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input type="text" name="username" type="text" class="form-control">
                  </div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input name="email" type="email" class="form-control" >
                  </div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input name="password" type="password" class="form-control" >
                  </div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 col-form-label">Konfirmasi Password</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input name="confirm-password" type="password" class="form-control" >
                  </div>
                </div>
              </div>



           <div class="row">
            <label class="col-sm-2 col-form-label">Pendidikan</label>
            <div class="col-sm-10">
              <div class="form-group">
                <input name="pendidikan" type="text" class="form-control">
              </div>
            </div>
          </div>

          <div class="row">
            <label class="col-sm-2 col-form-label">Mengajar Mata Pelajaran</label>
            <div class="col-sm-10">
              <div class="form-group">
                <input name="jenis_guru" type="text" class="form-control">
              </div>
            </div>
          </div>

          <div class="row">
            <label class="col-sm-2 col-form-label">Tugas Tambahan</label>
            <div class="col-sm-10">
              <div class="form-group">
                <input name="tugas_tambahan" type="text" class="form-control">
              </div>
            </div>
          </div>

          <div class="row">
            <label class="col-sm-2 col-form-label label-checkbox">Jenis Kelamin</label>
            <div class="col-sm-10 checkbox-radios">
              <div class="form-check form-check-inline">
                <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki Laki" checked> Laki Laki
                      <span class="circle">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
              </div>
              <div class="form-check form-check-inline">
                <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                      <span class="circle">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
              </div>
            </div>
          </div>

          <div class="row">
            <label class="col-sm-2 col-form-label">Nama Sekolah</label>
            <div class="col-sm-10">
              <div class="form-group">
                <input name="sekolah" type="text" class="form-control">
              </div>
            </div>
          </div>

          <div class="row">
            <label class="col-sm-2 col-form-label">Alamat Sekolah</label>
            <div class="col-sm-10">
              <div class="form-group">
                <input name="alamat_sekolah" type="text" class="form-control">
              </div>
            </div>
          </div>

          <div class="row">
            <label class="col-sm-2 col-form-label">Alamat Tempat Tinggal</label>
            <div class="col-sm-10">
              <div class="form-group">
                <input name="alamat_rumah" type="text" class="form-control">
              </div>
            </div>
          </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                <div class="col-sm-3">
                    <div class="form-group">
                        <input name="tempat_lahir" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-check form-check-inline">
                    <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <input name="tanggal_lahir" type="text" class="form-control" id='datetimepicker1'>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">NUTPK</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input name="nuptk" type="text" class="form-control">
                  </div>
                </div>
            </div>

              <div class="row">
                <label class="col-sm-2 col-form-label">No SK Terakhir</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input name="no_sk_cpns" type="text" class="form-control">
                  </div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 col-form-label">TMT CPNS</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input name="tmt_cpns" type="text" class="form-control" id='datetimepickercp'>
                  </div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 col-form-label">TMT SK Pangkat Terakhir</label>
                <div class="col-sm-5">
                  <div class="form-group">
                    <input name="tmt_pns" type="text" class="form-control" id='datetimepickertmt'>
                  </div>
                </div>
              </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">No Handhone</label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input name="no_hp" type="text" class="form-control">
                  </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    {{-- <input type="file" name="avatar" class="form-control"> --}}
                  <div class="form-group">
                    <div class="col-md-4 col-sm-4">
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-new thumbnail">
                            <img src="../../assets/img/image_placeholder.jpg" alt="...">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                            <span class="btn btn-rose btn-round btn-file">
                              <span class="fileinput-new">Select image</span>
                              <span class="fileinput-exists">Change</span>
                              <input type="file" name="avatar" class="form-control">
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                          </div>
                        </div>


                      </div>
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

            <a class="btn btn-info" href="{{ route('users.index') }}">
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
