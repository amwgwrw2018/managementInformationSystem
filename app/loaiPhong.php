<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaiPhong extends Model
{
   	 protected $table ='loaiphong';
     protected $fillable = ['maLoaiPhong','tenLoaiPhong'];

     public $timestamps = false;
}
