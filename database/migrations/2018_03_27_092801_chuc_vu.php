<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChucVu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
     Schema::create('chucVu', function (Blueprint $table) {
         $table->increments('id');
            $table->string('tenGoiChucVu');
                    $table->integer('HeSoLuong');
        
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('chucVu');
    }
}
