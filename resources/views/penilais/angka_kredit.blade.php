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
          </div>
          {{-- <div class="card-title col-md-12">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-3">
                    <br>
                    <input clas="col-sm-5" type="file" name="file" class="form-control">
                </div>

                <button class="btn btn-sm btn-success">Import User Data</button>
                <a class="btn btn-sm btn-warning" href="{{ route('export') }}">Export User Data</a>
                <a class="btn btn-sm btn-info" href="{{ route('users.create') }}"> Create New User</a>
            </form>
          </div> --}}
            {{-- <div class="col-md-12">
                <div class="pull-right">
                    <a class="btn btn-sm btn-info" href="{{ route('kegiatans.create') }}"> Tambah Kegiatan</a>
                </div>
            </div> --}}
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <div class="material-datatables">
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
                  </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $key => $kegiatan)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{$kegiatan->unsur}}</td>
                            <td>{{$kegiatan->sub_unsur}}</td>
                            <td>{{$kegiatan->kegiatan}}</td>
                            <td>{{$kegiatan->kode}}</td>
                            <td>{{$kegiatan->satuan_hasil}}</td>
                            <td>{{$kegiatan->angka_kredit}} AK</td>
                            <td>{{$kegiatan->pelaksana}}</td>
                        </tr>
                        @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- end content-->
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
