@extends('layouts.app')


@section('content')
<div class="col-lg-12 col-md-12">
    <div class="card">
      <div class="card-header card-header-tabs card-header-rose">
        <div class="nav-tabs-navigation">
          <div class="nav-tabs-wrapper">
            <span class="nav-tabs-title">Lampiran:</span>
            <ul class="nav nav-tabs" data-tabs="tabs">
              <li class="nav-item">
                <a class="nav-link active" href="#pendidikan" data-toggle="tab">
                  <i class="material-icons">school</i> Pendidikan
                  <div class="ripple-container"></div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#penugasan" data-toggle="tab">
                  <i class="material-icons">inventory</i> Penugasan
                  <div class="ripple-container"></div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pkb" data-toggle="tab">
                  <i class="material-icons">content_paste</i> PKB
                  <div class="ripple-container"></div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#penunjang" data-toggle="tab">
                  <i class="material-icons">extension</i> Penunjang
                  <div class="ripple-container"></div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#konfirmasi" data-toggle="tab">
                  <i class="material-icons">done_all</i> Konfirmasi
                  <div class="ripple-container"></div>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane active" id="pendidikan">
            <div class="col-md-12">
                <h3>Pendidikan</h3>
                <div class="pull-right">
                    <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#pendidikanModal"> Tambah Kegiatan</a>
                </div>
            </div>
            <table id="datatables" class="table table-striped table-no-bordered table-hover data-pendidikan" cellspacing="0" width="100%" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Unsur</th>
                    <th>Sub Unsur</th>
                    <th>Kegiatan</th>
                    <th>Kode</th>
                    <th>Hasil</th>
                    <th>Nilai AK</th>
                    <th>Pelaksana</th>
                    <th class="disabled-sorting text-right">Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Unsur</th>
                    <th>Sub Unsur</th>
                    <th>Kegiatan</th>
                    <th>Kode</th>
                    <th>Hasil</th>
                    <th>Nilai AK</th>
                    <th>Pelaksana</th>
                    <th class="text-right">Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                    {{-- @foreach ($data as $key => $kegiatan)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{$kegiatan->unsur}}</td>
                            <td>{{$kegiatan->sub_unsur}}</td>
                            <td>{{$kegiatan->kegiatan}}</td>
                            <td>{{$kegiatan->kode}}</td>
                            <td>{{$kegiatan->satuan_hasil}}</td>
                            <td>{{$kegiatan->angka_kredit}} AK</td>
                            <td>{{$kegiatan->pelaksana}}</td>
                            <td class="td-actions text-right">
                                <a class="btn btn-primary" href="{{ route('kegiatans.edit',$kegiatan) }}"><i class="material-icons">edit</i></a>
                                {!! Form::open(['method' => 'DELETE','route' => ['kegiatans.destroy', $kegiatan],'style'=>'display:inline']) !!}
                                    <button type="submit" rel="tooltip" class="btn btn-danger">
                                        <i class="material-icons">close</i>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>

            <!-- Pendidikan Modal -->
            <div class="modal fade" id="pendidikanModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons md-60">post_add</i>
                                </div>
                                <h4 class="card-title">Tambah Usulan</h4>
                              </div>
                          <div class="card-body">
                            <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('kegiatans.store')}}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <select class="form-control selectpicker" data-live-search="true">
                                            @foreach ($pendidikan as $item)
                                            <option  value="{{ $item->id }}">{{ Str::limit($item->kegiatan, 150) }}</option>
                                            @endforeach
                                          </select>
                                      </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Judul</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Nilai AK</label>
                                            <input type="text" type="number" class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="file" name="tidak_dihukum" class="form-control" placeholder="Upload Lampiran">
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
                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            {!! Form::close() !!}
                          </div>
                    </div>
                </div>
            </div>
            <!--  End Modal -->
          </div>


          <div class="tab-pane" id="penugasan">
            <div class="col-md-12">
                <h3>Penugasan</h3>
                <div class="pull-right">
                    <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#penugasanModal"> Tambah Kegiatan</a>
                </div>
            </div>
            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Unsur</th>
                    <th>Sub Unsur</th>
                    <th>Kegiatan</th>
                    <th>Kode</th>
                    <th>Hasil</th>
                    <th>Nilai AK</th>
                    <th>Pelaksana</th>
                    <th class="disabled-sorting text-right">Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Unsur</th>
                    <th>Sub Unsur</th>
                    <th>Kegiatan</th>
                    <th>Kode</th>
                    <th>Hasil</th>
                    <th>Nilai AK</th>
                    <th>Pelaksana</th>
                    <th class="text-right">Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                    {{-- @foreach ($data as $key => $kegiatan)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{$kegiatan->unsur}}</td>
                            <td>{{$kegiatan->sub_unsur}}</td>
                            <td>{{$kegiatan->kegiatan}}</td>
                            <td>{{$kegiatan->kode}}</td>
                            <td>{{$kegiatan->satuan_hasil}}</td>
                            <td>{{$kegiatan->angka_kredit}} AK</td>
                            <td>{{$kegiatan->pelaksana}}</td>
                            <td class="td-actions text-right">
                                <a class="btn btn-primary" href="{{ route('kegiatans.edit',$kegiatan) }}"><i class="material-icons">edit</i></a>
                                {!! Form::open(['method' => 'DELETE','route' => ['kegiatans.destroy', $kegiatan],'style'=>'display:inline']) !!}
                                    <button type="submit" rel="tooltip" class="btn btn-danger">
                                        <i class="material-icons">close</i>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>

            <!-- Pendidikan Modal -->
            <div class="modal fade" id="penugasanModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons md-60">post_add</i>
                                </div>
                                <h4 class="card-title">Tambah Usulan</h4>
                              </div>
                          <div class="card-body">
                            <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('kegiatans.store')}}" method="POST">
                                @csrf
                                {{-- <div class="row">
                                    <label class="col-sm-3 col-form-label">Sub Unsur</label>
                                    <div class="col-md-2">
                                        <input type="file" name="surat_pengantar" class="form-control" placeholder=".col-md-3">
                                    </div>

                                    <label class="col-sm-3 col-form-label">Kategori</label>
                                    <div class="col-md-2">
                                        <input type="file" name="tidak_dihukum" class="form-control" placeholder=".col-md-3">
                                    </div>
                                </div> --}}

                                <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <select class="form-control selectpicker" data-live-search="true">
                                            @foreach ($penugasan as $item)
                                            <option  value="{{ $item->id }}">{{ Str::limit($item->kegiatan, 150) }}</option>
                                            @endforeach
                                          </select>
                                      </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <input type="text" class="form-control">
                                      </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="file" name="tidak_dihukum" class="form-control" placeholder="">
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
                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            {!! Form::close() !!}
                          </div>
                    </div>
                </div>
            </div>
            <!--  End Modal -->
          </div>


          <div class="tab-pane" id="pkb">
            <div class="col-md-12">
                <h3>PKB</h3>
                <div class="pull-right">
                    <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#pkbModal"> Tambah Kegiatan</a>
                </div>
            </div>
            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Unsur</th>
                    <th>Sub Unsur</th>
                    <th>Kegiatan</th>
                    <th>Kode</th>
                    <th>Hasil</th>
                    <th>Nilai AK</th>
                    <th>Pelaksana</th>
                    <th class="disabled-sorting text-right">Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Unsur</th>
                    <th>Sub Unsur</th>
                    <th>Kegiatan</th>
                    <th>Kode</th>
                    <th>Hasil</th>
                    <th>Nilai AK</th>
                    <th>Pelaksana</th>
                    <th class="text-right">Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                    {{-- @foreach ($data as $key => $kegiatan)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{$kegiatan->unsur}}</td>
                            <td>{{$kegiatan->sub_unsur}}</td>
                            <td>{{$kegiatan->kegiatan}}</td>
                            <td>{{$kegiatan->kode}}</td>
                            <td>{{$kegiatan->satuan_hasil}}</td>
                            <td>{{$kegiatan->angka_kredit}} AK</td>
                            <td>{{$kegiatan->pelaksana}}</td>
                            <td class="td-actions text-right">
                                <a class="btn btn-primary" href="{{ route('kegiatans.edit',$kegiatan) }}"><i class="material-icons">edit</i></a>
                                {!! Form::open(['method' => 'DELETE','route' => ['kegiatans.destroy', $kegiatan],'style'=>'display:inline']) !!}
                                    <button type="submit" rel="tooltip" class="btn btn-danger">
                                        <i class="material-icons">close</i>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>

            <!-- Pendidikan Modal -->
            <div class="modal fade" id="pkbModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons md-60">post_add</i>
                                </div>
                                <h4 class="card-title">Tambah Usulan</h4>
                              </div>
                          <div class="card-body">
                            <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('kegiatans.store')}}" method="POST">
                                @csrf
                                {{-- <div class="row">
                                    <label class="col-sm-3 col-form-label">Sub Unsur</label>
                                    <div class="col-md-2">
                                        <input type="file" name="surat_pengantar" class="form-control" placeholder=".col-md-3">
                                    </div>

                                    <label class="col-sm-3 col-form-label">Kategori</label>
                                    <div class="col-md-2">
                                        <input type="file" name="tidak_dihukum" class="form-control" placeholder=".col-md-3">
                                    </div>
                                </div> --}}

                                <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <select class="form-control selectpicker" data-live-search="true">
                                            @foreach ($pkb as $item)
                                            <option  value="{{ $item->id }}">{{ Str::limit($item->kegiatan, 150) }}</option>
                                            @endforeach
                                          </select>
                                      </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <input type="text" class="form-control">
                                      </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="file" name="tidak_dihukum" class="form-control" placeholder="">
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
                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            {!! Form::close() !!}
                          </div>
                    </div>
                </div>
            </div>
            <!--  End Modal -->
          </div>


          <div class="tab-pane" id="penunjang">
            <div class="col-md-12">
                <h3>Penunjang</h3>
                <div class="pull-right">
                    <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#penunjangModal"> Tambah Kegiatan</a>
                </div>
            </div>
            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Unsur</th>
                    <th>Sub Unsur</th>
                    <th>Kegiatan</th>
                    <th>Kode</th>
                    <th>Hasil</th>
                    <th>Nilai AK</th>
                    <th>Pelaksana</th>
                    <th class="disabled-sorting text-right">Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Unsur</th>
                    <th>Sub Unsur</th>
                    <th>Kegiatan</th>
                    <th>Kode</th>
                    <th>Hasil</th>
                    <th>Nilai AK</th>
                    <th>Pelaksana</th>
                    <th class="text-right">Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                    {{-- @foreach ($data as $key => $kegiatan)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{$kegiatan->unsur}}</td>
                            <td>{{$kegiatan->sub_unsur}}</td>
                            <td>{{$kegiatan->kegiatan}}</td>
                            <td>{{$kegiatan->kode}}</td>
                            <td>{{$kegiatan->satuan_hasil}}</td>
                            <td>{{$kegiatan->angka_kredit}} AK</td>
                            <td>{{$kegiatan->pelaksana}}</td>
                            <td class="td-actions text-right">
                                <a class="btn btn-primary" href="{{ route('kegiatans.edit',$kegiatan) }}"><i class="material-icons">edit</i></a>
                                {!! Form::open(['method' => 'DELETE','route' => ['kegiatans.destroy', $kegiatan],'style'=>'display:inline']) !!}
                                    <button type="submit" rel="tooltip" class="btn btn-danger">
                                        <i class="material-icons">close</i>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>

            <!-- Pendidikan Modal -->
            <div class="modal fade" id="penunjangModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons md-60">post_add</i>
                                </div>
                                <h4 class="card-title">Tambah Usulan</h4>
                              </div>
                          <div class="card-body">
                            <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('kegiatans.store')}}" method="POST">
                                @csrf
                                {{-- <div class="row">
                                    <label class="col-sm-3 col-form-label">Sub Unsur</label>
                                    <div class="col-md-2">
                                        <input type="file" name="surat_pengantar" class="form-control" placeholder=".col-md-3">
                                    </div>

                                    <label class="col-sm-3 col-form-label">Kategori</label>
                                    <div class="col-md-2">
                                        <input type="file" name="tidak_dihukum" class="form-control" placeholder=".col-md-3">
                                    </div>
                                </div> --}}

                                <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <select class="form-control selectpicker" data-live-search="true">
                                            @foreach ($penunjang as $item)
                                            <option  value="{{ $item->id }}">{{ Str::limit($item->kegiatan, 150) }}</option>
                                            @endforeach
                                          </select>
                                      </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <input type="text" class="form-control">
                                      </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="file" name="tidak_dihukum" class="form-control" placeholder="">
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
                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            {!! Form::close() !!}
                          </div>
                    </div>
                </div>
            </div>
            <!--  End Modal -->
          </div>
          <div class="tab-pane" id="konfirmasi">

            <div class="row">
                <div class="col-md-12 card-header text-center font-weight-bold">
                  <h2>Laravel 8 Ajax Book CRUD Tutorial</h2>
                </div>
                <div class="col-md-12 mt-1 mb-2"><button type="button" id="addNewBook" class="btn btn-success">Add</button></div>
                <div class="col-md-12">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Book Title</th>
                          <th scope="col">Book Code</th>
                          <th scope="col">Book Author</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td scope="col">#</td>
                            <td scope="col">Book Title</td>
                            <td scope="col">Book Code</td>
                            <td scope="col">Book Autdor</td>
                            <td scope="col">Action</td>
                          </tr>
                      </tbody>
                    </table>
                     {{-- {!! $books->links() !!} --}}
                </div>
            </div>
        </div>


            <div class="modal fade" id="ajax-book-model" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title" id="ajaxBookModel"></h4>
                        </div>
                        <div class="modal-body">
                        <form action="javascript:void(0)" id="addEditBookForm" name="addEditBookForm" class="form-horizontal" method="POST">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                            {{-- <label for="name" class="col-sm-2 control-label">Book Name</label> --}}
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="title" name="judul" placeholder="Enter Book Name" value="" maxlength="50" required="">
                            </div>
                            </div>
                            <div class="form-group">
                            {{-- <label for="name" class="col-sm-2 control-label">Book Code</label> --}}
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="code" name="nilai" placeholder="Enter Book Code" value="" maxlength="50" required="">
                            </div>
                            </div>
                            <div class="form-group">
                            {{-- <label class="col-sm-2 control-label">Book Author</label> --}}
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="author" name="lampiran" placeholder="Enter author Name" value="" required="">
                            </div>
                            </div>
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="btn-save" value="addNewBook">Save changes
                            </button>
                            </div>
                        </form>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('body-scripts')
