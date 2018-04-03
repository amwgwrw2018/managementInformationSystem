<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LoaiPhong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
     Schema::create('loaiPhong', function (Blueprint $table) {
         $table->increments('maLoaiPhong');
            $table->string('tenLoaiPhong');
           
        
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('loaiPhong');
    }
}
