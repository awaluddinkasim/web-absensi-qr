<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrcodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qrcode', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mapel');
            $table->integer('pertemuan');
            $table->enum('scannable', ['0', '1']);
            $table->string('qrcode');
            $table->timestamps();
            $table->foreign('id_mapel')->references('id')->on('mapel')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qrcode');
    }
}
