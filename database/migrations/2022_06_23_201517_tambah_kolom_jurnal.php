<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahKolomJurnal extends Migration
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
            $table->string("jurnal")->nullable();
            $table->string("lap_pi")->nullable();
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
        Schema::table('paks', function (Blueprint $table) {
            $table->string("jurnal")->nullable();
            $table->string("lap_pi")->nullable();
        });
    }
}
