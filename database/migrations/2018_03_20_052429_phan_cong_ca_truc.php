<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PhanCongCaTruc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
     Schema::create('PhanCongCaTruc', function (Blueprint $table) {
            $table->integer('maNV')->unsigned();
            $table->date('thoiGianTruc');
          $table->string('khuVucTruc');
          $table->integer('soGioTruc');

     
          $table->integer('soGioTrucThucTe');

            $table->primary(['maNV', 'thoiGianTruc','khuVucTruc']);
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
         Schema::dropIfExists('PhanCongCaTruc');
    }
}
