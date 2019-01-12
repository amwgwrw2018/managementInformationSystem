<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khachhang;
use DB;
use App\BenTrungGian;
class CustomerManagement extends Controller
{
           public function deleteCustomer(Request $request){
    	khachhang::where('maKH',$request->input('maKH'))->update(['remove'=>1]);
    	return redirect('quanly/khachhang');
    }
     public function addCustomer(Request $request){
        $hasACustomer=false;
        $currentDate=date('j').date('n').date('Y');
$soLuongKHhomNay=DB::table('khachhang')->select(DB::raw('count(*) as soLuongKH'))->where('maKH', 'like', '%'.$currentDate.'%')->get();

$soLuongKH=$soLuongKHhomNay[0]->soLuongKH;
        $tenGoiKH=$request->input('tenGoiKH');
        $soCMND=$request->input('soCMND');
        $sdt=$request->input('sdt');
        $loaiKH=$request->input('loaiKH');
        $benTrungGian=$request->input('benTrungGian');
        $kiemTraKH=khachhang::where('soCMND',$soCMND)->get();
if(count($kiemTraKH)==0){
                $khmoi=new khachhang;
            $bentrunggian=BenTrungGian::select('benTrungGian')->where("maBenTrungGian",$benTrungGian)->get();
        if($benTrungGian!=null){
        
    
    
$khmoi->maKH='KH'.$currentDate.'-'.($soLuongKH+1);
        $khmoi->tenGoiKH=$tenGoiKH;
        $khmoi->soCMND=$soCMND;
        $khmoi->SDT=$sdt;
        $khmoi->loaiKH=$loaiKH;
        $khmoi->benTrungGian=$bentrunggian[0]->benTrungGian;
        

    }else{
    
$khmoi->maKH='KH'.$currentDate.'-'.($soLuongKH+1);
        $khmoi->tenGoiKH=$tenGoiKH;
        $khmoi->soCMND=$soCMND;
        $khmoi->SDT=$sdt;
        $khmoi->loaiKH=$loaiKH;
     
        

}
        $khmoi->save();
    }else{
        $request->session()->flash('khachhangtontaiError',"CMND khách hàng đã tồn tại");
    }

    	return redirect('quanly/khachhang');
    
    }
   public function changeCustomer(Request $request){
     $maKH=$request->input('maKH');
        $tenGoiKH=$request->input('tenGoiKH');
        $soCMND=$request->input('soCMND');
        $sdt=$request->input('sdt');
        $loaiKH=$request->input('loaiKH');
        $benTrungGian=$request->input('benTrungGian');
      

        if($benTrungGian!=null){

        $data=khachhang::where('maKH',$maKH)->update([
    "tenGoiKH"=>$tenGoiKH,
    "soCMND"=>$soCMND,
    "SDT"=>$sdt,
    "loaiKH"=>$loaiKH,
    "benTrungGian"=>$benTrungGian
]);

    }else{
 $data=khachhang::where('maKH',$maKH)->update([
    "tenGoiKH"=>$tenGoiKH,
    "soCMND"=>$soCMND,
    "SDT"=>$sdt,
    "loaiKH"=>$loaiKH
 
    

]);
}
        
        return redirect('quanly/khachhang');
    
    }
    }
