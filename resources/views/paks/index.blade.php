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
                    <div class="card-title col-md-12">
                        <div class="pull-right">
                            <h2>
                                <a class="btn btn-sm btn-info" href="{{ route('paks.create') }}">Tambah Dupak</a>
                            </h2>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <h1>
                            <span> Untuk melihat berkas yg sudah di upload silakan klik tombol edit icon pencil warna
                                ungu</span>
                        </h1>
                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                                width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Periode</th>
                                        <th>Status</th>
                                        <th class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Periode</th>
                                        <th>Status</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($data as $key => $pak)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $pak->awal }}</td>
                                            <th>

                                                @if ($pak->status == 'Perbaikan')
                                                    <a href="{{ route('provinsis.pesan_perbaikan', $pak->id) }}"
                                                        target="_blank" rel="noopener noreferrer">
                                                        <label class="badge badge-primary">
                                                            {{ $pak->status }}
                                                            <span class="material-icons">
                                                                zoom_in
                                                            </span>
                                                        </label>
                                                    </a><br>
                                                    untuk melihat pesan perbaikan silakan klik tombol di diatas
                                                @elseif ($pak->status == 'Ditolak')
                                                    <a href="{{ route('provinsis.pesan_perbaikan', $pak->id) }}"
                                                        target="_blank" rel="noopener noreferrer">
                                                        <label class="badge badge-danger">
                                                            {{ $pak->status }}
                                                            <span class="material-icons">
                                                                zoom_in
                                                            </span>
                                                        </label>
                                                    </a>
                                                @else
                                                    <label class="badge badge-success">
                                                        {{ $pak->status }}
                                                    </label>
                                                @endif
                                                <a class="btn btn-success"
                                                    href="{{ route('paks.confirm_terbit', $pak->id) }}">
                                                    Klik Disini
                                                    Jika PAK Periode ini sudah terbit</a>
                                            </th>
                                            <td class="td-actions text-right">

                                                <a class="btn btn-success"
                                                    href="{{ route('paks.cetak_draf_pak', $pak->id) }}">cek draf PAK</a>
                                                <a class="btn btn-primary" href="{{ route('paks.edit', $pak) }}"><i
                                                        class="material-icons">edit</i></a>
                                                @if ($pak->status == 'submit' || $pak->status == 'Perbaikan' || $pak->status == 'Terverifikasi')
                                                    <a class="btn btn-warning"
                                                        href="{{ route('pendidikans.index1', $pak->id) }}"><i
                                                            class="material-icons">attach_file</i></a>
                                                    <a class="btn btn-primary" href="{{ route('paks.edit', $pak) }}"><i
                                                            class="material-icons">edit</i></a>
                                                @else
                                                    {{ 'Tidak Ada Akses Action' }}
                                                @endif
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['paks.destroy', $pak], 'style' => 'display:inline']) !!}
                                                {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} --}}
                                                @if ($pak->status == 'submit' || $pak->status == 'Perbaikan')
                                                    <button type="submit" rel="tooltip" class="btn btn-danger">
                                                        <i class="material-icons">close</i>
                                                        {!! Form::close() !!}
                                                    @else
                                                        {{ 'Tidak Ada Akses Action' }}
                                                @endif
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
