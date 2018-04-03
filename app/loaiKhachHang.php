<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaiKhachHang extends Model
{
    	 protected $table ='loaikhachhang';
     protected $fillable = ['maLoaiKhachHang','tenLoaiKhachHang'];

     public $timestamps = false;
}
