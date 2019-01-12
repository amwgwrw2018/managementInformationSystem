<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuanLyNghiPhep;
class NghiPhepController extends Controller
{
    public function nghiPhep(Request $request){
    	
try{
$LyDoNghiPhep=$request->input('LyDoNghiPhep');	
$ngayXinNghiPhep=$request->input('ngayXinNghiPhep');	
$ngayLamTroLai=$request->input('ngayLamTroLai');
$data=new QuanLyNghiPhep;
$data->maNV=$request->session()->get('currentUser')->maNv;
$data->LyDoNghiPhep=$LyDoNghiPhep;
$data->ngayXinNghiPhep=$ngayXinNghiPhep;
$data->ngayLamTroLai=$ngayLamTroLai;
$data->save();
}catch(\Illuminate\Database\QueryException $ex){
$request->session()->flash('nghiPhepError', 'Nhân viên đã xin nghỉ phép trong ngày hôm nay');
   return redirect('xemLuong/'.$request->session()->get('currentUser')->maNv);
}
return redirect('/');
    }
   public function duyetNghiPhep(Request $request){
   	$data=QuanLyNghiPhep::all();
    	return view('duyetNghiPhep',['data'=>$data]);
   }
   public function duyet(Request $request){
   	$maNV=$request->input('maNV');	
   	$LyDoNghiPhep=$request->input('LyDoNghiPhep');	
   	$ngayXinNghiPhep=$request->input('ngayXinNghiPhep');	
   	$ngayLamTroLai=$request->input('ngayLamTroLai');	
  QuanLyNghiPhep::where("maNv",$maNV)->where("LyDoNghiPhep",$LyDoNghiPhep)->where("ngayXinNghiPhep",$ngayXinNghiPhep)->where("ngayLamTroLai",$ngayLamTroLai)->update(['tinhTrangDuyet'=>1]);
     return redirect('duyetNghiPhep');

   }
    public function HoanTacduyetNghiPhep(Request $request){
    	 	$maNV=$request->input('maNV');	
   	$LyDoNghiPhep=$request->input('LyDoNghiPhep');	
   	$ngayXinNghiPhep=$request->input('ngayXinNghiPhep');	
   	$ngayLamTroLai=$request->input('ngayLamTroLai');	
  QuanLyNghiPhep::where("maNv",$maNV)->where("LyDoNghiPhep",$LyDoNghiPhep)->where("ngayXinNghiPhep",$ngayXinNghiPhep)->where("ngayLamTroLai",$ngayLamTroLai)->update(['tinhTrangDuyet'=>0]);
     return redirect('duyetNghiPhep');
    }
 
    public function xemNghiPhep(Request $request){
    	$data=QuanLyNghiPhep::where("maNv",$request->session()->get('currentUser')->maNv)->get();
    	return view('xemNghiPhep',['data'=>$data]);
    	
    }
}
