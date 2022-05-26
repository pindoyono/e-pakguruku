@extends('layouts.app')

@section("content")


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-text" data-background-color="green">
                    <h4 class="card-title">Form Tambah Jabatan</h4>
                </div>
                <div class="card-content">
                    <div class="col-12 text-right">
                        <a href="{{route('jabatans.index')}}" class="btn btn-success">List Jabatan <div class="ripple-container"></div></a>
                    </div>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('jabatans.update', [$jabatans->id])}}" method="POST">

                        @csrf
                        <!-- <div class="row">
                            <label class="col-sm-2 label-on-left">Jabatan</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control"  placeholder="Jabatan" type="text" name="jabatan"  required="true" aria-required="true">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div> -->
                        <input type="hidden" value="PUT" name="_method">
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Jabatan</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <select class="js-example-basic-single form-control"  width="70%" name="jabatan" >
                                        <option value="">Pilih Jabatan</option>
                                        <option {{$jabatans->jabatan == "Guru Pertama" ? "selected" : ""}} value="Guru Pertama">Guru Pertama</option>
                                        <option {{$jabatans->jabatan == "Guru Muda" ? "selected" : ""}} value="Guru Muda">Guru Muda</option>
                                        <option {{$jabatans->jabatan == "Guru Madya" ? "selected" : ""}} value="Guru Madya">Guru Madya</option>
                                        <option {{$jabatans->jabatan == "Guru Utama" ? "selected" : ""}} value="Guru Utama">Guru Utama</option>
                                    </select>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Pangkat/Golongan</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <select class="js-example-basic-single form-control"  width="70%" name="pangkat" >
                                        <option value="">Pilih Pangkat</option>
                                        <option {{$jabatans->pangkat == "Penata Muda, III a" ? "selected" : ""}} value="Penata Muda, III a">Penata Muda, III a</option>
                                        <option {{$jabatans->pangkat == "Penata Muda Tk I, III b" ? "selected" : ""}} value="Penata Muda Tk I, III b">Penata Muda Tk I, III b</option>
                                        <option {{$jabatans->pangkat == "Penata, III c" ? "selected" : ""}} value="Penata, III c">Penata, III c</option>
                                        <option {{$jabatans->pangkat == "Penata Tk. I / III d" ? "selected" : ""}} value="Penata Tk. I / III d">Penata Tk. I / III d</option>
                                        <option {{$jabatans->pangkat == "Pembina , IV a" ? "selected" : ""}} value="Pembina , IV a">Pembina , IV a</option>
                                        <option {{$jabatans->pangkat == "Pembina Tk. I, IV b" ? "selected" : ""}} value="Pembina Tk. I, IV b">Pembina Tk. I, IV b</option>
                                        <option {{$jabatans->pangkat == "Pembina Utama Muda , IV c" ? "selected" : ""}} value="Pembina Utama Muda , IV c">Pembina Utama Muda , IV c</option>
                                        <option {{$jabatans->pangkat == "Pembina Utama Madya, IV d" ? "selected" : ""}} value="Pembina Utama Madya, IV d">Pembina Utama Madya, IV d</option>
                                        <option {{$jabatans->pangkat == "Pembina Utama, IV e" ? "selected" : ""}} value="Pembina Utama, IV e">Pembina Utama, IV e</option>
                                    </select>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Target</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" value="{{$jabatans->target}}"  placeholder="Target Angka Kredit  Untuk Kenaikan Pangkat" type="text" name="target"  required="true" aria-required="true">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">AKK</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control"  value="{{$jabatans->akk}}" placeholder="Nilai AKK" type="text" name="akk"  required="true" aria-required="true">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">AKPKB PD</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" value="{{$jabatans->akpkbpd}}"  placeholder="AKPKB PD" type="text" name="akpkbpd"  required="true" aria-required="true">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">AKPKB PI/KI</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" value="{{$jabatans->akpkbpiki}}" placeholder="AKPKB PI/KI" type="text" name="akpkbpiki"  required="true" aria-required="true">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">AKP</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" value="{{$jabatans->akp}}"  placeholder="AKP" type="text" name="akp"  required="true" aria-required="true">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>

                        <input class="btn btn-primary" type="submit" value="Save"/>
                    </form>
                <div>
            </div>
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->
</div>

@endsection


@section('js')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endsection
