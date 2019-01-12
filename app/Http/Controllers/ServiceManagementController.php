<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuanLyDichVu;
use App\DichVu;
class ServiceManagementController extends Controller
{


public function addDV(Request $request){
   $tenDV=$request->input('tenDV');
   $chiPhiDV=$request->input('chiPhiDV');
$data=new DichVu;
$data->tenDichVu=$tenDV;
$data->chiPhi=$chiPhiDV;
$data->remove=0;
$data->save();
return redirect('quanly/QuanLyDichVu');

}
public function suaDV(Request $request){
   $tenDV=$request->input('tenDV');
   $chiPhiDV=$request->input('chiPhiDV');
   $maLoaiDichVu=$request->input('maLoaiDichVu');
DichVu::where('maLoaiDichVu',$maLoaiDichVu)->update(['tenDichVu'=>$tenDV,'chiPhi'=>$chiPhiDV]);

return redirect('quanly/QuanLyDichVu'); 
}
public function deleteDV(Request $request){
     $maLoaiDichVu=$request->input('maLoaiDichVu');
     DichVu::where('maLoaiDichVu',$maLoaiDichVu)->update(['remove'=>1]);
     return redirect('quanly/QuanLyDichVu'); 
}

   public function addSDDV(Request $request){
   	$maKH=$request->input('maKH');
   	$maLoaiDichVu=$request->input('maLoaiDichVu');
   	$maNV=$request->session()->get('currentUser')->maNv;
$data=new QuanLyDichVu;
$data->maKH=$maKH;
$data->maLoaiDichVu=$maLoaiDichVu;
$data->ThoiGian=date('Y-m-d');
$data->maNV=$maNV;
$data->tinhTrangChiTra=0;
$data->save();
return redirect('quanly/QuanLyDichVu');

}

   public function xoaSDDV(Request $request){
   	$maKH=$request->input('maKH');
   	$maLoaiDichVu=$request->input('maLoaiDichVu');
   	$thoiGian=$request->input('ThoiGianDV');
   	$data=QuanLyDichVu::where('maKH',$maKH)->where('maLoaiDichVu',$maLoaiDichVu)->where('ThoiGian',$thoiGian)->update(['remove'=>1]);
   	return redirect('quanly/QuanLyDichVu');
}
}
