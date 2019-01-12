<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuanLyDatPhong;
use App\phong;
use App\QuanLyHoaDon;
use App\QuanLyDichVu;
use DB;
class ReservationManagement extends Controller
{
	public function checkIn(Request $request){


$maPhong=$request->input("maPhong");
$maKH=$request->input("maKH");
$ngayNhanPhong=$request->input("ngayNhanPhong");
$ngayTraPhong=$request->input("ngayTraPhong");
$datPhong=new QuanLyDatPhong;
$datPhong->maPhong=$maPhong;
$datPhong->ngayNhanPhong=$ngayNhanPhong;
$datPhong->ngayTraPhong=$ngayTraPhong;
$datPhong->maKH=$maKH;
$datPhong->maNvPhuTrachDatPhong=$request->session()->get('currentUser')->maNv;
$datPhong->tinhTrangTraPhong=0;
$datPhong->save();


return redirect("quanly/quanLyDatPhong");
	}
public function checkOut(Request $request){
	    $currentDate=date('j').date('n').date('Y');
$soLuongHDhomNay=DB::table('quanlyhoadon')->select(DB::raw('count(*) as soLuongHD'))->where('maHoaDon', 'like', '%'.$currentDate.'%')->get();
$soLuongHD=$soLuongHDhomNay[0]->soLuongHD;
	$maKH=$request->input('maKH');
	$maPhong=$request->input('maPhong');
	$ngayNhanPhong=$request->input('ngayNhanPhong');
	$ngayTraPhong=$request->input('ngayTraPhong');
$maHoadonMoi="HD".$currentDate."-".$soLuongHD;
	QuanLyDatPhong::where('maKH',$maKH)->where('maPhong',$maPhong)->where('ngayNhanPhong',$ngayNhanPhong)->where('ngayTraPhong',$ngayTraPhong)->update(['ngayTraPhong'=>date("Y-m-d"),'tinhTrangTraPhong'=>1,'maHoaDon'=>$maHoadonMoi]);

QuanLyDichVu::where('maKH',$maKH)->whereBetween('ThoiGian', [$ngayNhanPhong,$ngayTraPhong])->update(['maHoaDon'=>$maHoadonMoi]);
$giaDV=QuanLyDichVu::where('maKH',$maKH)->whereBetween('ThoiGian', [$ngayNhanPhong,$ngayTraPhong])->join('dichvu','dichvu.maLoaiDichVu','=','quanlydichvu.maLoaiDichVu')->select(DB::raw('sum(dichvu.chiPhi) as tongChiPhiDichVu'))->get();




$giaPhong=phong::where('maPhong',$maPhong)->join('loaiphong','phong.loaiPhong','=','loaiphong.maLoaiPhong')->select('loaiphong.ChiPhiMotNgayThue')->get();
$chiPhiThuePhongHienTai=$giaPhong[0]->ChiPhiMotNgayThue*((((strtotime(date("Y-m-d"))-strtotime($ngayNhanPhong))/60)/60)/24);
$hoadon=new QuanLyHoaDon;
$hoadon->maHoaDon=$maHoadonMoi;
$hoadon->chiPhiThuePhong=$chiPhiThuePhongHienTai;
$hoadon->chiPhiDichVu=$giaDV[0]->tongChiPhiDichVu;
$hoadon->ngayTaoHoaDon=date('Y-m-d');
$hoadon->save();


	return redirect("quanly/quanLyDatPhong");
}

public function rollBackCheckOut(Request $request){
	$maKH=$request->input('maKH');

	 $maPhong=$request->input('maPhong');
	 $ngayNhanPhong=$request->input('ngayNhanPhong');
	 	$dataNgayTraPhong=QuanLyDatPhong::select('LuuNgayTraPhong')->where('maKH',$maKH)->where('maPhong',$maPhong)->where('ngayNhanPhong',$ngayNhanPhong)->get();
	
	$ngayTraPhong=$dataNgayTraPhong[0]->LuuNgayTraPhong;
	$ngayTraPhongHienTai=$request->input('ngayTraPhong');
	$data=QuanLyDatPhong::where('maKH',$maKH)->where('maPhong',$maPhong)->where('ngayNhanPhong',$ngayNhanPhong)->where('ngayTraPhong',$ngayTraPhongHienTai)->select("maHoaDon")->get();
	$maHoaDon=$data[0]->maHoaDon;
	QuanLyHoaDon::where('maHoaDon',$maHoaDon)->delete();

	QuanLyDatPhong::where('maKH',$maKH)->where('maPhong',$maPhong)->where('ngayNhanPhong',$ngayNhanPhong)->where('ngayTraPhong',$ngayTraPhongHienTai)->update(['tinhTrangTraPhong'=>0,"maHoaDon"=>null,"ngayTraPhong"=>$ngayTraPhong]);

	return redirect("quanly/quanLyDatPhong");
}
public function huyDatPhong(Request $request){
		$maKH=$request->input('maKH');

	 $maPhong=$request->input('maPhong');
	 $ngayNhanPhong=$request->input('ngayNhanPhong');
	 $ngayTraPhong=$request->input('ngayTraPhong');
	 QuanLyDatPhong::where('maKH',$maKH)->where('maPhong',$maPhong)->where('ngayNhanPhong',$ngayNhanPhong)->where('ngayTraPhong',$ngayTraPhong)->update(['remove'=>1]);
	 	return redirect("quanly/quanLyDatPhong");
	}

}
