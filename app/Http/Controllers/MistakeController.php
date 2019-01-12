<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuanLyViPham;
class MistakeController extends Controller
{
     public function addLoiViPham(Request $request){
     	$newData=new QuanLyViPham;
     	$newData->maNV=$request->input('maNV');
     		$newData->LoiViPham=$request->input('LoiViPham');
     			$newData->ThoiGianViPham=$request->input('ThoiGianViPham');
     				$newData->LuongBiTru=$request->input('LuongBiTru');
$newData->save();
return redirect("quanly/QuanLyViPham");
}
}
