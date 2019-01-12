<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nhanvien;
class NhanVienManagement extends Controller
{
    public function deleteUser(Request $request){
    	nhanvien::where('maNv',$request->input('maNv'))->update(['remove'=>1]);
    	return redirect('/');
    }
     public function addUser(Request $request){
    	$tenNv=$request->input('tenNv');
    	$gioiTinh=$request->input('gioiTinh');
    	$ngay=$request->input('ngay');
    	$thang=$request->input('thang');
    	$nam=$request->input('nam');
    	$diaChi=$request->input('diaChi');
    	$Sdt=$request->input('Sdt');
    	$chucVu=$request->input('chucVu');
    	$nhanvienMoi=new nhanvien;
    	$nhanvienMoi->tenNv=$tenNv;
    	$nhanvienMoi->gioiTinh=$gioiTinh;
    	$nhanvienMoi->ngaySinh=$nam."-".$thang."-".$ngay;
    	$nhanvienMoi->diaChi=$diaChi;
    	$nhanvienMoi->SDT=$Sdt;
    	$nhanvienMoi->ChucVu=$chucVu;
        $nhanvienMoi->remove=0;
    	$nhanvienMoi->save();
    	return redirect('/');
    }
   public function changeUserInfo(Request $request){
    $tenNv=$request->input('tenNv');
  
           $maNv=$request->input('maNhanVien');
        $gioiTinh=$request->input('gioiTinh');
        $ngay=$request->input('ngay');
        $thang=$request->input('thang');
        $nam=$request->input('nam');
        $diaChi=$request->input('diaChi');
        $Sdt=$request->input('Sdt');
        $chucVu=$request->input('chucVu');
$data=nhanvien::where('maNv',$maNv)->update([
    "gioiTinh"=>$gioiTinh,
    "tenNv"=>$tenNv,
    "ngaySinh"=>$nam."-".$thang."-".$ngay,
    "diaChi"=>$diaChi,
    "SDT"=>$Sdt,
    "ChucVu"=>$chucVu

]);
    return redirect('/');
    }


}
