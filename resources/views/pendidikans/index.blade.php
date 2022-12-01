@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2></h2>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">assignment</i>
            </div>
            <h4 class="card-title">List Lampiran Usulan</h4>
            <div class="pull-right">
                <a class="btn btn-sm btn-info" href="{{ route('pendidikans.create1', $pak_id) }}"> Tambah Usulan</a>
            </div>
          </div>
            <div class="card-body">
                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Sub Unsur</th>
                        <th>Kegiatan</th>
                        <th>Kode</th>
                        <th>Nilai AK</th>
                        <th>Lampiran</th>
                        <th class="disabled-sorting text-right">Actions</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Sub Unsur</th>
                        <th>Kegiatan</th>
                        <th>Kode</th>
                        <th>Nilai AK</th>
                        <th>Lampiran</th>
                        <th class="text-right">Actions</th>
                      </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($pendidikan as $lampiran)
                            <tr>
                                 <td>{{ ++$i }}</td>
                                <td>{{$lampiran->sub_unsur}}</td>
                                <td>{{$lampiran->kegiatan}}</td>
                                <td>{{$lampiran->kode}}</td>
                                <td>{{$lampiran->nilai}}</td>
                                <td>
                                    <a target="_blank" href="{{asset('storage/'.$lampiran->lampiran)}}"> Lihat </a>
                                </td>
                                <td class="td-actions text-right">
                                    <a class="btn btn-primary" href="{{ route('pendidikans.edit1',$lampiran->id) }}"><i class="material-icons">edit</i></a>
                                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['pendidikans.destroy1', $lampiran->id],'style'=>'display:inline']) !!}
                                        <button type="submit" rel="tooltip" class="btn btn-danger">
                                            <i class="material-icons">close</i>
                                    {!! Form::close() !!} --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <div class="progress progress-line-info">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                      {{-- <span class="sr-only">60% Complete</span> --}}
                    </div>
                  </div>

                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> Info - </b> Table dibawah ini adalah Rekapan Daftar Usulan PAK yg sudah anda Upload..
                      silahkan Cek kembali jika dirasa ada tidak sesuai silahkan perbaiki melalui menu di atas  </span>
                  </div>
                  {{-- <div class="pull-right">
                    <a class="btn btn-sm btn-success" href="{{ route('pendidikans.exporDupak', $pak_id) }}"> export xsl</a>
                </div> --}}
                  @include('pendidikans.dupak')
            </div>
        </div>
        <!--  end card  -->
      </div>
      <!-- end col-md-12 -->
    </div>
    <!-- end row -->
  </div>
</div>

@endsection



@push('body-scripts')
<script src="{{asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
<script>
    $(document).ready(function() {
      $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }
      });

      var table = $('#datatable').DataTable();

      // Edit record
      table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
      });

      // Delete a record
      table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
      });

      //Like record
      table.on('click', '.like', function() {
        alert('You clicked on Like button');
      });
    });
  </script>

@endpush
