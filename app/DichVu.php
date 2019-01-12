<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DichVu extends Model
{
     protected $table ='dichvu';
     protected $fillable = ['maLoaiDichVu','tenDichVu','chiPhi','remove'];

     public $timestamps = false;

}
