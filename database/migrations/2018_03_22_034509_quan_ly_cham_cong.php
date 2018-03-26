<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuanLyChamCong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */     
     public function up()
    {
     Schema::create('QuanLyChamCong', function (Blueprint $table) {
            $table->integer('maNV')->unsigned();
            $table->date('ngayChamCong');
         $table->integer('chamCongBuoiSang');
         $table->date('ThoiGianChamCongBuoiSang');
          $table->integer('chamCongBuoiChieu');
           $table->date('ThoiGianChamCongBuoiChieu');
       $table->primary(['maNV', 'ngayChamCong']);
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
         Schema::dropIfExists('QuanLyChamCong');
    }
}
