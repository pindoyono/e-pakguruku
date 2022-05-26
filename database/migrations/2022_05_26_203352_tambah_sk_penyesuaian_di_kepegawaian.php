<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahSkPenyesuaianDiKepegawaian extends Migration
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
            $table->string("sk_penyesuaian")->nullable();
            $table->string("sk_ggd")->nullable();
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
            $table->string("sk_penyesuaian")->nullable();
            $table->string("sk_ggd")->nullable();
        });
    }
}
