<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuanLyHoaDon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
     Schema::create('QuanLyHoaDon', function (Blueprint $table) {
            $table->increments('maHoaDon');
         $table->integer('maKH')->unsigned();
               
             $table->integer('chiPhiThuePhong');
    $table->integer('chiPhiCongThemPhatSinh');
      $table->integer('tongChiPhi');
      $table->timestamps();
 $table->foreign('maKH')->references('maKH')->on('khachhang');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('QuanLyHoaDon');
    }
}
