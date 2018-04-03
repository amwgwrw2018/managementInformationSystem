<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LoaiKhachHang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
       Schema::create('loaiKhachHang', function (Blueprint $table) {
         $table->increments('maLoaiKhachHang');
            $table->string('tenLoaiKhachHang');
           
        
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('loaiKhachHang');
    }
}
