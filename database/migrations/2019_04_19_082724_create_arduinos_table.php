<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArduinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arduinos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_ruang');
            $table->text('deskripsi_ruang');
            $table->float('x', 3, 3);
            $table->float('y', 3, 3);
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
        Schema::dropIfExists('arduinos');
    }
}
