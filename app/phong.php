<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phong extends Model
{
   	 protected $table ='phong';
     protected $fillable = ['kichThuoc','loaiPhong','maPhong','soPhong','tang','tinhTrangThuePhong'];
}
