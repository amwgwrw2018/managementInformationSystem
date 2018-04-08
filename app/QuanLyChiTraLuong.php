<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanLyChiTraLuong extends Model
{
   	 protected $table ='quanlyluong';
     protected $fillable = ['maNV','LuongThang','LuongThuongThem','LuongBiTru','TongLuong','TinhTrangChiTra','HinhThucChiTra','thoiGianDuocChiTra'];
}
