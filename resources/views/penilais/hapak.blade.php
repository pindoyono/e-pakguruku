<form enctype="multipart/form-data" class="form-horizontal" action="{{ route('users.update_pak', $pak->user_id) }}"
    method="POST">
    @csrf
    <input type="hidden" value="PUT" name="_method">
    <table class="table table-bordered">
        <thead>
        <tbody>
            <tr>
                <td scope="col" colspan="8" class="text-center font-weight-bolder">
                    <h1>Rekapitulasi Penetapan Angka Kredit</h1>
                    <h3>
                        Periode
                    </h3>
                    <h3>
                        {{ tgl_indo($pak->awal) . ' S/D ' . tgl_indo($pak->akhir) }}
                    </h3>
                </td>
            </tr>
            <tr>
                <td scope="col" colspan="4">Unsur / Sub Unsur</td>
                <td scope="col" width="10%">AK Lama(pak Pangkat Terakhir)</td>
                <td scope="col" width="10%">AK Diperoleh</td>
                <td scope="col" width="10%">Total</td>
            </tr>
            <tr>
                <td scope="col" rowspan="13" width="2%" style="vertical-align: top;">1</td>
                <td scope="col" colspan="3">Unsur Utama</td>
                <td scope="col">
                    <input type="number" step="any" name="tertinggal" id="tertinggal"
                        oninput="jml_utama();jml_semua();"
                        value="{{ $user->tertinggal == null ? 0 : $user->tertinggal }}" class="form-control">
                </td>
                <td scope="col">
                    {{ number_format($pak->tetinggal + $pak->tetinggal2 - $user->tetinggal, 3) }}
                </td>
                <td scope="col">
                    {{ number_format($pak->tertinggal + $pak->tertinggal2, 3) }}
                </td>
            </tr>

            {{-- Pendidikan --}}
            <tr>
                <td scope="col" rowspan="3" width="2%" style="vertical-align: top;">A</td>
                <td scope="col" colspan="2">Pendidikan</td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>
            <tr>
                <td scope="col" width="2%">1</td>
                <td scope="col">Pendidikan Sekolah</td>
                <td scope="col">
                    <input type="number" step="any" name="pendidikan_sekolah" id="sekolah"
                        oninput="jml_utama();jml_semua();"
                        value="{{ $user->pendidikan_sekolah != null ? $user->pendidikan_sekolah : 0 }}"
                        class="form-control">
                </td>
                <td scope="col">
                    <span id="jml_sekolah">
                        {{ number_format($pak->pendidikan_sekolah + $pak->pendidikan_sekolah2 - $user->pendidikan_sekolah, 3) }}
                    </span>
                </td>
                <td scope="col">
                    <span id="jml_sekolah">
                        {{ number_format($pak->pendidikan_sekolah + $pak->pendidikan_sekolah2, 3) }}
                    </span>
                </td>
            </tr>
            <tr>
                <td scope="col">2</td>
                <td scope="col">Pelatihan Prajabatan</td>
                <td scope="col">
                    <input type="number" step="any" name="pelatihan_prajabatan" id="pra_jabatan"
                        oninput="jml_utama();jml_semua();"
                        value="{{ $user->pelatihan_prajabatan != null ? $user->pelatihan_prajabatan : 0 }}"
                        class="form-control">
                </td>
                <td scope="col">
                    <span id="jml_pra_jabatan">
                        {{ number_format($pak->pelatihan_prajabatan + $pak->pelatihan_prajabatan2 - $user->pelatihan_prajabatan, 3) }}
                    </span>
                </td>
                <td scope="col">
                    <span id="jml_pra_jabatan">
                        {{ number_format($pak->pelatihan_prajabatan + $pak->pelatihan_prajabatan2, 3) }}
                    </span>
                </td>
            </tr>
            {{-- Pembelajaran / Bimbingan dan Tugas Tertentu --}}
            <tr>
                <td scope="col" rowspan="4" width="2%" style="vertical-align: top;"> B</td>
                <td scope="col" colspan="2">Pembelajaran / Bimbingan dan Tugas Tertentu</td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>
            <tr>
                <td scope="col" width="2%">1</td>
                <td scope="col">Proses Pembelajaran</td>
                <td scope="col">
                    <input type="number" step="any" name="proses_pembelajaran" id="prose_pembelajaran"
                        oninput="jml_utama();jml_semua();"
                        value="{{ $user->proses_pembelajaran != null ? $user->proses_pembelajaran : 0 }}"
                        class="form-control">
                </td>
                <td scope="col">
                    <span id="jml_prose_pembelajaran">
                        {{ number_format($pak->proses_pembelajaran + $pak->proses_pembelajaran2 - $user->proses_pembelajaran, 3) }}
                    </span>
                </td>
                <td scope="col">
                    <span id="jml_prose_pembelajaran">
                        {{ number_format($pak->proses_pembelajaran + $pak->proses_pembelajaran2, 3) }}
                    </span>
                </td>

            </tr>
            <tr>
                <td scope="col">2</td>
                <td scope="col">Proses Bimbingan</td>
                <td scope="col">
                    <input type="number" step="any" name="proses_bimbingan" id="proses_bimbingan"
                        oninput="jml_utama();jml_semua();"
                        value="{{ $user->proses_bimbingan != null ? $user->proses_bimbingan : 0 }}"
                        class="form-control">
                </td>
                <td scope="col">
                    <span id="jml_proses_bimbingan">
                        {{ number_format($pak->proses_bimbingan + $pak->proses_bimbingan2 - $user->proses_bimbingan, 3) }}
                    </span>
                </td>
                <td scope="col">
                    <span id="jml_proses_bimbingan">
                        {{ number_format($pak->proses_bimbingan + $pak->proses_bimbingan2, 3) }}
                    </span>
                </td>
            </tr>
            <tr>
                <td scope="col">3</td>
                <td scope="col">Tugas Lainya</td>
                <td scope="col">
                    <input type="number" step="any" name="tugas_lain" id="tugas_lain"
                        oninput="jml_utama();jml_semua();"
                        value="{{ $user->tugas_lain != null ? $user->tugas_lain : 0 }}" class="form-control">
                </td>
                <td scope="col">
                    <span id="jml_tugas_lain">
                        {{ number_format($pak->tugas_lain + $pak->tugas_lain2 - $user->tugas_lain, 3) }}
                    </span>
                </td>
                <td scope="col">
                    <span id="jml_tugas_lain">
                        {{ number_format($pak->tugas_lain + $pak->tugas_lain2, 3) }}
                    </span>
                </td>
            </tr>

            {{-- Pengembangan Keprofesian Bekelanjutan --}}
            <tr>
                <td scope="col" rowspan="4" width="2%" style="vertical-align: top;"> C</td>
                <td scope="col" colspan="2">Pengembangan Keprofesian Bekelanjutan</td>
                <td scope="col"></td>
                <td scope="col"></td>
                <td scope="col"></td>
            </tr>
            <tr>
                <td scope="col" width="2%">1</td>
                <td scope="col">Pengembangan Diri</td>
                <td scope="col">
                    <input type="number" step="any" name="pengembangan_diri" id="pengembangan_diri"
                        oninput="jml_utama();jml_semua();"
                        value="{{ $user->pengembangan_diri != null ? $user->pengembangan_diri : 0 }}"
                        class="form-control">
                </td>
                <td scope="col">
                    <span id="jml_pengembangan_diri">
                        {{ number_format($pak->pengembangan_diri + $pak->pengembangan_diri2 - $user->pengembangan_diri, 3) }}
                    </span>
                </td>
                <td scope="col">
                    <span id="jml_pengembangan_diri">
                        {{ number_format($pak->pengembangan_diri + $pak->pengembangan_diri2, 3) }}
                    </span>
                </td>
            </tr>
            <tr>
                <td scope="col">2</td>
                <td scope="col">Publikasi Ilmiah</td>
                <td scope="col">
                    <input type="number" step="any" name="publikasi_ilmiah" id="karya_ilmiah"
                        oninput="jml_utama();jml_semua();"
                        value="{{ $user->publikasi_ilmiah != null ? $user->publikasi_ilmiah : 0 }}"
                        class="form-control">
                </td>
                <td scope="col">
                    <span id="jml_karya_ilmiah">
                        {{ number_format($pak->publikasi_ilmiah + $pak->publikasi_ilmiah2 - $user->publikasi_ilmiah, 3) }}
                    </span>
                </td>
                <td scope="col">
                    <span id="jml_karya_ilmiah">
                        {{ number_format($pak->publikasi_ilmiah + $pak->publikasi_ilmiah2, 3) }}
                    </span>
                </td>
            </tr>
            <tr>
                <td scope="col">3</td>
                <td scope="col">Karya Inovatif</td>
                <td scope="col">
                    <input type="number" step="any" name="karya_inovatif" id="karya_inovatif"
                        oninput="jml_utama();jml_semua();"
                        value="{{ $user->karya_inovatif != null ? $user->karya_inovatif : 0 }}" class="form-control">
                </td>
                <td scope="col">
                    <span id="jml_karya_inovatif">
                        {{ number_format($pak->karya_inovatif + $pak->karya_inovatif2 - $user->karya_inovatif, 3) }}
                    </span>
                </td>
                <td scope="col">
                    <span id="jml_karya_inovatif">
                        {{ number_format($pak->karya_inovatif + $pak->karya_inovatif2, 3) }}
                    </span>
                </td>
            </tr>


            <tr>
                <td scope="col" colspan="3">Jumlah Unsur Utama</td>
                <td scope="col">
                    <span id="jml_utama2">
                        {{ number_format(
                            $user->pendidikan_sekolah +
                                $user->pelatihan_prajabatan +
                                $user->proses_pembelajaran +
                                $user->proses_bimbingan +
                                $user->tugas_lain +
                                $user->pengembangan_diri +
                                $user->publikasi_ilmiah +
                                $user->karya_inovatif,
                            3,
                        ) }}
                    </span>
                </td>
                <td scope="col">
                    <span id="jml_utama3">
                        {{ $ak_utama_peroleh_saatini = number_format(
                            $pak->pendidikan_sekolah +
                                $pak->pendidikan_sekolah2 +
                                $pak->pelatihan_prajabatan +
                                $pak->pelatihan_prajabatan2 +
                                $pak->proses_pembelajaran +
                                $pak->proses_pembelajaran2 +
                                $pak->proses_bimbingan +
                                $pak->proses_bimbingan2 +
                                $pak->tugas_lain +
                                $pak->tugas_lain2 +
                                $pak->pengembangan_diri +
                                $pak->pengembangan_diri2 +
                                $pak->publikasi_ilmiah +
                                $pak->publikasi_ilmiah2 +
                                $pak->karya_inovatif +
                                $pak->karya_inovatif2 -
                                ($user->pendidikan_sekolah +
                                    $user->pelatihan_prajabatan +
                                    $user->proses_pembelajaran +
                                    $user->proses_bimbingan +
                                    $user->tugas_lain +
                                    $user->pengembangan_diri +
                                    $user->publikasi_ilmiah +
                                    $user->karya_inovatif),
                            3,
                        ) }}
                    </span>
                </td>
                <td scope="col">
                    <span id="jml_utama3">
                        {{ $ak_utama_total = number_format(
                            $pak->pendidikan_sekolah +
                                $pak->pendidikan_sekolah2 +
                                $pak->pelatihan_prajabatan +
                                $pak->pelatihan_prajabatan2 +
                                $pak->proses_pembelajaran +
                                $pak->proses_pembelajaran2 +
                                $pak->proses_bimbingan +
                                $pak->proses_bimbingan2 +
                                $pak->tugas_lain +
                                $pak->tugas_lain2 +
                                $pak->pengembangan_diri +
                                $pak->pengembangan_diri2 +
                                $pak->publikasi_ilmiah +
                                $pak->publikasi_ilmiah2 +
                                $pak->karya_inovatif +
                                $pak->karya_inovatif2,
                            3,
                        ) }}
                    </span>
                </td>
            </tr>

            {{-- Unsur Penunjang --}}
            <tr>
                <td scope="col" rowspan="5" width="2%" style="vertical-align: top;">2</td>
                <td scope="col" colspan="3">Unsur Penunjang</td>
                <td scope="col">
                    {{-- <input type="number" step="any"  id="" oninput="jml_utama()" value="" class="form-control"> --}}
                </td>
                <td scope="col">
                    {{-- <input type="number" step="any"  id="" oninput="jml_utama()" value="" class="form-control"> --}}
                </td>
                <td scope="col">
                    {{-- <input type="number" step="any"  id="" oninput="jml_utama()" value="" class="form-control"> --}}
                </td>
            </tr>

            <tr>
                <td scope="col width="2%">A</td>
                <td scope="col" colspan="2">Ijazah Tidak Sesuai</td>
                <td scope="col">
                    <input type="number" step="any" name="ijazah_tidak_sesuai" id="ijazah_tidak_sesuai"
                        oninput="jml_penunjang();jml_semua();"
                        value="{{ $user->ijazah_tidak_sesuai != null ? $user->ijazah_tidak_sesuai : 0 }}"
                        class="form-control">
                </td>
                <td scope="col">
                    <span id="jml_ijazah_tidak_sesuai">
                        {{ number_format($pak->ijazah_tidak_sesuai + $pak->ijazah_tidak_sesuai2 - $user->ijazah_tidak_sesuai, 3) }}
                    </span>
                </td>
                <td scope="col">
                    <span id="jml_ijazah_tidak_sesuai">
                        {{ number_format($pak->ijazah_tidak_sesuai + $pak->ijazah_tidak_sesuai2, 3) }}
                    </span>
                </td>
            </tr>
            <tr>
                <td scope="col width="2%">C</td>
                <td scope="col" colspan="2">Pendukung Tugas Guru</td>
                <td scope="col">
                    <input type="number" step="any" name="pendukung_tugas_guru" id="pendukung_tugas_guru"
                        oninput="jml_penunjang();jml_semua();"
                        value="{{ $user->pendukung_tugas_guru != null ? $user->pendukung_tugas_guru : 0 }}"
                        class="form-control">
                </td>
                <td scope="col">
                    <span id="jml_pendukung_tugas_guru">
                        {{ number_format($pak->pendukung_tugas_guru + $pak->pendukung_tugas_guru2 - $user->pendukung_tugas_guru, 3) }}
                    </span>
                </td>
                <td scope="col">
                    <span id="jml_pendukung_tugas_guru">
                        {{ number_format($pak->pendukung_tugas_guru + $pak->pendukung_tugas_guru2, 3) }}
                    </span>
                </td>
            </tr>
            <tr>
                <td scope="col width="2%">B</td>
                <td scope="col" colspan="2">Memperoleh Penghargaan</td>
                <td scope="col">
                    <input type="number" step="any" name="memperoleh_penghargaan" id="penghargaan"
                        oninput="jml_penunjang();jml_semua();"
                        value="{{ $user->memperoleh_penghargaan != null ? $user->memperoleh_penghargaan : 0 }}"
                        class="form-control">
                </td>
                <td scope="col">
                    <span id="jml_penghargaan">
                        {{ number_format(
                            $pak->memperoleh_penghargaan + $pak->memperoleh_penghargaan2 - $user->memperoleh_penghargaan,
                            3,
                        ) }}
                    </span>
                </td>
                <td scope="col">
                    <span id="jml_penghargaan">
                        {{ number_format($pak->memperoleh_penghargaan + $pak->memperoleh_penghargaan2, 3) }}
                    </span>
                </td>
            </tr>
            <tr>
                <td scope="col" colspan="3">Jumlah Unsur Penunjang</td>
                <td scope="col">
                    <span id="jml_penunjang">
                        {{ $ak_penunjang_akhir = number_format(
                            $user->ijazah_tidak_sesuai + $user->pendukung_tugas_guru + $user->memperoleh_penghargaan,
                            3,
                        ) }}
                    </span>
                </td>
                <td scope="col">
                    <span id="jml_penunjang3">
                        {{ $ak_penunjang = number_format(
                            $pak->ijazah_tidak_sesuai +
                                $pak->ijazah_tidak_sesuai2 +
                                $pak->pendukung_tugas_guru +
                                $pak->pendukung_tugas_guru2 +
                                $pak->memperoleh_penghargaan +
                                $pak->memperoleh_penghargaan2 -
                                ($user->ijazah_tidak_sesuai + $user->pendukung_tugas_guru + $user->memperoleh_penghargaan),
                            3,
                        ) }}
                    </span>
                </td>
                <td scope="col">
                    <span id="jml_penunjang3">
                        {{ $ak_penunjang = number_format(
                            $pak->ijazah_tidak_sesuai +
                                $pak->ijazah_tidak_sesuai2 +
                                $pak->pendukung_tugas_guru +
                                $pak->pendukung_tugas_guru2 +
                                $pak->memperoleh_penghargaan +
                                $pak->memperoleh_penghargaan2,
                            3,
                        ) }}
                    </span>
                </td>
            </tr>
            <tr>
                <td scope="col" colspan="4">Jumlah Unsur Utama & Penunjang</td>
                <td scope="col">
                    <span id="jml_semua">
                        {{ $ak_terakhir = number_format(
                            $user->pendidikan_sekolah +
                                $user->pelatihan_prajabatan +
                                $user->proses_pembelajaran +
                                $user->proses_bimbingan +
                                $user->tugas_lain +
                                $user->pengembangan_diri +
                                $user->publikasi_ilmiah +
                                $user->karya_inovatif +
                                $user->ijazah_tidak_sesuai +
                                $user->pendukung_tugas_guru +
                                $user->memperoleh_penghargaan +
                                $user->tertinggal,
                            3,
                            '.',
                            '',
                        ) }}
                    </span>
                </td>
                <td scope="col">
                    <span id="jml_semua3">
                        {{ $ak_diperoleh_saatini = number_format(
                            $pak->pendidikan_sekolah +
                                $pak->pendidikan_sekolah2 +
                                $pak->pelatihan_prajabatan +
                                $pak->pelatihan_prajabatan2 +
                                $pak->proses_pembelajaran +
                                $pak->proses_pembelajaran2 +
                                $pak->proses_bimbingan +
                                $pak->proses_bimbingan2 +
                                $pak->tugas_lain +
                                $pak->tugas_lain2 +
                                $pak->pengembangan_diri +
                                $pak->pengembangan_diri2 +
                                $pak->publikasi_ilmiah +
                                $pak->publikasi_ilmiah2 +
                                $pak->karya_inovatif +
                                $pak->karya_inovatif2 +
                                $pak->ijazah_tidak_sesuai +
                                $pak->ijazah_tidak_sesuai2 +
                                $pak->pendukung_tugas_guru +
                                $pak->pendukung_tugas_guru2 +
                                $pak->memperoleh_penghargaan +
                                $pak->memperoleh_penghargaan2 +
                                $pak->tertinggal +
                                $pak->tertinggal2 -
                                ($user->pendidikan_sekolah +
                                    $user->pelatihan_prajabatan +
                                    $user->proses_pembelajaran +
                                    $user->proses_bimbingan +
                                    $user->tugas_lain +
                                    $user->pengembangan_diri +
                                    $user->publikasi_ilmiah +
                                    $user->karya_inovatif +
                                    $user->ijazah_tidak_sesuai +
                                    $user->pendukung_tugas_guru +
                                    $user->memperoleh_penghargaan +
                                    $user->tertinggal),
                            3,
                            '.',
                            '',
                        ) }}
                    </span>
                </td>
                <td scope="col">
                    <span id="jml_semua3">
                        {{ $ak_diperoleh = number_format(
                            $pak->pendidikan_sekolah +
                                $pak->pendidikan_sekolah2 +
                                $pak->pelatihan_prajabatan +
                                $pak->pelatihan_prajabatan2 +
                                $pak->proses_pembelajaran +
                                $pak->proses_pembelajaran2 +
                                $pak->proses_bimbingan +
                                $pak->proses_bimbingan2 +
                                $pak->tugas_lain +
                                $pak->tugas_lain2 +
                                $pak->pengembangan_diri +
                                $pak->pengembangan_diri2 +
                                $pak->publikasi_ilmiah +
                                $pak->publikasi_ilmiah2 +
                                $pak->karya_inovatif +
                                $pak->karya_inovatif2 +
                                $pak->ijazah_tidak_sesuai +
                                $pak->ijazah_tidak_sesuai2 +
                                $pak->pendukung_tugas_guru +
                                $pak->pendukung_tugas_guru2 +
                                $pak->memperoleh_penghargaan +
                                $pak->memperoleh_penghargaan2 +
                                $pak->tertinggal +
                                $pak->tertinggal2,
                            3,
                            '.',
                            '',
                        ) }}
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
    </table>


    <button type="submit" class="btn btn-sm btn-success col-sm-12">
        <span class="btn-label">
            <i class="material-icons">check</i>
        </span>
        Hitung
        <div class="ripple-container"></div>
    </button>

    {!! Form::close() !!}


    <table class="table table-bordered">
        <tbody>
            <tr>
                <td scope="col" colspan="8" class="text-center font-weight-bolder">
                    <h1>Rekapitulasi Perhitungan Naik Pangkat</h1>
                </td>
            </tr>
            <tr>
                <td rowspan="2">Uraian</td>
                <td rowspan="2">Angka Kredit Komulatif</td>
                <td colspan="3">Unsur Utama</td>
                <td rowspan="2">Unsur Penunjang Maksimal 10%</td>
            </tr>
            <tr>
                <td>Utama (90%)</td>
                <td>PD</td>
                <td>PI/KI</td>
            </tr>
            <tr>
                <td>AK Yang Di Peroleh</td>
                <td>
                    {{ $ak_diperoleh }}
                </td>
                <td>
                    {{ number_format($ak_utama_total - (90 / 100) * $jabatan_pak->target_sebelum + $daerah_tertinggal, 3, '.', '') }}
                </td>
                <td>
                    {{ $ak_pd = number_format(
                        $pak->pengembangan_diri + $pak->pengembangan_diri2 - $user->pengembangan_diri,
                        3,
                        '.',
                        '',
                    ) }}
                </td>
                <td>
                    {{ $ak_piki = number_format(
                        $pak->publikasi_ilmiah +
                            $pak->publikasi_ilmiah2 +
                            $pak->karya_inovatif +
                            $pak->karya_inovatif2 -
                            $user->publikasi_ilmiah -
                            $user->karya_inovatif,
                        3,
                    ) }}
                </td>
                <td>
                    {{ $ak_penunjang - $ak_penunjang_akhir }}
                </td>
            </tr>
            <tr>
                <td>AK Yang Wajib Peroleh</td>
                <td>{{ $jabatan_pak->target }}</td>
                <td>{{ (90 / 100) * $jabatan_pak->akk }}</td>
                <td>{{ $jabatan_pak->akpkbpd }}</td>
                <td>{{ $jabatan_pak->akpkbpiki }}</td>
                <td>{{ $jabatan_pak->akp }}</td>
            </tr>

            @php $jml_1 = number_format($ak_diperoleh - $jabatan_pak->target,3, '.', '')  @endphp
            @php $jml_4 = number_format((($ak_utama_total - (90/100*$jabatan_pak->target_sebelum)) - (90/100*$jabatan_pak->akk) ) + ($daerah_tertinggal),3, '.', '') @endphp
            @php $jml_2 = number_format($ak_pd - $jabatan_pak->akpkbpd,3, '.', '') @endphp
            @php $jml_3 = number_format($ak_piki - $jabatan_pak->akpkbpiki,3, '.', '') @endphp
            @php
                $jml_5 = number_format($ak_penunjang - $ak_penunjang_akhir - $jabatan_pak->akp, 3);
                
                if ($jml_1 >= 0 && $jml_2 >= 0 && $jml_3 >= 0 && $jml_4 >= 0 && $jml_5 <= 0) {
                    $naik_pangkat = 1;
                } else {
                    $naik_pangkat = 0;
                }
            @endphp

            <tr style="font-weight: 900">
                <td>Kelebihan/Kekurangan</td>
                <td style="{{ $jml_1 >= 0 ? 'color: green;' : 'color: red;' }}">{{ $jml_1 }}</td>
                <td style="{{ $jml_4 >= 0 ? 'color: green;' : 'color: red;' }}">{{ $jml_4 }}</td>
                <td style="{{ $jml_2 >= 0 ? 'color: green;' : 'color: red;' }}">{{ $jml_2 }}</td>
                <td style="{{ $jml_3 >= 0 ? 'color: green;' : 'color: red;' }}">{{ $jml_3 }}</td>
                <td style="{{ $jml_5 <= 0 ? 'color: green;' : 'color: red;' }}">{{ $jml_5 }}</td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr style="font-weight: 900">
                <td>Masa Kerja Golongan -</td>
                <td
                    style=" {{ masa_kerja_tahun(\Carbon\Carbon::parse(date('Y') . '-' . get_periode() . '-1'), $user->tmt_pns) >= 2 ? 'color: green;' : 'color: red;' }}">
                    {{ masa_kerja(\Carbon\Carbon::parse(date('Y') . '-' . get_periode() . '-1'), $user->tmt_pns) }}
                </td>

                <td colspan="4"> TMT pangkat Terakhir ( {{ tgl_indo($user->tmt_pns) }} )</td>
            </tr>
            @if ($jabatan_pak->id >= 4)
                <tr style="font-weight: 900">
                    <td>Karya Inovatif Maksimal 50% <br> (3d Keatas)</td>
                    <td
                        style="{{ $pak->karya_inovatif + $pak->karya_inovatif2 - $user->karya_inovatif <= (50 / 100) * $jabatan_pak->akpkbpiki ? 'color: green;' : 'color: red;' }}">
                        Perolehan ({{ $pak->karya_inovatif + $pak->karya_inovatif2 - $user->karya_inovatif }}) </td>
                    <td colspan="4"> Maksimal Karya Inovatif Yg di Bolehkan (
                        {{ (50 / 100) * $jabatan_pak->akpkbpiki }}
                        )</td>
                </tr>

                @if ($jabatan_pak->id == 4)
                    <tr style="font-weight: 900">
                        <td>Laporan Hasil Penelitian <br> (IIId -> 4a)</td>
                        <td style="{{ $pak->lap_pi == 'Ada' ? 'color: green;' : 'color: red;' }}"> Perolehan
                            ({{ $pak->lap_pi == 'Ada' ? 'Ada' : 'Tidak Ada' }}) </td>
                        <td colspan="4"> Wajib memiliki minimal 1 Laporan Hasil Penelitian
                            <a class="btn btn-primary" href="{{ route('provinsis.lap_pi', $pak->id) }}">
                                <span class="btn-label">
                                    <i class="material-icons">done_all</i>
                                </span>
                                <div class="ripple-container"></div>
                            </a>
                        </td>
                    </tr>
                @endif

                @if ($jabatan_pak->id == 5)
                    <tr style="font-weight: 900">
                        <td>Laporan Hasil Penelitian <br> (4a -> 4b)</td>
                        <td style="{{ $pak->lap_pi == 'Ada' ? 'color: green;' : 'color: red;' }}"> Perolehan
                            ({{ $pak->lap_pi == 'Ada' ? 'Ada' : 'Tidak Ada' }}) </td>
                        <td colspan="4"> Wajib memiliki minimal 1 Laporan Hasil Penelitian
                            <a class="btn btn-primary" href="{{ route('provinsis.lap_pi', $pak->id) }}">
                                <span class="btn-label">
                                    <i class="material-icons">done_all</i>
                                </span>
                                <div class="ripple-container"></div>
                            </a>
                        </td>
                    </tr>
                    <tr style="font-weight: 900">
                        <td>Jurnal Ilmiah <br> (4a -> 4b)</td>
                        <td style="{{ $pak->jurnal == 'Ada' ? 'color: green;' : 'color: red;' }}"> Perolehan
                            ({{ $pak->jurnal == 'Ada' ? 'Ada' : 'Tidak Ada' }}) </td>
                        <td colspan="4"> Wajib memiliki minimal 1 Jurnal Ilmiah
                            <a class="btn btn-primary" href="{{ route('provinsis.jurnal', $pak->id) }}">
                                <span class="btn-label">
                                    <i class="material-icons">done_all</i>
                                </span>
                                <div class="ripple-container"></div>
                            </a>
                        </td>
                    </tr>
                @endif

            @endif
        </tbody>
    </table>



    <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('provinsis.saran', $pak_id) }}"
        method="POST">
        @csrf
        <input type="hidden" value="PUT" name="_method">

        {{-- <textarea name='saran' cols="125" rows="15">
        @if ($pak->saran == null)
        Isi Pesan dan Saran Untuk perbaikan hapak
        @else
        {{ $pak->saran }}
        @endif
     </textarea> --}}
        @if ($user->id != Auth::user()->id)
            {{-- <button type="submit" onclick="alert('Pastikan nilai AK lama Sesuai dengan PAK Pangkat yg bersangkutan')" class="btn btn-success">
    <span class="btn-label">
      <i class="material-icons">check</i>
    </span>
    Simpan
    <div class="ripple-container"></div>
</button> --}}

            <a class="btn btn-primary" target="_blank" href="{{ route('penilais.cetak_hapak', $pak->id) }}">
                <span class="btn-label">
                    <i class="material-icons">print</i>
                </span>
                Cetak
                <div class="ripple-container"></div>
            </a>

            <a class="btn btn-warning" target="_blank" href="{{ route('l2pkb.index', $pak->id) }}">
                <span class="btn-label">
                    <i class="material-icons">attach_file</i>
                </span>
                L2PKB
                <div class="ripple-container"></div>
            </a>
        @else
            <h2 style="font-weight: bold">
                Tidak Bisa Buat Hapak
            </h2>
        @endif

        {!! Form::close() !!}


        @push('body-scripts')
        @endpush
