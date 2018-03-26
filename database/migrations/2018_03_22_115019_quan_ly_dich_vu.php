<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuanLyDichVu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
     Schema::create('QuanLyDichVu', function (Blueprint $table) {
            $table->integer('maKH')->unsigned();
         $table->integer('maLoaiDichVu')->unsigned();
            $table->integer('chiPhi');
            $table->date('ThoiGian');
$table->integer('maNV')->unsigned();
        
       $table->primary(['maKH', 'maLoaiDichVu','ThoiGian']);
        $table->foreign('maKH')->references('maKH')->on('khachhang');
             $table->foreign('maLoaiDichVu')->references('maLoaiDichVu')->on('dichvu');
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
         Schema::dropIfExists('QuanLyDichVu');
    }
}
