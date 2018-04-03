<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\phong;
class RoomManagement extends Controller
{
       public function deleteRoom(Request $request){
    	phong::where('maPhong',$request->input('maPhong'))->delete();
    	return redirect('quanly/phong');
    }
     public function addRoom(Request $request){
    	$soPhong=$request->input('soPhong');
    	$kichThuoc=$request->input('kichThuoc');
    	$loaiPhong=$request->input('loaiPhong');
    	$tang=$request->input('tang');
    	$tinhTrang=$request->input('tinhTrang');
    
    	$phongMoi=new phong;

    	$phongMoi->soPhong=$soPhong;
    	$phongMoi->kichThuoc=$kichThuoc;
    	$phongMoi->loaiPhong=$loaiPhong;
    	$phongMoi->tang=$tang;
    	$phongMoi->tinhTrangThuePhong=$tinhTrang;
    	
    	$phongMoi->save();
    	return redirect('quanly/phong');
    }
   public function changeRoom(Request $request){
    $maPhong=$request->input('maPhong');
   $soPhong=$request->input('soPhong');
        $kichThuoc=$request->input('kichThuoc');
        $loaiPhong=$request->input('loaiPhong');
        $tang=$request->input('tang');
        $tinhTrang=$request->input('tinhTrang');


$data=phong::where('maPhong',$maPhong)->update([
    "soPhong"=>$soPhong,
    "kichThuoc"=>$kichThuoc,
    "loaiPhong"=>$loaiPhong,
    "tang"=>$tang,
    "tinhTrangThuePhong"=>$tinhTrang,
    

]);
    return redirect('quanly/phong');
    }
}
