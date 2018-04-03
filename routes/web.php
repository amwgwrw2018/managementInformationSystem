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
use App\khachhang;
use App\chucvu;
use App\loaiPhong;
use App\loaiKhachHang;
use App\QuanLyDatPhong;
Route::get('/',function(Request $request){
$clList=DB::getSchemaBuilder()->getColumnListing('nhanVien');
$listData=nhanVien::join('chucvu','nhanvien.ChucVu','=','chucvu.id')->get();
$listChucVu=chucvu::all();
return view('index',['listData'=>$listData,"clList"=>$clList,"listChucVu"=>$listChucVu]);
});
Route::prefix('quanly')->group(function () {
//nhan vien
Route::get('nhanVien',function(){
$clList=DB::getSchemaBuilder()->getColumnListing('nhanVien');
$listData=nhanVien::join('chucvu','nhanvien.ChucVu','=','chucvu.id')->get();
$listChucVu=chucvu::all();
return view('index',['listData'=>$listData,"clList"=>$clList,"listChucVu"=>$listChucVu]);
});
//phong
Route::get('phong',function(){
$clList=DB::getSchemaBuilder()->getColumnListing('phong');
$listData=phong::join('loaiphong','phong.loaiPhong','=','loaiphong.maLoaiPhong')->get();
$listLoaiPhong=loaiPhong::all();
return view('phong',['listData'=>$listData,"clList"=>$clList,"listLoaiPhong"=>$listLoaiPhong]);
});
//khach hang
Route::get('khachhang',function(){
$clList=DB::getSchemaBuilder()->getColumnListing('khachhang');
$listData=khachhang::join('loaikhachhang','khachhang.loaiKH','=','loaikhachhang.maLoaiKhachHang')->get();
$listLoaiKhachHang=loaiKhachHang::all();
return view('khachhang',['listData'=>$listData,"clList"=>$clList,"listLoaiKhachHang"=>$listLoaiKhachHang]);
});
//quan ly dat phong
Route::get('quanLyDatPhong',function(){
$clList=DB::getSchemaBuilder()->getColumnListing('quanlydatphong');
$listData=QuanLyDatPhong::all();

$listKhachHang=khachhang::all();
$listLoaiPhong=loaiPhong::all();
return view('quanlydatphong',['listData'=>$listData,"clList"=>$clList,"listLoaiPhong"=>$listLoaiPhong,"listKhachHang"=>$listKhachHang]);
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

Route::post('loadInfoByAjaxForNhanVien','loadAjaxController@loadInfoByAjaxForNhanVien');
Route::post('loadInfoByAjaxForRoom','loadAjaxController@loadInfoByAjaxForRoom');
Route::post('loadInfoByAjaxForCustomer','loadAjaxController@loadInfoByAjaxForCustomer');
Route::post('loadReservedRoomByAjax','loadAjaxController@loadReservedRoomByAjax');

Route::post('deleteUser','NhanVienManagement@deleteUser');
Route::post('addUser','NhanVienManagement@addUser');
Route::post('changeUser','NhanVienManagement@changeUserInfo');


Route::post('deleteRoom','RoomManagement@deleteRoom');
Route::post('addRoom','RoomManagement@addRoom');
Route::post('changeRoom','RoomManagement@changeRoom');


Route::post('deleteCustomer','CustomerManagement@deleteCustomer');
Route::post('addCustomer','CustomerManagement@addCustomer');
Route::post('changeCustomer','CustomerManagement@changeCustomer');