<div class="row">
    <label class="col-sm-3 ">Periode Penilaian</label>
    <div class="col-sm-2">
        {{tgl_indo($pak->awal)}}
    </div>
    <div class="col-sm-1">
        S/D
    </div>
    <div class="col-sm-2">
        {{tgl_indo($pak->akhir)}}
    </div>
</div>
<br>
<div class="row">
    <label class="col-sm-3 ">Surat Pengantar Dari Sekolah</label>
    <div class="col-sm-2">
        <a target="_blank" href="{{asset('storage/'.$pak->surat_pengantar)}}">Lihat</a>
    </div>
    <div class="col-sm-1">
    </div>
    <label class="col-sm-3 ">Surat Pernyataan Tidak Pernah Di Hukum Disiplin</label>
    <div class="col-sm-2">
        <a target="_blank" href="{{asset('storage/'.$pak->tidak_dihukum)}}">Lihat</a>
    </div>
</div>

<div class="row">
    <label class="col-sm-3 ">DUPAK</label>
    <div class="col-sm-2">
        <a target="_blank" href="{{asset('storage/'.$pak->dupak)}}">Lihat</a>
    </div>
    <div class="col-sm-1">
    </div>
    <label class="col-sm-3 ">Surat Pernyataan Melaksanakan Pembelajaran</label>
    <div class="col-sm-2">
        <a target="_blank" href="{{asset('storage/'.$pak->surat_pembelajaran)}}">Lihat</a>
    </div>
</div>

<div class="row">
    <label class="col-sm-3 ">Surat Pernyataan Melaksanakan Bimbingan/Tugas Tertentu</label>
    <div class="col-sm-2">
        <a target="_blank" href="{{asset('storage/'.$pak->surat_bimbingan_tertentu)}}">Lihat</a>
    </div>
    <div class="col-sm-1">
    </div>
    <label class="col-sm-3 ">Surat Pernyataan Melaksanakan Unsur Penunjang</label>
    <div class="col-sm-2">
        <a target="_blank" href="{{asset('storage/'.$pak->surat_penunjang)}}">Lihat</a>
    </div>
</div>

<div class="row">
    <label class="col-sm-3 ">Surat Pernyataan Melaksanakan PKB</label>
    <div class="col-sm-2">
        <a target="_blank" href="{{asset('storage/'.$pak->surat_pkb)}}">Lihat</a>
    </div>
    <div class="col-sm-1">
    </div>
    <label class="col-sm-3 ">SK Pembagian Tugas Ganjil</label>
    <div class="col-sm-2">
        <a target="_blank" href="{{asset('storage/'.$pak->sk_ganjil)}}">Lihat</a>
    </div>
</div>

<div class="row">
    <label class="col-sm-3 ">SK Pembagian Tugas Genap</label>
    <div class="col-sm-2">
        <a target="_blank" href="{{asset('storage/'.$pak->sk_genap)}}">Lihat</a>
    </div>
    <div class="col-sm-1">
    </div>
    <label class="col-sm-3 "> P A K Terakhir</label>
    <div class="col-sm-2">
        <a target="_blank" href="{{asset('storage/'.$pak->scan_pak)}}">Lihat</a>
    </div>
</div>

<div class="row">
    {{-- <label class="col-sm-3 ">Laporan / form PKG/PKKS</label>
    <div class="col-sm-2">
        <input type="file" required name="pkg" class="form-control" placeholder=".col-sm-3">
    </div> --}}
    {{-- <div class="col-sm-1">
    </div> --}}
    <label class="col-sm-3 ">SKP</label>
    <div class="col-sm-2">
        <a target="_blank" href="{{asset('storage/'.$pak->skp)}}">Lihat</a>
    </div>
</div>


<br>
        <div class="progress progress-line-info">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
              {{-- <span class="sr-only">60% Complete</span> --}}
            </div>
          </div>

        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Info - </b> Berkas Lampiran DUPAK  </span>
          </div>
