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
use App\QuanLyChiTraLuong;
use App\QuanLyViPham;
use App\QuanLyDichVu;
use App\DichVu;
use App\QuanLyHoaDon;
use App\BenTrungGian;
Route::get('/',function(Request $request){
$clList=DB::getSchemaBuilder()->getColumnListing('nhanVien');
$listData=nhanVien::join('chucvu','nhanvien.ChucVu','=','chucvu.id')->where('nhanvien.remove',0)->get();
unset($clList[count($clList)-1]);
$listChucVu=chucvu::all();
return view('index',['listData'=>$listData,"clList"=>$clList,"listChucVu"=>$listChucVu]);
});




Route::prefix('quanly')->group(function () {

//nhan vien
Route::get('nhanVien',function(){
$clList=DB::getSchemaBuilder()->getColumnListing('nhanVien');
unset($clList[count($clList)-1]);
$listData=nhanVien::join('chucvu','nhanvien.ChucVu','=','chucvu.id')->where('nhanvien.remove',0)->get();
$listChucVu=chucvu::all();
return view('index',['listData'=>$listData,"clList"=>$clList,"listChucVu"=>$listChucVu]);
});

//phong
Route::get('phong',function(){
$clList=DB::getSchemaBuilder()->getColumnListing('phong');
//xoa cot remove
unset($clList[count($clList)-1]);
$listData=phong::join('loaiphong','phong.loaiPhong','=','loaiphong.maLoaiPhong')->where('phong.remove',0)->get();
$listLoaiPhong=loaiPhong::all();
return view('phong',['listData'=>$listData,"clList"=>$clList,"listLoaiPhong"=>$listLoaiPhong]);
});

//khach hang
Route::get('khachhang',function(){
$clList=DB::getSchemaBuilder()->getColumnListing('khachhang');
//xoa cot remove
unset($clList[count($clList)-1]);
$listData=khachhang::join('loaikhachhang','khachhang.loaiKH','=','loaikhachhang.maLoaiKhachHang')->where('khachhang.remove',0)->get();
$listLoaiKhachHang=loaiKhachHang::all();

$benTrungGian=BenTrungGian::select('maBenTrungGian','benTrungGian')->where('remove',0)->get();
return view('khachhang',['listData'=>$listData,"clList"=>$clList,"listLoaiKhachHang"=>$listLoaiKhachHang,"benTrungGian"=>$benTrungGian]);
});

//quan ly dat phong
Route::get('quanLyDatPhong',function(){

$listData=QuanLyDatPhong::join('phong',"quanlydatphong.maPhong","=","phong.maPhong")->join("khachhang","quanlydatphong.maKH","=","khachhang.maKH")->join("nhanvien","quanlydatphong.maNvPhuTrachDatPhong","=","nhanvien.maNv")->where('quanlydatphong.remove',0)->get();
$listKhachHang=khachhang::where('remove',0)->get();
$listLoaiPhong=loaiPhong::all();
$listPhong=phong::where('remove',0)->get();
return view('quanlydatphong',['listData'=>$listData,"listLoaiPhong"=>$listLoaiPhong,"listKhachHang"=>$listKhachHang,"listPhong"=>$listPhong]);
});

//quan ly chi tra luong
Route::get('QuanLyChiTraLuong',function(){

$listData=QuanLyChiTraLuong::join('nhanvien','nhanvien.maNv','=','quanlyluong.maNV')->select('nhanvien.tenNv','quanlyluong.*')->get();

return view('chiTraLuong',['listData'=>$listData]);
});

Route::get('QuanLyDuyetLuong',function(){

$listData=QuanLyChiTraLuong::all();

return view('duyetLuong',['listData'=>$listData]);
});


Route::get('QuanLyViPham',function(){
$clList=DB::getSchemaBuilder()->getColumnListing('quanlyvipham');
$listData=QuanLyViPham::all();

return view('QuanLyViPham',['listData'=>$listData,"clList"=>$clList]);
});

Route::get('QuanLyDichVu',function(){

$listData=QuanLyDichVu::join('khachhang','khachhang.maKH','=','quanlydichvu.maKH')->join('dichvu','dichvu.maLoaiDichVu','=','quanlydichvu.maLoaiDichVu')->join('nhanvien','nhanvien.maNv','=','quanlydichvu.maNV')->select(
  'khachhang.maKH',
                  'khachhang.tenGoiKH',
                  'dichvu.tenDichVu',
                  'dichvu.maLoaiDichVu',
                  'quanlydichvu.thoiGian',
                  'nhanvien.tenNv',
                  'quanlydichvu.tinhTrangChiTra'
          )->where('quanlydichvu.remove',0)->get();
$listDichVu=DichVu::where('remove',0)->get();
$listPhong=phong::where('remove',0)->get();
return view('QuanLyDichVu',['listData'=>$listData,'listDichVu'=>$listDichVu,'listPhong'=>$listPhong]);
});

Route::get('QuanLyHoaDon',function(){

$data=QuanLyHoaDon::all();
return view('QuanLyHoaDon',["BillData"=>$data]);
});

Route::get('benTrungGian',function(){

$data=BenTrungGian::all();
return view('benTrungGian',["data"=>$data]);
});



});

