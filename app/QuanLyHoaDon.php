<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanLyHoaDon extends Model
{
    protected $table ='quanlyhoadon';
     protected $fillable = ['maHoaDon','maKH','chiPhiThuePhong','chiPhiDichVu','ngayTaoHoaDon'];
      public $timestamps = false;
}
