<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\nhanVien;
use App\phong;
use App\tinnhannhanvien;
use App\User;
Route::get('/',function(Request $request){
$clList=DB::getSchemaBuilder()->getColumnListing('nhanVien');
$listData=nhanVien::all();

return view('index',['listData'=>$listData,"clList"=>$clList]);
});
Route::prefix('quanly')->group(function () {

Route::get('nhanVien',function(){
$clList=DB::getSchemaBuilder()->getColumnListing('nhanVien');
$listData=nhanVien::all();
return view('index',['listData'=>$listData,"clList"=>$clList]);
});

Route::get('phong',function(){
$clList=DB::getSchemaBuilder()->getColumnListing('phong');
$listData=phong::all();
return view('phong',['listData'=>$listData,"clList"=>$clList]);
});

Route::get('khachhang',function(){
$clList=DB::getSchemaBuilder()->getColumnListing('khachhang');
$listData=phong::all();
return view('khachhang',['listData'=>$listData,"clList"=>$clList]);
});

});


Route::get('login',function(){



return view('Auth/login');
});
Route::get('logout','AuthController@logout');
Route::post('loginControl','AuthController@login');
Route::post('sendMessageControl','SendMessageController@send');
Route::get('test',function(){
$user=new User;
$user->name="NhatNam";
$user->maNv=3;
$user->email="nhatNam@gmail.com";
$user->password=Hash::make("123");
$user->save();
});