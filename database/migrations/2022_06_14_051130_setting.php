<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Setting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_berita_acara_atas')->useCurrent()->nullable();
            $table->date('tgl_berita_acara_ttd')->useCurrent()->nullable();
            $table->string('hari_ba')->nullable();
            $table->date('tgl_hapak_atas')->useCurrent()->nullable();
            $table->date('awal_hapak')->useCurrent()->nullable();
            $table->date('akhir_hapak')->useCurrent()->nullable();
            $table->date('tgl_hapak_ttd')->useCurrent()->nullable();
            $table->date('tgl_pak_ttd')->useCurrent()->nullable();

            $table->string('kadis')->nullable();
            $table->string('nama_kadis')->nullable();
            $table->string('jabatan_kadis')->nullable();
            $table->string('nip_kadis')->nullable();

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
        //
        Schema::dropIfExists('settings');

    }
}
