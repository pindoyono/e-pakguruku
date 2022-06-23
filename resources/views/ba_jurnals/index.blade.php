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

            <div class="col-md-12">
                            <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('ba_jurnals.store',$pak_id)}}" method="POST">
                @csrf
                <div class="row">
                    <label class="col-sm-2 col-form-label">Judul dan Tahun</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                        <input class="form-control"  placeholder="Judul dan Tahun" type="text" name="judul"  required="true" aria-required="">
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
            {!! Form::close() !!}

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
                    <th>Judul</th>
                    <th class="disabled-sorting text-right">Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th class="disabled-sorting text-right">Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $key => $ba)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$ba->judul}}</td>
                        <td class="td-actions text-right">
                            {{-- <a class="btn btn-info" href="{{ route('bas.show',$ba->id) }}"><i class="material-icons">person</i></a> --}}
                            {{-- <a class="btn btn-primary" href="{{ route('bas.edit',$ba) }}"><i class="material-icons">edit</i></a> --}}
                            {!! Form::open(['method' => 'DELETE','route' => ['ba_jurnals.destroy', $ba->id],'style'=>'display:inline']) !!}
                                <button type="submit" rel="tooltip" class="btn btn-danger">
                                    <i class="material-icons">close</i>
                            {!! Form::close() !!}
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
