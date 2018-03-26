<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\nhanVien;
use App\tinnhannhanvien;
use Illuminate\Support\Facades\Hash;
use Validator;
class AuthController extends Controller
{
	
             public function login(Request $request){
             	$isExistUser=false;

 $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('login')
                        ->withErrors($validator)
                        ->withInput();
        }else{
$users=User::where('name',$request->input('username'))->get();

foreach($users as $user){
	if(Hash::check($request->input('password'), $user->password)){
$isExistUser=true;
$request->session()->put('currentUser', $user);
	}
}
if($isExistUser){

$request->session()->put('listNhanVien',nhanVien::all());
$request->session()->put('listTinNhan',tinnhannhanvien::join('nhanvien', 'nhanvien.maNv', '=', 'tinnhannhanvien.maNvGui')->where('maNvNhan',$request->session()->get('currentUser')->maNv)->get());

	return redirect('/');
}else{
	return redirect('login');
}

        }
   }


   public function logout(Request $request){
   	$request->session()->flush();
   	return redirect('login');

   }

}
