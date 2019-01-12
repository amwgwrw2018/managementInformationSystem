<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuanLyChiTraLuong;
use DB;
class SalaryManagement extends Controller
{
       public function xetLuong(Request $request){
    	$maNv=$request->input('maNv');
    	$luongThang=$request->input('luongThang');
    		$luongTru=$request->input('luongTru');
    			$luongThuongThem=$request->input('luongThuongThem');
    				$hinhThucChiTra=$request->input('hinhThucChiTra');
                    $thangTraLuong=$request->input("thangTraLuong");
                    $namTraLuong=$request->input("namTraLuong");
$thoiGianChiTra=$request->input('thoiGianChiTra');
try{
    			$luuXetLuong=new QuanLyChiTraLuong;
$luuXetLuong->maNV=$maNv;
$luuXetLuong->ThangTraLuong=$namTraLuong."-".$thangTraLuong."-01";
$luuXetLuong->LuongThang=$luongThang;
$luuXetLuong->LuongThuongThem=$luongThuongThem;
$luuXetLuong->LuongBiTru=$luongTru;

$luuXetLuong->TinhTrangChiTra="chua";
$luuXetLuong->HinhThucChiTra=$hinhThucChiTra;
$luuXetLuong->thoiGianDuocChiTra=$thoiGianChiTra;
$luuXetLuong->tinhTrangDuyetLuong=0;
$luuXetLuong->save();
return redirect("quanly/QuanLyChiTraLuong");
}catch(\Illuminate\Database\QueryException $ex){
$request->session()->flash('LuongError', 'Đã duyệt nhân viên này');
    return redirect("quanly/QuanLyChiTraLuong");
}
    }
 public function duyetLuong(Request $request){
  $maNV=$request->input('maNV');
    $ThangTraLuong=$request->input('ThangTraLuong');
QuanLyChiTraLuong::where('maNV',$maNV)->where('ThangTraLuong',$ThangTraLuong)->update(['tinhTrangDuyetLuong'=>1]);
return redirect("quanly/QuanLyDuyetLuong");
}

public function hoanTacDuyetLuong(Request $request){
    $maNV=$request->input('maNV');
	$ThangTraLuong=$request->input('ThangTraLuong');

QuanLyChiTraLuong::where('maNV',$maNV)->where('ThangTraLuong',$ThangTraLuong)->update(['tinhTrangDuyetLuong'=>0]);
return redirect("quanly/QuanLyDuyetLuong");
}

public function xemLuong(Request $request,$maNv){

	$data=QuanLyChiTraLuong::where('maNV',$maNv)->get();

return view('xemLuong',['salaryData'=>$data]);

}
public function traLuong(Request $request){
 $maNV=$request->input('maNV');
    $ThangTraLuong=$request->input('ThangTraLuong');

QuanLyChiTraLuong::where('maNV',$maNV)->where('ThangTraLuong',$ThangTraLuong)->update(['TinhTrangChiTra'=>1]);
return redirect('quanly/QuanLyChiTraLuong');
}
public function hoanTacTraLuong(Request $request){
     $maNV=$request->input('maNV');
    $ThangTraLuong=$request->input('ThangTraLuong');

QuanLyChiTraLuong::where('maNV',$maNV)->where('ThangTraLuong',$ThangTraLuong)->update(['TinhTrangChiTra'=>0]);
return redirect('quanly/QuanLyChiTraLuong');
}

}
