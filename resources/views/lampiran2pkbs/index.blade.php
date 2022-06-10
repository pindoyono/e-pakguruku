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
            <h4 class="card-title">List Lampiran 2 PKB</h4>
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
            <div class="col-md-12">
                <div class="pull-right">
                    @role('super-admin')
                    <a class="btn btn-sm btn-info" href="{{ route('kegiatans.create') }}"> Tambah Kegiatan</a>
                    @endrole
                </div>
            </div>
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <div class="material-datatables">
              <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Jenis</th>
                    <th>Deskripsi</th>
                    <th>Saran</th>
                    <th class="disabled-sorting text-right">Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Jenis</th>
                    <th>Deskripsi</th>
                    <th>Saran</th>
                    <th class="disabled-sorting text-right">Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $key => $lampiran2pkb)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{$lampiran2pkb->kode}}</td>
                            <td>{{$lampiran2pkb->jenis}}</td>
                            <td>{{$lampiran2pkb->diskripsi}}</td>
                            <td>{{$lampiran2pkb->saran}}</td>

                            <td class="td-actions text-right">
                                @role('super-admin')
                                {{-- <a class="btn btn-info" href="{{ route('lampiran2pkbs.show',$lampiran2pkb->id) }}"><i class="material-icons">person</i></a> --}}
                                <a class="btn btn-primary" href="{{ route('lampiran2pkbs.edit',$lampiran2pkb) }}"><i class="material-icons">edit</i></a>
                                {!! Form::open(['method' => 'DELETE','route' => ['lampiran2pkbs.destroy', $lampiran2pkb],'style'=>'display:inline']) !!}
                                    {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}
                                    <button type="submit" rel="tooltip" class="btn btn-danger">
                                        <i class="material-icons">close</i>
                                {!! Form::close() !!}
                                @endrole

                            </td>
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
