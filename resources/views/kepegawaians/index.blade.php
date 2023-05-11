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
                        <h4 class="card-title">Data Berkas Kepegawaian</h4>
                    </div>
                    @if ($count == 0)
                        <div class="col-md-12">
                            <div class="pull-right">
                                <a class="btn btn-sm btn-info" href="{{ route('kepegawaians.create') }}"> Tambah Berkas</a>
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        @foreach ($data as $key => $kepegawaian)
                            <div class="col-md-12">
                                <div class="table-responsive table-sales">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    NO
                                                </td>
                                                <td>
                                                    Nama Berkas
                                                </td>
                                                <td>Data</td>
                                                <td class="text-right">
                                                    Action
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    SK CPNS
                                                </td>
                                                <td><a target="_blank"
                                                        href="{{ asset('storage/' . $kepegawaian->sk_cpns) }}">Download</a>
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{ route('kepegawaians.edit', $kepegawaian) }}">
                                                        <button class="btn btn-info btn-round btn-sm">
                                                            edit
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    <b>
                                                        <b>Sk pangkat terakhir + PAK kenpa terakhir ( digabung jadi 1 file )
                                                            <br> PAK kenpa adalah PAK yg nilai AK nya tertera pada SK Kenpa
                                                            Terakhir</b>
                                                    </b>
                                                </td>
                                                <td><a target="_blank"
                                                        href="{{ asset('storage/' . $kepegawaian->sk_pangkat) }}">Download</a>
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{ route('kepegawaians.edit', $kepegawaian) }}">
                                                        <button class="btn btn-info btn-round btn-sm">
                                                            edit
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3
                                                </td>
                                                <td>
                                                    <b>
                                                        <b>
                                                            SK Jabfung Pertama + PAK Jabfung bagi kenaikan pangkat pertama (
                                                            digabung jadi 1 file )
                                                            <br>
                                                            PAK jafung adalah PAK yg nilai ak nya tertera pada SK jafung
                                                        </b>
                                                    </b>
                                                </td>
                                                <td><a target="_blank"
                                                        href="{{ asset('storage/' . $kepegawaian->sk_jafung) }}">Download</a>
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{ route('kepegawaians.edit', $kepegawaian) }}">
                                                        <button class="btn btn-info btn-round btn-sm">
                                                            edit
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4
                                                </td>
                                                <td>
                                                    IJAZAH
                                                </td>
                                                <td><a target="_blank"
                                                        href="{{ asset('storage/' . $kepegawaian->ijazah) }}">Download</a>
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{ route('kepegawaians.edit', $kepegawaian) }}">
                                                        <button class="btn btn-info btn-round btn-sm">
                                                            edit
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5
                                                </td>
                                                <td>
                                                    Kartu Pegawai
                                                </td>
                                                <td><a target="_blank"
                                                        href="{{ asset('storage/' . $kepegawaian->karpeg) }}">Download</a>
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{ route('kepegawaians.edit', $kepegawaian) }}">
                                                        <button class="btn btn-info btn-round btn-sm">
                                                            edit
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    6
                                                </td>
                                                <td>
                                                    SK Pengalihan Kab ke Prov
                                                </td>
                                                <td><a target="_blank"
                                                        href="{{ asset('storage/' . $kepegawaian->sk_penyesuaian) }}">Download</a>
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{ route('kepegawaians.edit', $kepegawaian) }}">
                                                        <button class="btn btn-info btn-round btn-sm">
                                                            edit
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    7
                                                </td>
                                                <td>
                                                    Sertifikat Pendidik
                                                </td>
                                                <td><a target="_blank"
                                                        href="{{ asset('storage/' . $kepegawaian->serdik) }}">Download</a>
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{ route('kepegawaians.edit', $kepegawaian) }}">
                                                        <button class="btn btn-info btn-round btn-sm">
                                                            edit
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    8
                                                </td>
                                                <td>
                                                    Bukti Penggunaan Platform Merdeka Mengajar *Laporan penggunaan PMM
                                                    (cantumkan screenshoot dan
                                                    link yg relevan)
                                                </td>
                                                <td><a target="_blank"
                                                        href="{{ asset('storage/' . $kepegawaian->pmm) }}">Download</a>
                                                </td>
                                                <td class="text-right">
                                                    <a href="{{ route('kepegawaians.edit', $kepegawaian) }}">
                                                        <button class="btn btn-info btn-round btn-sm">
                                                            edit
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            {{-- <tr>
                                <td>
                                    6
                                </td>
                                <td>
                                    Surat Pernyataan Khusus GGD
                                </td>
                                <td><a target="_blank" href="{{asset('storage/'.$kepegawaian->sk_penyesuaian)}}">Download</a></td>
                                <td class="text-right">
                                    <a href="{{route('kepegawaians.edit', Crypt::encrypt('sk_penyesuaian'))}}">
                                        <button class="btn btn-info btn-round btn-sm">
                                            edit
                                        </button>
                                    </a>
                                </td>
                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
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
