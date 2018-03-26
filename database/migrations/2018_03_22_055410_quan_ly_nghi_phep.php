<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuanLyNghiPhep extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
     Schema::create('QuanLyNghiPhep', function (Blueprint $table) {
            $table->integer('maNV')->unsigned();
         $table->text('LyDoNghiPhep');
            $table->date('ngayXinNghiPhep');
        
       $table->primary(['maNV', 'ngayXinNghiPhep']);
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
         Schema::dropIfExists('QuanLyNghiPhep');
    }
}
