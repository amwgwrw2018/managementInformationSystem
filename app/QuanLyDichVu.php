<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanLyDichVu extends Model
{
   	 protected $table ='quanlydichvu';
     protected $fillable = ['maKH','maLoaiDichVu','ThoiGian','maNv','tinhTrangChiTra','maHoaDon'];
        public $timestamps = false;
}
