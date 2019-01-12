<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanLyChiTraLuong extends Model
{
   	 protected $table ='quanlyluong';
     protected $fillable = ['maNV','ThangTraLuong','LuongThang','LuongThuongThem','LuongBiTru','TinhTrangChiTra','HinhThucChiTra','thoiGianDuocChiTra','tinhTrangDuyetLuong'];
         public $timestamps = false;
}
