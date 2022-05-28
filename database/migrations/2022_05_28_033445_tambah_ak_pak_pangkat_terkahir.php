<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahAkPakPangkatTerkahir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('kepegawaians', function (Blueprint $table) {
            //
            $table->decimal("nilai_pak_pangkat_akhir",7,3)->nullable();

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
        Schema::drop('kepegawaians', function (Blueprint $table) {
            //
            $table->decimal("nilai_pak_pangkat_akhir",7,3)->nullable();

        });
    }
}
