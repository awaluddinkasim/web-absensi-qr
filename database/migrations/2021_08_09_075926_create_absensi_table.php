<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->foreignId(('id_mapel'));
            $table->integer('pertemuan');
            $table->string('status');
            $table->date('tanggal');
            $table->timestamps();
            $table->foreign('nis')->references('nis')->on('siswa')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_mapel')->references('id')->on('mapel')
            ->onUpdate('cascade')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi');
    }
}