Route::get('testSQL',function(){
$listData=QuanLyDichVu::join('khachhang','khachhang.maKH','=','quanlydichvu.maKH')->join('dichvu','dichvu.maLoaiDichVu','=','quanlydichvu.maLoaiDichVu')->join('nhanvien','nhanvien.maNv','=','quanlydichvu.maNV')->select(
                  'khachhang.tenGoiKH',
                  'dichvu.maLoaiDichVu',
                  'dichvu.tenDichVu',
                  'quanlydichvu.chiPhi',
                  'quanlydichvu.thoiGian',
                  'nhanvien.tenNv',
                  'quanlydichvu.tinhTrangChiTra'
          )->get();
return var_dump($listData);
});



Route::get('login',function(Request $request){
  if($request->session()->has('currentUser')){
    $currentUserChucVu=$request->session()->get('currentUserChucVu');
if($currentUserChucVu[0]->ChucVu==4){

  return redirect('quanly/QuanLyChiTraLuong');
}elseif($currentUserChucVu[0]->ChucVu==1){
  return redirect('quanly/quanLyDatPhong');
}else{
    return redirect('/');
}

  }else{
    return view('Auth/login');
  }



});
Route::get('logout','AuthController@logout');
Route::post('loginControl','AuthController@login');
Route::post('sendMessageControl','SendMessageController@send');
Route::get('test',function(){
// $user=new User;
// $user->name="Binh";
// $user->maNv=11;
// $user->email="binh@gmail.com";
// $user->password=Hash::make("123");
// $user->save();
  $clList=DB::getSchemaBuilder()->getColumnListing('phong');
  var_dump($clList) ;
});

Route::post('loadInfoByAjaxForNhanVien','loadAjaxController@loadInfoByAjaxForNhanVien');
Route::post('loadInfoByAjaxForRoom','loadAjaxController@loadInfoByAjaxForRoom');
Route::post('loadInfoByAjaxForCustomer','loadAjaxController@loadInfoByAjaxForCustomer');
Route::post('loadReservedRoomByAjax','loadAjaxController@loadReservedRoomByAjax');
Route::post('loadViolationByAjax','loadAjaxController@loadViolationByAjax');
Route::post('loadInfoByAjaxForLuong','loadAjaxController@loadInfoByAjaxForLuong');
Route::post('loadCheckOutRoomInfoByAjax','loadAjaxController@loadCheckOutRoomInfoByAjax');
Route::post('loadInfoByAjaxForNhanVienViPham','loadAjaxController@loadInfoByAjaxForNhanVienViPham');
Route::post('loadInfoByAjaxForService','loadAjaxController@loadInfoByAjaxForService');
Route::post('loadInfoEachRoomByAjax','loadAjaxController@loadInfoEachRoomByAjax');
Route::post('loadKHtheoPhong',"loadAjaxController@loadKHtheoPhong");


Route::post('addLoiViPham','MistakeController@addLoiViPham');



Route::post('deleteUser','NhanVienManagement@deleteUser');
Route::post('addUser','NhanVienManagement@addUser');
Route::post('changeUser','NhanVienManagement@changeUserInfo');


