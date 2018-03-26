<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KhachHang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
     Schema::create('khachhang', function (Blueprint $table) {
            $table->increments('maKH');
            $table->string('tenGoiKH',50);
            $table->string('soCMND');
               $table->string('SDT');
            $table->string('loaiKH');
        $table->string('benTrungGian',50);
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('khachhang');
    }
}
