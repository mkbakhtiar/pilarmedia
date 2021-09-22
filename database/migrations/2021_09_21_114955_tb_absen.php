<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbAbsen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_absen', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_karyawan');
            $table->dateTime('date_absen');
            $table->time('jam_masuk');
            $table->time('jam_keluar');
            $table->integer('is_invalid');
            $table->text('lat');
            $table->text('lng');
            $table->integer('is_telat');
            $table->integer('menit');
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
    }
}
