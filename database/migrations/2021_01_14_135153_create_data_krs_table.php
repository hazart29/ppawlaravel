<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_krs', function (Blueprint $table) {
            $table->id();
            $table->integer('nim');
            $table->string('kode_mk');
            $table->string('nama_mk');
            $table->string('kelas');
            $table->string('hari');
            $table->string('pukul');
            $table->string('ruang');
            $table->string('sks');
            $table->string('status');
            $table->float('skor')->nullable();
            $table->char('nilai')->nullable();
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
        Schema::dropIfExists('data_krs');
    }
}
