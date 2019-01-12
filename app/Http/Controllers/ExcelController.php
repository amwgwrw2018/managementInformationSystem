<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
class ExcelController extends Controller
{
    public function excelThongKePhong(Request $request){

//     	$data=Excel::load('public/test.xlsx',function ($reader) {



//     	})->get();
// //  foreach ($data as $rows) {
// // echo $rows;
// //   foreach ($rows as $row) {
// //   	echo $row;
// //   	}
// //   	}

if($request->session()->has('dataChartForTableExcel') && $request->session()->has('allRoom')){
$data= array(
     $request->session()->get('allRoom')->soLuongPhong-$request->session()->get('dataChartForTableExcel')->soLuongPhongThue,'Trống'
);
$data2=  array(
     $request->session()->get('dataChartForTableExcel')->soLuongPhongThue,'Đã thuê'
);

	   Excel::create('SoLuongThuePhong', function($excel) use ($data,$data2){

    $excel->sheet('Excelsheet', function($sheet) use ($data,$data2){
$sheet->row(1, array(
     'Số lượng phòng trống', 'Tình trạng thuê phòng'
));

$sheet->row(2,$data);

$sheet->row(3,$data2);
   
    });

})->export('xls');


    

    }

}

public function excelThongKeDatPhong(Request $request){
       if($request->session()->has('dataReservedRoomTableExcel')){
       	$datas=$request->session()->get('dataReservedRoomTableExcel');
       	$date= array();
$soluong=array();
       	foreach($datas as $data){
array_push($date,$data->month."-".$data->year);
array_push($soluong, $data->soLuongDatPhong);
       	}
	   Excel::create('SoLuongDatPhong', function($excel) use ($date,$soluong){

    $excel->sheet('Excelsheet', function($sheet) use ($date,$soluong){
$sheet->row(1, array(
     'Tháng năm', 'Số lượng thuê phòng'
));
for ($i=0; $i < count($date) ; $i++) { 
	$sheet->row($i+2, array(
     $date[$i],$soluong[$i]
));
}
    });
})->export('xls');
    }
}
public function excelNVtheoCV(Request $request){
	if($request->session()->has('dataEmployeeExcel')){
		  	$datas=$request->session()->get('dataEmployeeExcel');
		       	$SLNV= array();
$chucvu=array();
	       	foreach($datas as $data){
array_push($SLNV,$data->soLuongNv);
array_push($chucvu, $data->tenGoiChucVu);
       	}

	   Excel::create('SoLuongNVtheoCV', function($excel) use ($SLNV,$chucvu){

    $excel->sheet('Excelsheet', function($sheet) use ($SLNV,$chucvu){
$sheet->row(1, array(
     'Số lượng nhân sự', 'Chức vụ'
));
for ($i=0; $i < count($SLNV) ; $i++) { 
	$sheet->row($i+2, array(
     $SLNV[$i],$chucvu[$i]
));
}
    });
})->export('xls');



}
    
    
}

public function excelLuongTheoThang(Request $request){
  if($request->session()->has('dataLuongTheoThangExcel')){
$datas=$request->session()->get('dataLuongTheoThangExcel');
            $luong= array();
$thang=array();
          foreach($datas as $data){
array_push($luong,$data->luongThang);
array_push($thang, $data->ThangTraLuong);
        }


         Excel::create('LuongTheoThang', function($excel) use ($luong,$thang){

    $excel->sheet('Excelsheet', function($sheet) use ($luong,$thang){
$sheet->row(1, array(
     'Tổng chi trả lương', 'Tháng'
));
for ($i=0; $i < count($luong) ; $i++) { 
  $sheet->row($i+2, array(
     $luong[$i],$thang[$i]
));
}
    });
})->export('xls');

  }
  
}
public function excelSLVPExcel(Request $request){
    if($request->session()->has('dataSLVPExcel')){
$datas=$request->session()->get('dataSLVPExcel');

            $vipham= array();
$thang=array();
          foreach($datas as $data){
array_push($vipham,$data->soLuotViPham);
array_push($thang,$data->month."-".$data->year);




        }
                 Excel::create('ThongKeViPham', function($excel) use ($vipham,$thang){

    $excel->sheet('Excelsheet', function($sheet) use ($vipham,$thang){
$sheet->row(1, array(
     'Tháng năm', 'Số lượng vi phạm'
));
for ($i=0; $i < count($vipham) ; $i++) { 
  $sheet->row($i+2, array(
    $thang[$i],$vipham[$i]
));
}
    });
})->export('xls');
    }
  
  }
public function dataKHTNangExcel(Request $request){
      if($request->session()->has('dataKHTNangExcel')){
$datas=$request->session()->get('dataKHTNangExcel');

            $soluongdatphong= array();
$maKH=array();
          foreach($datas as $data){
array_push($soluongdatphong,$data->soluongdatphong);
array_push($maKH,$data->maKH);




        }
                 Excel::create('ThongKeKHTNang', function($excel) use ($soluongdatphong,$maKH){

    $excel->sheet('Excelsheet', function($sheet) use ($soluongdatphong,$maKH){
$sheet->row(1, array(
     'Số lượng đặt phòng', 'Mã khách hàng'
));
for ($i=0; $i < count($maKH) ; $i++) { 
  $sheet->row($i+2, array(
    $soluongdatphong[$i],$maKH[$i]
));
}
    });
})->export('xls');
    }
}

public function dataDoanhThuExcel(Request $request){
   if($request->session()->has('dataDoanhThuExcel')){

$datas=$request->session()->get('dataDoanhThuExcel');
                $doanhthu= array();
$thoigian=array();
          foreach($datas as $data){
array_push($doanhthu,$data->tongChiPhi);
array_push($thoigian,$data->month."-".$data->year);




        }

                 Excel::create('ThongKeKHTNang', function($excel) use ($doanhthu,$thoigian){

    $excel->sheet('Excelsheet', function($sheet) use ($doanhthu,$thoigian){
$sheet->row(1, array(
     'Doanh thu', 'Tháng năm'
));
for ($i=0; $i < count($doanhthu) ; $i++) { 
  if( $doanhthu[$i]==null){
     $sheet->row($i+2, array(
    0,$thoigian[$i]
));
  }else{
      $sheet->row($i+2, array(
    $doanhthu[$i],$thoigian[$i]
));
  }

}
    });
})->export('xls');


   }
}

}