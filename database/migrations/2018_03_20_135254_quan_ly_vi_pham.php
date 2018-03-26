<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuanLyViPham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
     Schema::create('QuanLyViPham', function (Blueprint $table) {
            $table->integer('maNV')->unsigned();
            $table->integer('LoiViPham');
          $table->date('ThoiGianViPham');
              $table->integer('LuongBiTru');
       $table->primary(['maNV', 'LoiViPham','ThoiGianViPham']);
              $table->foreign('maNV')->references('maNv')->on('nhanVien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('QuanLyViPham');
    }
}
