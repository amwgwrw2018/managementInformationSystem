<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuanLyDatPhong;
use App\phong;
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
$datPhong->save();

$phong=phong::where('maPhong',$maPhong)->update(["tinhTrangThuePhong"=>"Đã thuê"]);
return redirect("quanly/quanLyDatPhong");
	}
//    public function getInfo(){
// $data=phong::join('loaiphong','loaiphong.maLoaiPhong','=','phong.loaiPhong')->get();
// foreach($data as $a){
// 	var_dump($a->tenLoaiPhong);
//    }
// }
}
