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
                        <h3 class="card-title">List Daftar Usulan Penilaian Angka Kredit</h3>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                                width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Naik Pangkat</th>
                                        <th>Periode</th>
                                        <th>Sekolah</th>
                                        <th>Tgl Buat</th>
                                        <th>Status</th>
                                        <th>Lolos?</th>
                                        <th class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Naik Pangkat</th>
                                        <th>Periode</th>
                                        <th>Sekolah</th>
                                        <th>Tgl Buat</th>
                                        <th>Status</th>
                                        <th>Lolos?</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($data as $key => $pak)
                                        <tr>
                                            <th>{{ $i++ }}</th>
                                            <th>{{ $pak->name }}</th>
                                            <th><label
                                                    class="badge {{ $pak->status_naik_pangkat == 'NAIK PANGKAT' ? 'badge-info' : 'badge-warning' }} ">{{ $pak->status_naik_pangkat }}</label>
                                            </th>
                                            <th>{{ tahun_aja($pak->awal) }}</th>
                                            <th>{{ $pak->sekolah }}</th>
                                            <th>{{ $pak->created_at }}</th>
                                            <th>
                                                @if ($pak->status == 'Perbaikan')
                                                    <label class="badge badge-primary">{{ $pak->status }}</label>
                                                @elseif ($pak->status == 'Ditolak')
                                                    <label class="badge badge-danger">{{ $pak->status }}</label>
                                                @else
                                                    <label class="badge badge-success">
                                                        {{ $pak->status }}
                                                    </label>
                                                @endif
                                            </th>
                                            <th><label class="badge badge-primary">{{ lolos($pak->id) }}</label></th>
                                            <td class="td-actions text-right">
                                                <a class="btn btn-success"
                                                    href="{{ route('penilais.pak_detail', $pak->id) }}"><i
                                                        class="material-icons">zoom_in</i></a>
                                                <a class="btn btn-primary" target="_blank"
                                                    href="{{ route('penilais.cetak_berita_acara', $pak->id) }}"><i
                                                        class="material-icons">print</i></a>
                                                @role('admin-prov')
                                                    <a class="btn btn-warning" target="_blank"
                                                        href="{{ route('penilais.cetak_pak', $pak->id) }}"><i
                                                            class="material-icons">print</i></a>
                                                @endrole
                                            </td>
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
