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
                        <h4 class="card-title">List Lampiran PKB</h4>
                    </div>

                    <div class="card-body">

                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                                width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>USULAN</th>
                                        <th>Kode</th>
                                        <th>Deskripsi</th>
                                        <th>Saran</th>
                                        <th>Jenis</th>
                                        <th class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>USULAN</th>
                                        <th>Kode</th>
                                        <th>Deskripsi</th>
                                        <th>Saran</th>
                                        <th>Jenis</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($data as $key => $l2pkb)
                                        <tr>
                                            <td>{{ $l2pkb->kegiatan }}</td>
                                            <td>{{ $l2pkb->kode }}</td>
                                            <td>{{ $l2pkb->diskripsi }}</td>
                                            <td>{{ $l2pkb->saran }}</td>
                                            <td>{{ $l2pkb->jenis }}</td>
                                            <td class="td-actions text-right">
                                                {{-- <a class="btn btn-info" href="{{ route('l2pkbs.show',$l2pkb->id) }}"><i class="material-icons">person</i></a> --}}
                                                {{-- <a class="btn btn-primary" href="{{ route('l2pkbs.edit',$l2pkb) }}"><i class="material-icons">edit</i></a> --}}
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['l2pkb.destroy', $l2pkb->id], 'style' => 'display:inline']) !!}
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
    <script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-tagsinput.js"></scrip') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
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
