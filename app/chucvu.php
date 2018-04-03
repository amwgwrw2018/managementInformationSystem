<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chucvu extends Model
{
    	 protected $table ='chucvu';
     protected $fillable = [
        'id', 'tenGoiChucVu', 'HeSoLuong'
    ];
}
