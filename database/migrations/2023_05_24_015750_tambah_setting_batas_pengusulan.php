<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahSettingBatasPengusulan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('settings', function (Blueprint $table) {
            $table->bigInteger("tahun_pengusulan")->default(2020);
            $table->bigInteger("bulan_pengusulan")->default(01);
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
        Schema::table('settings', function (Blueprint $table) {
            $table->bigInteger("tahun_pengusulan")->default(2020);
            $table->bigInteger("bulan_pengusulan")->default(01);
        });
    }
}
