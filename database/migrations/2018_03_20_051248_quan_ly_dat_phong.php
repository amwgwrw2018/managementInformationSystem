<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuanLyDatPhong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
    {
     Schema::create('quanLyDatPhong', function (Blueprint $table) {
            $table->integer('maPhong')->unsigned();
            $table->integer('maKH')->unsigned();
        
          $table->integer('thoiGianThue');

       $table->integer('maNvPhuTrachDatPhong')->unsigned();
            $table->timestamps();
            $table->primary(['maPhong', 'maKH']);
                $table->foreign('maPhong')->references('maPhong')->on('phong');
                  $table->foreign('maKH')->references('maKH')->on('khachhang');
                    $table->foreign('maNvPhuTrachDatPhong')->references('maNv')->on('nhanVien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('quanLyDatPhong');
    }
}
