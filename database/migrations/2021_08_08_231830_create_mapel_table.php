<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapel', function (Blueprint $table) {
            $table->id();
            $table->string('mapel');
            $table->string('hari');
            $table->time('jam');
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('pengajar');
            $table->timestamps();
            $table->foreign('pengajar')->references('username')->on('guru')
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
        Schema::dropIfExists('mapel');
    }
}
