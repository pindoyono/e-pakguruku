<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kegiatan_id')->default(1);
            $table->unsignedBigInteger('pak_id')->default(1);
            $table->string('judul');
            $table->decimal("nilai",7,3)->nullable();
            $table->string("lampiran")->nullable();

            $table->foreign('pak_id')->references('id')->on('paks')->onDelete('cascade');
            $table->foreign('kegiatan_id')->references('id')->on('kegiatans')->onDelete('cascade');

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
        Schema::dropIfExists('pendidikans');
    }
}
