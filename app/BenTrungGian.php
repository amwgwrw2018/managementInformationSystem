<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BenTrungGian extends Model
{
     protected $table ='bentrunggian';
     protected $fillable = ['maBenTrungGian','benTrungGian','SoDienThoaiLienHe','remove'];

     public $timestamps = false;
}
