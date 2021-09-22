<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbIjin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_ijin', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_karyawan');
            $table->dateTime('date_ijin');
            $table->dateTime('start_ijin');
            $table->integer('is_kategori'); //1 =sakit, 2=cuti
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
