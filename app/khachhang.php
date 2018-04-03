<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    	 protected $table ='khachhang';
     protected $fillable = [
        'maKH', 'tenGoiKH', 'soCMND','SDT','loaiKH','benTrungGian'
    ];
         public $timestamps = false;
}
