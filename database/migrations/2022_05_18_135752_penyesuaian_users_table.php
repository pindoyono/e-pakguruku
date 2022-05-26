<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PenyesuaianUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string("jenis_kelamin")->nullable();
            $table->string("tempat_lahir")->nullable();
            $table->date("tanggal_lahir")->nullable();
            $table->text("alamat_rumah")->nullable();
            $table->string("agama")->nullable();
            $table->string("nuptk")->nullable();
            $table->string("no_sk_cpns")->nullable();
            $table->date("tmt_cpns")->nullable();
            $table->date("tmt_pns")->nullable();
            $table->string("pangkat_golongan")->nullable();
            $table->string("kartu_pegawai")->nullable();
            $table->string("karsu")->nullable();
            $table->string("no_hp")->nullable();
            $table->string("jenis_guru")->nullable();
            $table->string("tugas_tambahan")->nullable();
            $table->string("pendidikan")->nullable();
            $table->string("sekolah")->nullable();
            $table->string("alamat_sekolah")->nullable();
            $table->string("avatar")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users', function (Blueprint $table) {
            //
            $table->string("jenis_kelamin")->nullable();
            $table->string("tempat_lahir")->nullable();
            $table->date("tanggal_lahir")->nullable();
            $table->string("agama")->nullable();
            $table->string("nuptk")->nullable();
            $table->string("no_sk_cpns")->nullable();
            $table->date("tmt_cpns")->nullable();
            $table->date("tmt_pns")->nullable();
            $table->string("pangkat_golongan")->nullable();
            $table->string("kartu_pegawai")->nullable();
            $table->string("karsu")->nullable();
            $table->string("no_hp")->nullable();
            $table->string("jenis_guru")->nullable();
            $table->string("tugas_tambahan")->nullable();
            $table->string("pendidikan")->nullable();
            $table->string("sekolah")->nullable();
            $table->string("alamat_sekolah")->nullable();
            $table->string("alamat_rumah")->nullable();
            $table->string("avatar")->nullable();
        });
    }
}
