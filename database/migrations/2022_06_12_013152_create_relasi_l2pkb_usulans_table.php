<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelasiL2pkbUsulansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relasi_l2pkb_usulans', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('pak_id')->default(1);
            $table->unsignedBigInteger('pendidikan_id')->default(1);
            $table->unsignedBigInteger('l2pkb_id')->default(1);
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
        Schema::dropIfExists('relasi_l2pkb_usulans');
    }
}
