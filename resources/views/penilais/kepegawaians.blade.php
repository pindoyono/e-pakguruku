@foreach ($kepegawaians as $key => $kepegawaian)
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
                    </tr>

                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            SK CPNS
                        </td>
                        <td><a target="_blank" href="{{ asset('storage/' . $kepegawaian->sk_cpns) }}">Lihat</a></td>
                    </tr>
                    <tr>
                        <td>
                            2
                        </td>
                        <td>
                            SK Pangkat Terakhir
                        </td>
                        <td><a target="_blank" href="{{ asset('storage/' . $kepegawaian->sk_pangkat) }}">Lihat</a></td>
                    </tr>
                    <tr>
                        <td>
                            3
                        </td>
                        <td>
                            SK Jafung Terakhir
                        </td>
                        <td><a target="_blank" href="{{ asset('storage/' . $kepegawaian->sk_jafung) }}">Lihat</a></td>
                    </tr>
                    <tr>
                        <td>
                            4
                        </td>
                        <td>
                            IJAZAH
                        </td>
                        <td><a target="_blank" href="{{ asset('storage/' . $kepegawaian->ijazah) }}">Lihat</a></td>
                    </tr>
                    <tr>
                        <td>
                            5
                        </td>
                        <td>
                            Kartu Pegawai
                        </td>
                        <td><a target="_blank" href="{{ asset('storage/' . $kepegawaian->karpeg) }}">Lihat</a></td>
                    </tr>
                    <tr>
                        <td>
                            6
                        </td>
                        <td>
                            SK Pengalihan Kab ke Prov
                        </td>
                        <td><a target="_blank" href="{{ asset('storage/' . $kepegawaian->sk_penyesuaian) }}">Lihat</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            6
                        </td>
                        <td>
                            Sertifikat Pendidik
                        </td>
                        <td><a target="_blank" href="{{ asset('storage/' . $kepegawaian->serdik) }}">Lihat</a></td>
                    </tr>
                    <tr>
                        <td>
                            6
                        </td>
                        <td>
                            Platform Merdeka Mengajar
                        </td>
                        <td><a target="_blank" href="{{ asset('storage/' . $kepegawaian->pmm) }}">Lihat</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endforeach
