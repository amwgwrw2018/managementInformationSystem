<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanLyNghiPhep extends Model
{
   	 protected $table ='quanlynghiphep';
     protected $fillable = [
        'maNV',	'LyDoNghiPhep',	'ngayXinNghiPhep',	'ngayLamTroLai','tinhTrangDuyet'

    ];
    public $timestamps = false;
}
