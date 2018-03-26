<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuanLyLuong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
     Schema::create('QuanLyLuong', function (Blueprint $table) {
            $table->integer('maNV')->unsigned();
            $table->integer('LuongThang');
            $table->integer('LuongChinhThuc');
          $table->integer('LuongThuongThem');
              $table->integer('LuongBiTru');
      $table->integer('TongLuong');
      $table->string('TinhTrangChiTra');
            $table->string('HinhThucChiTra');
            $table->primary(['maNV', 'LuongThang']);
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
         Schema::dropIfExists('QuanLyLuong');
    }
}
