<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TinNhanNhanVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
     Schema::create('TinNhanNhanVien', function (Blueprint $table) {
         $table->increments('id');
            $table->integer('maNvGui')->unsigned();
                    $table->integer('maNvNhan')->unsigned();
            $table->text('noiDung');
              $table->timestamps();
                $table->foreign('maNvGui')->references('maNv')->on('nhanVien');
                  $table->foreign('maNvNhan')->references('maNv')->on('nhanVien');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('TinNhanNhanVien');
    }
}
