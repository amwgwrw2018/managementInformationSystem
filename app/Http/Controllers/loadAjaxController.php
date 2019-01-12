<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nhanvien;
use App\phong;
use App\khachhang;
use App\QuanLyViPham;
use App\chucvu;
use App\QuanLyDatPhong;
use App\DichVu;
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
        $loaiPhong=$request->input('loaiPhong');
     
        $data=QuanLyDatPhong::join('phong',"quanlydatphong.maPhong","=","phong.maPhong")->where('phong.loaiPhong',$loaiPhong)->get();

$phong=phong::where('loaiPhong',$loaiPhong)->get();
$jsonData=json_encode($phong);
return $jsonData;
    }

    
    public function loadInfoByAjaxForLuong(Request $request){
        $LuongCoBan=5000000;
        $month=date('n');
        $year=date('Y');
        $maNv=$request->input('maNv');
        $nhanVien=nhanvien::select('ChucVu')->where('maNv',$maNv)->get();
$ChucVu=$nhanVien[0]->ChucVu;
$heSoLuong=chucvu::select('HeSoLuong')->where('id',$ChucVu)->get();
 $viPham=QuanLyViPham::where('maNV',$maNv)->whereMonth('ThoiGianViPham',$month)->whereYear('ThoiGianViPham',$year)->get();
 $data=array($heSoLuong[0]->HeSoLuong*5000000,$viPham);

return json_encode($data);
    }
    public function loadCheckOutRoomInfoByAjax(Request $request){
       $maPhong=$request->input('phongCanTra'); 
       $roomInfo=QuanLyDatPhong::join('phong',"quanlydatphong.maPhong","=","phong.maPhong")->join("khachhang","quanlydatphong.maKH","=","khachhang.maKH")->join("nhanvien","quanlydatphong.maNvPhuTrachDatPhong","=","nhanvien.maNv")->where('quanlydatphong.maPhong',$maPhong)->where('quanlydatphong.tinhTrangTraPhong',0)->get();

return json_encode($roomInfo);
    }

    public function loadInfoByAjaxForNhanVienViPham(Request $request){
         $maNv=$request->input('maNv');
        $data=QuanLyViPham::where('maNV',$maNv)->get();
        return json_encode($data);
    }
public function loadInfoByAjaxForService(Request $request){
    $maDV=$request->input('maDV');
    $data=DichVu::where('maLoaiDichVu',$maDV)->get();
      return json_encode($data);
}

public function loadInfoEachRoomByAjax(Request $request){
    $maPhong=$request->input('maPhong');
$data=QuanLyDatPhong::where('maPhong',$maPhong)->where('ngayTraPhong','>=',date('Y-m-d'))->where('tinhTrangTraPhong',0)->get();
return json_encode($data);
}

public function loadKHtheoPhong(Request $request){
     $maPhong=$request->input('maPhong');
$data=QuanLyDatPhong::where('maPhong',$maPhong)->where('ngayNhanPhong','<=',date('Y-m-d'))->where('ngayTraPhong','>=',date('Y-m-d'))->select('maKH')->get();
return json_encode($data);
}
    
}
