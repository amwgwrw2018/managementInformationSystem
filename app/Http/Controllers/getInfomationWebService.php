<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuanLyDatPhong;
use App\phong;
use App\QuanLyViPham;
use  App\QuanLyChiTraLuong;
use App\QuanLyHoaDon;
use DB;
class getInfomationWebService extends Controller
{
    public function getRoomInfo(Request $request){
$query=DB::table('quanlydatphong')->select(DB::raw('count(*) as soLuongPhongThue'))->where('ngayTraPhong','>=',date("Y-m-d"))->where('ngayNhanPhong','<=',date('Y-m-d'))->get();
$allRoom=phong::select(DB::raw('count(*) as soLuongPhong'))->get();
$data=json_encode($query);
$request->session()->put('dataChartForTableExcel',$query[0]);
$request->session()->put('allRoom',$allRoom[0]);
return view('thongkePhong',['allRoom'=>$allRoom[0],'dataChart'=>$data,'dataChartForTable'=>$query[0]]);
    }
    public function getEmployee(){
    	$theoGioiTinh=DB::table('nhanvien')->select(DB::raw('count(*) as soLuongNhanVien'),'gioiTinh')->groupBy('gioiTinh')->get();
    		$theoChucVu=DB::table('nhanvien') ->join('chucvu', 'nhanvien.ChucVu', '=', 'chucvu.id')->select(DB::raw('count(*) as soLuongNhanVien'),'chucvu.tenGoiChucVu')->groupBy('nhanvien.ChucVu',"chucvu.tenGoiChucVu")->get();
    		$dataTheoChucVu=json_encode($theoChucVu);
    		return view('thongKeNhanVienTheoChucVuVaGioiTinh',['dataChartTheoChucVu'=>$dataTheoChucVu]);
    }
    public function thongkeSoLuongDatPhong(Request $request){
    	$query=DB::table('quanlydatphong')->select(DB::raw('count(maKH) as soLuongDatPhong'),DB::raw('month(ngayNhanPhong) as month'),DB::raw('year(ngayNhanPhong) as year'))->groupBy('month','year')->orderBy('year','desc')->orderBy('month','desc')->skip(0)->take(12)->get();
    	$data=json_encode($query);
        $request->session()->put('dataReservedRoomTableExcel',$query);

    	return view('thongkeSoLuongDatPhong',['dataReservedRoomChart'=>$data,'dataReservedRoomTable'=>$query]);
    }
    public function thongkeNVtheoCV(Request $request){
        $query=DB::table('nhanvien')->join('chucvu', 'nhanvien.ChucVu', '=', 'chucvu.id')->select(DB::raw('count(*) as soLuongNv'),'chucvu.tenGoiChucVu')->groupBy('nhanvien.ChucVu','chucvu.tenGoiChucVu')->get();
         $request->session()->put('dataEmployeeExcel',$query);
        $data=json_encode($query);
     return view('thongkeNVtheoCV',['dataEmployee'=>$query,"dataEmployeeChart"=>$data]);
    }
    public function thongKeLuongTraTheoThang(Request $request){
$query=QuanLyChiTraLuong::select(DB::raw('sum(LuongThang+LuongThuongThem-LuongBiTru) as luongThang'),'ThangTraLuong')->groupBy('ThangTraLuong')->get();
   $data=json_encode($query);
    $request->session()->put('dataLuongTheoThangExcel',$query);
 return view('thongKeLuongTraTheoThang',['dataLuongTheoThang'=>$query,"dataLuongTheoThangChart"=>$data]);

    }
    public function thongkeSoLuongViPham(Request $request){
        $query=QuanLyViPham::select(DB::raw('count(*) as soLuotViPham'),DB::raw('month(ThoiGianViPham) as month'),DB::raw('year(ThoiGianViPham) as year'))->groupBy('month','year')->limit(12)->get();
      
        $data=json_encode($query); 
        $request->session()->put('dataSLVPExcel',$query);
      return view('thongkeSoLuongViPham',['dataVPChart'=>$data,'dataVPTable'=>$query]);
    }

    public function thongkeKhachHangTiemNang(Request $request){
  $query=QuanLyDatPhong::select(DB::raw('count(*) as soluongdatphong'),'maKH')->groupBy('maKH')->orderBy('soluongdatphong','DESC')->limit(10)->get();
      
        $data=json_encode($query); 

      $request->session()->put('dataKHTNangExcel',$query);
        $queryChiTiet=QuanLyDatPhong::select(DB::raw('count(*) as soluongdatphong'),'quanlydatphong.maKH','khachhang.tenGoiKH')->groupBy('maKH')->join('khachhang','quanlydatphong.maKH',"=","khachhang.maKH")->orderBy('soluongdatphong','DESC')->limit(10)->get();
      return view('thongkeKhachHangTiemNang',['dataKHTNangChart'=>$data,'dataKHTNangTable'=>$queryChiTiet]);

    }
    public function thongKeDoanhThu(Request $request){
$query=QuanLyHoaDon::select(DB::raw('sum(chiPhiThuePhong+chiPhiDichVu) as tongChiPhi'),DB::raw('month(ngayTaoHoaDon) as month'),DB::raw('year(ngayTaoHoaDon) as year'))->groupBy('month','year')->get();
 $data=json_encode($query); 
 $request->session()->put('dataDoanhThuExcel',$query);
      return view('thongKeDoanhThu',['dataDoanhThuChart'=>$data,'dataDoanhThuTable'=>$query]);
    }
}
