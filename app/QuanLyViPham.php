<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanLyViPham extends Model
{
  	 protected $table ='quanlyvipham';
     protected $fillable = ['maNV','LoiViPham','ThoiGianViPham','LuongBiTru'];
}
