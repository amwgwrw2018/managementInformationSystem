<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhanVien extends Model
{
	 protected $table ='nhanvien';
     protected $fillable = [
        'maNv', 'tenNv', 'gioiTinh','ngaySinh','diaChi','SDT','ChucVu'
    ];

  
  
}
