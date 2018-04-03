<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khachhang;
class CustomerManagement extends Controller
{
           public function deleteCustomer(Request $request){
    	khachhang::where('maKH',$request->input('maKH'))->delete();
    	return redirect('quanly/khachhang');
    }
     public function addCustomer(Request $request){
        $tenGoiKH=$request->input('tenGoiKH');
        $soCMND=$request->input('soCMND');
        $sdt=$request->input('sdt');
        $loaiKH=$request->input('loaiKH');
        $benTrungGian=$request->input('benTrungGian');
            $khmoi=new khachhang;
        if($benTrungGian!=null){
    	
    
    

    	$khmoi->tenGoiKH=$tenGoiKH;
    	$khmoi->soCMND=$soCMND;
    	$khmoi->SDT=$sdt;
    	$khmoi->loaiKH=$loaiKH;
    	$khmoi->benTrungGian=$benTrungGian;
    	

    }else{
    

        $khmoi->tenGoiKH=$tenGoiKH;
        $khmoi->soCMND=$soCMND;
        $khmoi->SDT=$sdt;
        $khmoi->loaiKH=$loaiKH;
     
        

}
        $khmoi->save();
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