Route::post('deleteRoom','RoomManagement@deleteRoom');
Route::post('addRoom','RoomManagement@addRoom');
Route::post('changeRoom','RoomManagement@changeRoom');


Route::post('deleteCustomer','CustomerManagement@deleteCustomer');
Route::post('addCustomer','CustomerManagement@addCustomer');
Route::post('changeCustomer','CustomerManagement@changeCustomer');



Route::post('checkIn',"ReservationManagement@checkIn");
Route::post('checkOut',"ReservationManagement@checkOut");
Route::post('rollBackCheckOut',"ReservationManagement@rollBackCheckOut");
Route::post('huyDatPhong',"ReservationManagement@huyDatPhong");


Route::post('xetLuong','SalaryManagement@xetLuong');
Route::post('duyetLuong','SalaryManagement@duyetLuong');
Route::get('xemLuong/{maNv}','SalaryManagement@xemLuong');
Route::post('hoanTacDuyetLuong','SalaryManagement@hoanTacDuyetLuong');
Route::post('traLuong','SalaryManagement@traLuong');
Route::post('hoanTacTraLuong','SalaryManagement@hoanTacTraLuong');

Route::prefix('thongKe')->group(function () {
Route::get('phong','getInfomationWebService@getRoomInfo');
Route::get('thongKeNhanSu',"getInfomationWebService@getEmployee");
Route::get('thongkeSoLuongDatPhong',"getInfomationWebService@thongkeSoLuongDatPhong");
Route::get('thongkeNVtheoCV','getInfomationWebService@thongkeNVtheoCV');
Route::get('thongKeLuongTraTheoThang',"getInfomationWebService@thongKeLuongTraTheoThang");
Route::get('thongkeSoLuongViPham',"getInfomationWebService@thongkeSoLuongViPham");
Route::get('thongkeKhachHangTiemNang',"getInfomationWebService@thongkeKhachHangTiemNang");
Route::get('thongKeDoanhThu',"getInfomationWebService@thongKeDoanhThu");


});


Route::post('addDV','ServiceManagementController@addDV');
Route::post('suaDV','ServiceManagementController@suaDV');



Route::post('addSDDV','ServiceManagementController@addSDDV');
Route::post('xoaSDDV','ServiceManagementController@xoaSDDV');
Route::post('deleteDV','ServiceManagementController@deleteDV');


Route::get('testt',function(){
echo date('j').date('n').date('Y');
});



Route::get('ChiTietHoaDon/{mahd}',function(Request $request,$mahd){

  $dataDV=QuanLyDichVu::join('dichvu','dichvu.maLoaiDichVu',"=","quanlydichvu.maLoaiDichVu")->where('maHoaDon',$mahd)->get();
  $dataRoom=QuanLyDatPhong::join('khachhang','khachhang.maKH','=','quanlydatphong.maKH')->where('maHoaDon',$mahd)->get();

return view('ChiTietHoaDon',["dataDV"=>$dataDV,"dataRoom"=>$dataRoom]);
});

Route::post('addBTG','BenTrungGianController@addBTG');
Route::post('deleteBenTG','BenTrungGianController@deleteBenTG');



//EXCEL
Route::get('excelThongKePhong','ExcelController@excelThongKePhong');
Route::get('excelThongKeDatPhong','ExcelController@excelThongKeDatPhong');
Route::get('excelNVtheoCV','ExcelController@excelNVtheoCV');
Route::get('excelLuongTheoThang','ExcelController@excelLuongTheoThang');
Route::get('excelSLVPExcel','ExcelController@excelSLVPExcel');
Route::get('dataKHTNangExcel','ExcelController@dataKHTNangExcel');
Route::get('dataDoanhThuExcel','ExcelController@dataDoanhThuExcel');





Route::post('nghiPhep','NghiPhepController@nghiPhep');
Route::get('xemNghiPhep',"NghiPhepController@xemNghiPhep");
Route::get('duyetNghiPhep','NghiPhepController@duyetNghiPhep');
Route::post('TienHanhduyetNghiPhep','NghiPhepController@duyet');
Route::post('HoanTacduyetNghiPhep','NghiPhepController@HoanTacduyetNghiPhep');

