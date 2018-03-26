<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tinnhannhanvien;
class SendMessageController extends Controller
{
    public function send(Request $request){
    	echo $request->input('maNvGui');
echo $request->input('maNvNhan');
echo $request->input('noiDung');
$saveTinNhan=new tinnhannhanvien;
$saveTinNhan->maNvGui=$request->input('maNvGui');
$saveTinNhan->maNvNhan=$request->input('maNvNhan');
$saveTinNhan->noiDung=$request->input('noiDung');
$saveTinNhan->save();
return redirect('/');
    }
}
