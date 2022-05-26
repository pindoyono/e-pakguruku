<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paks', function (Blueprint $table) {
            $table->id();
            $table->date("awal")->nullable();
            $table->date("akhir")->nullable();
            $table->string("status")->nullable();
            $table->decimal("pendidikan_sekolah",7,3)->nullable();
            $table->decimal("pelatihan_prajabatan",7,3)->nullable();
            $table->decimal("proses_pembelajaran",7,3)->nullable();
            $table->decimal("proses_bimbingan",7,3)->nullable();
            $table->decimal("tugas_lain",7,3)->nullable();
            $table->decimal("pengembangan_diri",7,3)->nullable();
            $table->decimal("publikasi_ilmiah",7,3)->nullable();
            $table->decimal("karya_inovatif",7,3)->nullable();
            $table->decimal("ijazah_tidak_sesuai",7,3)->nullable();
            $table->decimal("pendukung_tugas_guru",7,3)->nullable();
            $table->decimal("memperoleh_penghargaan",7,3)->nullable();
            $table->string("surat_pengantar")->nullable();
            $table->string("tidak_dihukum")->nullable();
            $table->string("dupak")->nullable();
            $table->string("surat_pembelajaran")->nullable();
            $table->string("surat_bimbingan_tertentu")->nullable();
            $table->string("surat_penunjang")->nullable();
            $table->string("surat_pkb")->nullable();
            $table->string("sk_ganjil")->nullable();
            $table->string("sk_genap")->nullable();
            $table->string("scan_pak")->nullable();
            $table->string("pkg")->nullable();
            $table->string("skp")->nullable();
            $table->unsignedBigInteger('user_id')->default(1);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paks');
    }
}
