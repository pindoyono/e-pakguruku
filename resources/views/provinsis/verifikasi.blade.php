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
                            <table class="table table-bordered" style="font-weight: 900">
                                <tbody>
                                    <tr>
                                        <td>
                                            Jumlah Usulan
                                        </td>
                                        <td>
                                            {{ get_juml_guru_pak1('NAIK PANGKAT') + get_juml_guru_pak1('PAK TAHUNAN') }}
                                        </td>
                                        <td>
                                            -
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jumlah NAIK PANGKAT
                                        </td>
                                        <td>
                                            {{ get_juml_guru_pak1('NAIK PANGKAT') }}
                                        </td>
                                        <td>
                                            -
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jumlah PAK Tahunan
                                        </td>
                                        <td>
                                            {{ get_juml_guru_pak1('PAK TAHUNAN') }}
                                        </td>
                                        <td>
                                            -
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jumlah PAK Sudah Dinilai
                                        </td>
                                        <td>
                                            {{ get_jml_dinilai('Sudah Dinilai') }}
                                        </td>
                                        <td>
                                            -
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jumlah PAK yg Belum Dinilai
                                        </td>
                                        <td>
                                            {{ get_juml_guru_pak1('NAIK PANGKAT') + get_juml_guru_pak1('PAK TAHUNAN') - get_jml_dinilai('Sudah Dinilai') }}
                                        </td>
                                        <td>
                                            -
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jumlah PAK Lolos
                                        </td>
                                        <td>
                                            {{ get_jml_lolos('Lolos') }}
                                        </td>
                                        <td>
                                            -
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jumlah PAK Tidak Lolos
                                        </td>
                                        <td>
                                            {{ get_jml_lolos('Tidak Lolos') }}
                                        </td>
                                        <td>
                                            -
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jumlah HAPAK
                                        </td>
                                        <td>
                                            {{ get_jml_hapak() }}
                                        </td>
                                        <td>
                                            -
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="td-actions">
                                            @foreach (get_jml_hapak_list() as $list)
                                                <a class="btn btn-warning" target="_blank"
                                                    href="{{ route('penilais.cetak_hapak', $list->pak_id) }}">{{ $list->pak_id }}</a>
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                                width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nip</th>
                                        <th>no_hp</th>
                                        <th>Naik Pangkat</th>
                                        <th>Periode</th>
                                        <th>Sekolah</th>
                                        <th>No SK</th>
                                        <th>Status</th>
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
                                        <th width="25%">No SK</th>
                                        <th>Status</th>
                                        <th class="text-right" width="15%">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($data as $key => $pak)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $pak->name }}</td>
                                            <td>{{ $pak->username }}</td>
                                            <td>{{ $pak->no_hp }}</td>

                                            <td><label
                                                    class="badge {{ $pak->status_naik_pangkat == 'NAIK PANGKAT' ? 'badge-info' : 'badge-warning' }} ">{{ $pak->status_naik_pangkat }}</label>
                                            </td>
                                            <td>{{ tahun_aja($pak->awal) }}</td>
                                            <td>{{ $pak->sekolah }}</td>
                                            <td class="td-actions">
                                                {!! Form::open(['method' => 'PUT', 'route' => ['provinsis.no_sk', $pak->id], 'style' => 'display:inline']) !!}
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control"
                                                            value="{{ $pak->no_sk == null ? '823.3/ /Disdikbud/KU/I/2023' : $pak->no_sk }}"
                                                            name="no_sk" placeholder="No SK">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="submit" rel="tooltip" class="btn btn-default">
                                                            <i class="material-icons">done</i>
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </td>
                                            <td>
                                                @if ($pak->status == 'Perbaikan')
                                                    <label class="badge badge-primary">{{ $pak->status }}</label>
                                                @elseif ($pak->status == 'Ditolak')
                                                    <label class="badge badge-danger">{{ $pak->status }}</label>
                                                @else
                                                    <label class="badge badge-success">
                                                        {{ $pak->status }}
                                                    </label>
                                                @endif
                                            </td>
                                            <td class="td-actions text-right">

                                                {{-- <a class="btn btn-danger"
                                                    href="{{ route('penilais.vermak', $pak->id) }}"><i
                                                        class="material-icons">recycling</i></a> --}}
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
                                                    <a class="btn btn-danger" target="_blank"
                                                        href="{{ route('penilais.cetak_asli', $pak->id) }}"><i
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
