<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BenTrungGian;
class BenTrungGianController extends Controller
{
    public function addBTG(Request $request){
    	$tenTGian=$request->input('tenTGian');
    	$SDTTGian=$request->input('SDTTGian');
    	$data=new BenTrungGian;
    	$data->benTrungGian=$tenTGian;
$data->SoDienThoaiLienHe=$SDTTGian;
$data->save();
return redirect('quanly/benTrungGian');
    }
    public function deleteBenTG(Request $request){
    	$maBenTrungGian=$request->input('maBenTrungGian');
    	BenTrungGian::where('maBenTrungGian',$maBenTrungGian)->update(["remove"=>1]);
    	return redirect('quanly/benTrungGian');
    	
    }
}
