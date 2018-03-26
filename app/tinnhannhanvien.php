<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tinnhannhanvien extends Model
{
     protected $table ='tinnhannhanvien';
     protected $fillable = ['id','maNvGui','maNvNhan','noiDung'];
}