<script type="text/javascript">
            $(document).ready(function($){
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#addNewBook').click(function () {
                $('#addEditBookForm').trigger("reset");
                $('#ajaxBookModel').html("Add Book");
                $('#ajax-book-model').modal('show');
            });

            $('body').on('click', '.edit', function () {
                var id = $(this).data('id');

                // ajax
                $.ajax({
                    type:"POST",
                    url: "{{ url('edit-book') }}",
                    data: { id: id },
                    dataType: 'json',
                    success: function(res){
                        $('#ajaxBookModel').html("Edit Book");
                        $('#ajax-book-model').modal('show');
                        $('#id').val(res.id);
                        $('#title').val(res.title);
                        $('#code').val(res.code);
                        $('#author').val(res.author);
                    }
                });
            });
            $('body').on('click', '.delete', function () {
                if (confirm("Delete Record?") == true) {
                var id = $(this).data('id');

                // ajax
                $.ajax({
                    type:"POST",
                    url: "{{ url('delete-book') }}",
                    data: { id: id },
                    dataType: 'json',
                    success: function(res){
                        window.location.reload();
                    }
                });
                }
            });
            $('body').on('click', '#btn-save', function (event) {
                    var id = $("#id").val();
                    var title = $("#title").val();
                    var code = $("#code").val();
                    var author = $("#author").val();
                    $("#btn-save").html('Please Wait...');
                    $("#btn-save"). attr("disabled", true);

                // ajax
                $.ajax({
                    type:"POST",
                    url: "{{ route('pendidikans.store') }}",
                    data: {
                        id:id,
                        judul:judul,
                        nilai:nilai,
                        lampiran:lampiran,
                    },
                    dataType: 'json',
                    success: function(res){
                        window.location.reload();
                    $("#btn-save").html('Submit');
                    $("#btn-save"). attr("disabled", false);
                    }
                });
            });
        });
        </script>
    </script>
data-pendidikan
@endpush
