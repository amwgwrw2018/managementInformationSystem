<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NhanVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('nhanVien', function (Blueprint $table) {
            $table->increments('maNv');
            $table->string('tenNv',50);
            $table->string('gioiTinh',3);
            $table->date('ngaySinh');
            $table->text('diaChi');
            $table->string('SDT');
             $table->string('ChucVu');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('nhanVien');
    }
}
