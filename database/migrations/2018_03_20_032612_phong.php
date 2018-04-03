<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Phong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('phong', function (Blueprint $table) {
            $table->increments('maPhong');
            $table->string('soPhong',5);
            $table->integer('kichThuoc');
            $table->integer('loaiPhong')->unsigned();
            $table->string('tang');
             $table->string('tinhTrangThuePhong');
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('phong');
    }
}
