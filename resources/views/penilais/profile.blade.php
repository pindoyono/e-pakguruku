<div class="row">
        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
          <div class="form-group">
            <input name="name" type="text" value="{{$user->name}}" class="form-control">
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
                <option {{ $user->agama === "Islam"? 'selected' : '' }} value="Islam">Islam</option>
                <option {{ $user->agama === "Kristen"? 'selected' : '' }} value="Kristen">Kristen</option>
                <option {{ $user->agama === "Katholik"? 'selected' : '' }} value="Katholik">Katholik</option>
                <option {{ $user->agama === "Hindu"? 'selected' : '' }} value="Hindu">Hindu</option>
                <option {{ $user->agama === "Budha"? 'selected' : '' }} value="Budha">Budha</option>
              </select>
          </div>
        </div>
      </div>


      <div class="row">
        <label class="col-sm-2 col-form-label">Pangkat dan Golongan</label>
        <div class="col-sm-6">
            <select name="pangkat_golongan" class="selectpicker" title="Pilih Pangkat Golongan"  data-style="select-with-transition" title="">
                {{-- <option disabled selected>Pilih Agama</option> --}}
                @foreach ($jabatan as $item)
                <option {{ $user->pangkat_golongan == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->pangkat }}</option>
                @endforeach
            </select>
        </div>
      </div>


      <div class="row">
        <label class="col-sm-2 col-form-label">Wilayah Kerja</label>
        <div class="col-sm-10">
          <div class="form-group">
            <select name="wilayah_kerja" class="selectpicker" title="Pilih Wilayah Kerja"  data-style="select-with-transition" data-style="btn btn-default btn-round btn-sm" title="">
                <option {{ $user->wilaya_kerja === "tarakan"? 'selected' : '' }}  value="tarakan">Tarakan</option>
                <option {{ $user->wilayah_kerja === "malinau"? 'selected' : '' }}  value="malinau">Malinau-KTT</option>
                <option {{ $user->wilayah_kerja === "nunukan"? 'selected' : '' }}  value="nunukan">Nunukan</option>
                <option {{ $user->wilayah_kerja === "bulungan"? 'selected' : '' }}  value="bulungan">Bulungan</option>
              </select>
          </div>
        </div>
      </div>

      @role('super-admin')
      <div class="row">
        <label class="col-sm-2 col-form-label">Role</label>
        <div class="col-sm-10">
            <div class="form-group">
                {{-- {!! Form::select('roles[]', $roles,[], array('class' => 'selectpicker','btn btn-default btn-round btn-sm')) !!} --}}
                {{-- <select name="roles[]" class="selectpicker" data-style="select-with-transition" title="Pilih Role"> --}}
                    {{-- <option disabled selected>Pilih Agama</option> --}}
                    @php $no_role = 0; @endphp
                    @if(!empty($roles))
                    @foreach ($roles as $role)
                        <div class="col-sm-12 checkbox-radios">
                            <div class="checkbox">
                                <label>
                                    @if(!empty($user->getRoleNames()))
                                        <input class="form-check-input" name="roles[]" type="checkbox" {{in_array($role['name'], json_decode($user->getRoleNames())) ? "checked" : ""}}   id="roles" value="{{ $role['name'] }}">{{ $role['name'] }}
                                    @else
                                      Role Belum Dibuat
                                    @endif
                                </label>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
      </div>
      @endrole

    <div class="row">
        <label class="col-sm-2 col-form-label">NIP</label>
        <div class="col-sm-10">
          <div class="form-group">
            <input type="text" value="{{$user->username}}" name="username" type="text" class="form-control" disable>
          </div>
        </div>
      </div>

      <div class="row">
        <label class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <div class="form-group">
            <input name="email" value="{{$user->email}}" type="email" class="form-control">
          </div>
        </div>
      </div>

   <div class="row">
    <label class="col-sm-2 col-form-label">Pendidikan</label>
    <div class="col-sm-10">
      <div class="form-group">
        <input name="pendidikan" value="{{$user->pendidikan}}" type="text" class="form-control">
      </div>
    </div>
  </div>

  <div class="row">
    <label class="col-sm-2 col-form-label">Mengajar Mata Pelajaran</label>
    <div class="col-sm-10">
      <div class="form-group">
        <input name="jenis_guru" value="{{$user->jenis_guru}}" type="text" class="form-control">
      </div>
    </div>
  </div>

  <div class="row">
    <label class="col-sm-2 col-form-label">Tugas Tambahan</label>
    <div class="col-sm-10">
      <div class="form-group">
        <input name="tugas_tambahan" value="{{$user->tugas_tambahan}}" type="text" class="form-control">
      </div>
    </div>
  </div>

  <div class="row">
    <label class="col-sm-2 col-form-label label-checkbox">Jenis Kelamin</label>
    <div class="col-sm-10 checkbox-radios">
      <div class="form-check form-check-inline">
        <div class="form-check">
            <label class="form-check-label">
              <input class="form-check-input" {{ $user->jenis_kelamin === "Laki Laki"? 'checked' : '' }} type="radio" name="jenis_kelamin" value="Laki Laki" checked> Laki Laki
              <span class="circle">
                <span class="check"></span>
              </span>
            </label>
          </div>
      </div>
      <div class="form-check form-check-inline">
        <div class="form-check">
            <label class="form-check-label">
              <input class="form-check-input" {{ $user->jenis_kelamin === "Perempuan"? 'checked' : '' }} type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
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
        <input name="sekolah" value="{{$user->sekolah}}"  type="text" class="form-control">

      </div>
    </div>
  </div>

  <div class="row">
    <label class="col-sm-2 col-form-label">Alamat Sekolah</label>
    <div class="col-sm-10">
      <div class="form-group">
        <input name="alamat_sekolah" value="{{$user->alamat_sekolah}}"  type="text" class="form-control">
      </div>
    </div>
  </div>

  <div class="row">
    <label class="col-sm-2 col-form-label">Alamat Tempat Tinggal</label>
    <div class="col-sm-10">
      <div class="form-group">
        <input name="alamat_rumah" value="{{$user->alamat_rumah}}"  type="text" class="form-control">
      </div>
    </div>
  </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">Tempat Lahir</label>
        <div class="col-sm-3">
            <div class="form-group">
                <input name="tempat_lahir" value="{{$user->tempat_lahir}}"  type="text" class="form-control">
            </div>
        </div>
        <div class="form-check form-check-inline">
            <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-5">
                <div class="form-group">
                    <input name="tanggal_lahir" value="{{Carbon\Carbon::parse($user->tanggal_lahir)->format('d/m/Y')}}"  type="text" class="form-control" id='datetimepicker1'>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">NUTPK</label>
        <div class="col-sm-10">
          <div class="form-group">
            <input name="nuptk" value="{{$user->nuptk}}"  type="text" class="form-control">
          </div>
        </div>
    </div>

      <div class="row">
        <label class="col-sm-2 col-form-label">No SK Terakhir</label>
        <div class="col-sm-10">
          <div class="form-group">
            <input name="no_sk_cpns" value="{{$user->no_sk_cpns}}"  type="text" class="form-control">
          </div>
        </div>
      </div>

      <div class="row">
        <label class="col-sm-2 col-form-label">TMT CPNS</label>
        <div class="col-sm-10">
          <div class="form-group">
            <input name="tmt_cpns" type="text" value="{{Carbon\Carbon::parse($user->tmt_cpns)->format('d/m/Y')}}" class="form-control" id='datetimepickercp'>
          </div>
        </div>
      </div>

      <div class="row">
        <label class="col-sm-2 col-form-label">TMT SK Pangkat Terakhir</label>
        <div class="col-sm-5">
          <div class="form-group">
            <input name="tmt_pns" type="text" value="{{Carbon\Carbon::parse($user->tmt_pns)->format('d/m/Y')}}"  class="form-control" id='datetimepickertmt'>
          </div>
        </div>
      </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">No Handhone</label>
        <div class="col-sm-10">
          <div class="form-group">
            <input name="no_hp" type="text" value="{{$user->no_hp}}"  class="form-control">
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
                      @if ($user->avatar==null)
                      <img src="{{asset('storage/avatar/placeholder.jpg')}}" " alt="...">
                      @else
                      <img src="{{asset('storage/avatar/'.$user->avatar)}}" " alt="...">
                      @endif
                  </div>
                </div>
              </div>
          </div>
        </div>
    </div>
