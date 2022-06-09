<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahAk3tDiUserDanPendidikan extends Migration
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
            $table->decimal("tertinggal",7,3)->nullable();

        });
        Schema::table('paks', function (Blueprint $table) {
            $table->decimal("tertinggal",7,3)->nullable();
            $table->decimal("tertinggal2",7,3)->nullable();

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
            $table->decimal("tertinggal",7,3)->nullable();
        });
          //
        Schema::drop('paks', function (Blueprint $table) {
            $table->decimal("tertinggal",7,3)->nullable();
            $table->decimal("tertinggal2",7,3)->nullable();
        });
    }
}
