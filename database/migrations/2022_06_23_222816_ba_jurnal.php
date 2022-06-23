<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BaJurnal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ba_jurnals', function (Blueprint $table) {
            $table->id();
            $table->date("tanggal")->nullable();
            $table->string('judul');
            $table->string("penilai_id")->nullable();
            $table->decimal("nilai",7,3)->nullable();
            $table->unsignedBigInteger('pak_id')->default(1);


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
        Schema::dropIfExists('ba_jurnals');
    }
}
