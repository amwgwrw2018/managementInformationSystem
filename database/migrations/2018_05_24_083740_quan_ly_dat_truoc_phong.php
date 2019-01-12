<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuanLyDatTruocPhong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('QuanLyDatTruocPhong', function (Blueprint $table) {
        $table->increments('STT');
            $table->integer('maNV')->unsigned();
            $table->integer('LuongThang');
   
          $table->integer('LuongThuongThem');
              $table->integer('LuongBiTru');
      $table->integer('TongLuong');
      $table->string('TinhTrangChiTra');
            $table->string('HinhThucChiTra');
                $table->date('thoiGianDuocChiTra');
                  $table->string('tinhTrangDuyetLuong');
            
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
        //
    }
}
