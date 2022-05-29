<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahPenilaianPak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('paks', function (Blueprint $table) {

            $table->decimal("pendidikan_sekolah2",7,3)->nullable();
            $table->decimal("pelatihan_prajabatan2",7,3)->nullable();
            $table->decimal("proses_pembelajaran2",7,3)->nullable();
            $table->decimal("proses_bimbingan2",7,3)->nullable();
            $table->decimal("tugas_lain2",7,3)->nullable();
            $table->decimal("pengembangan_diri2",7,3)->nullable();
            $table->decimal("publikasi_ilmiah2",7,3)->nullable();
            $table->decimal("karya_inovatif2",7,3)->nullable();
            $table->decimal("ijazah_tidak_sesuai2",7,3)->nullable();
            $table->decimal("pendukung_tugas_guru2",7,3)->nullable();
            $table->decimal("memperoleh_penghargaan2",7,3)->nullable();

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
        Schema::drop('paks', function (Blueprint $table) {

            $table->decimal("pendidikan_sekolah2",7,3)->nullable();
            $table->decimal("pelatihan_prajabatan2",7,3)->nullable();
            $table->decimal("proses_pembelajaran2",7,3)->nullable();
            $table->decimal("proses_bimbingan2",7,3)->nullable();
            $table->decimal("tugas_lain2",7,3)->nullable();
            $table->decimal("pengembangan_diri2",7,3)->nullable();
            $table->decimal("publikasi_ilmiah2",7,3)->nullable();
            $table->decimal("karya_inovatif2",7,3)->nullable();
            $table->decimal("ijazah_tidak_sesuai2",7,3)->nullable();
            $table->decimal("pendukung_tugas_guru2",7,3)->nullable();
            $table->decimal("memperoleh_penghargaan2",7,3)->nullable();

        });
    }
}
