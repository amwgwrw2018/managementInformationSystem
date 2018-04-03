<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanLyDatPhong extends Model
{
   	 protected $table ='quanlydatphong';
     protected $fillable = ['maPhong','maKH','thoiGianThue','maNvPhuTrachDatPhong'];


}
