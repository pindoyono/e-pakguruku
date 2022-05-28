<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahAkPangkatTerakhirDiUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('users', function (Blueprint $table) {
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
        });
    }
}
