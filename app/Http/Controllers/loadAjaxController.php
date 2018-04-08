<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nhanvien;
use App\phong;
use App\khachhang;
use App\QuanLyViPham;
use App\chucvu;
class loadAjaxController extends Controller
{
        public function loadInfoByAjaxForNhanVien(Request $request){
    	$data=nhanvien::where('maNv',$request->input('maNv'))->get();
    	return json_encode($data[0]);
    }
       public function loadInfoByAjaxForRoom(Request $request){
    	$data=phong::where('maPhong',$request->input('maPhong'))->get();
    	return json_encode($data[0]);
    }
     public function loadInfoByAjaxForCustomer(Request $request){
    	$data=khachhang::where('maKH',$request->input('maKH'))->get();
    	return json_encode($data[0]);
    }
     public function loadReservedRoomByAjax(Request $request){
        $data=phong::where('loaiPhong',$request->input('loaiPhong'))->where('tinhTrangThuePhong',"Trống")->get();
        return json_encode($data);
    }
     public function loadViolationByAjax(Request $request){
        $data=QuanLyViPham::where('loaiPhong',$request->input('loaiPhong'))->where('tinhTrangThuePhong',"Trống")->get();
        return json_encode($data);
    }
    public function loadInfoByAjaxForLuongCoBan(Request $request){
        $LuongCoBan=5000000;
        $maNv=$request->input('maNv');
        $nhanVien=nhanvien::select('ChucVu')->where('maNv',$maNv)->get();
$ChucVu=$nhanVien[0]->ChucVu;
$heSoLuong=chucvu::select('HeSoLuong')->where('id',$ChucVu)->get();
return $heSoLuong[0]->HeSoLuong*5000000;
    }
    
}
