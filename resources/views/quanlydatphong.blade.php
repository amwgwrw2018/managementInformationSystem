@extends('adminMasterLayout')
@section('pageContent')
<script type="text/javascript">
  function loadInfoByAjax(){


$.ajax({
    url:"{{ url('loadReservedRoomByAjax') }}",
   
    type: "POST",
   
     data: { loaiPhong:$('#getReservedRoomInfoByAjax').val(),
  "_token": "{{ csrf_token() }}"

     },
    success:function(response_data) {

      var data=JSON.parse(response_data);
   
      var string="<label for='roomSelect'>Chọn phòng:</label>";
      string+="<select class='form-control' name='maPhong' id='selectedRoom' onchange='loadInfoEachRoomByAjax()'>";
for(var i =0;i<data.length;i++){
  string+="<option value='"+data[i].maPhong+"'>";
  string+=data[i].soPhong;
    string+="</option>";
}
string+="</select>";
 $("#RoomSelect").html(
string

  );

    }
 });
  }



  function loadInfoEachRoomByAjax(){


$.ajax({
    url:"{{ url('loadInfoEachRoomByAjax') }}",
   
    type: "POST",
   
     data: { maPhong:$('#selectedRoom').val(),
  "_token": "{{ csrf_token() }}"

     },
    success:function(response_data) {
      var string="";
      var data=JSON.parse(response_data);
     
      for (var i = 0; i < data.length; i++) {
         string+="<tr>";
       string+="<td>" +data[i]['maPhong']+"</td>";
       string+="<td>" + data[i]['maKH']+"</td>";
       string+="<td>" + data[i]['ngayNhanPhong']+"</td>";
       string+="<td>" + data[i]['ngayTraPhong']+"</td>";
         string+="</tr>";
      }
          
 $("#dataEachRoom tbody").html(
string

  );
     
   
 

    }
 });
  }

</script>

{{-- DAT PHONG --}}
<div id="reservation" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Đặt phòng</h4>
      </div>
      <div class="modal-body" style="padding: 20px 60px 20px 60px;">
<form action="{{ url('checkIn') }}" method="post">
  {{ csrf_field() }}
     <div class="form-group">
    <label for="maKH">Khách hàng thuê phòng:</label>
     <select class="form-control" name="maKH">
    @if(isset($listKhachHang))
    @foreach($listKhachHang as $khachHang)
    <option value="{{ $khachHang->maKH }}">{{ $khachHang->tenGoiKH }}&emsp;số CMND:{{ $khachHang->soCMND }}</option>
    @endforeach
    @endif
  </select>

  </div>
  <div class="form-group">
    <label for="maPhong">Chọn loại phòng:</label>
<select class="form-control" id="getReservedRoomInfoByAjax" onchange="loadInfoByAjax()" name="maLoaiPhong">
    @if(isset($listLoaiPhong))
    @foreach($listLoaiPhong as $loaiPhong)
   
    <option value="{{ $loaiPhong->maLoaiPhong }}">{{ $loaiPhong->tenLoaiPhong }}</option>

    @endforeach
    @endif
  </select>
  </div>
  <div class="form-group" id="RoomSelect">
      

  </div>
  <div >
    <table class="table table-bordered" id="dataEachRoom">
      <thead>
        <th>Số phòng</th>
        <th>Khách hàng</th>
        <th>Ngày nhận phòng</th>
        <th>Ngày trả phòng</th>
      </thead>
      <tbody>
        
      </tbody>
    </table>
  </div>
   <div class="form-group">
  <label>Chọn ngày nhận phòng:</label>
   <input type="date" name="ngayNhanPhong" min="{{ date("Y-m-d") }}" class="form-control" value="{{ date("Y-m-d") }}">
 </div>
 
 <div class="form-group">
  <label>Chọn ngày trả phòng:</label>
  <input type="date" name="ngayTraPhong" min="{{ date("Y-m-d") }}" class="form-control" min="{{ date("Y-m-d") }}">
 </div>
<div class="form-group">
    <input type="submit" value="Đặt phòng"  class="form-control w3-btn w3-green" >
  </div>
</form>

       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>


  </div>
</div>


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Phòng<h1 id="ttttt"></h1></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Phòng</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <table id="dataDatPhong" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Mã phòng</th>
                          <th>Số phòng</th>
                          <th>khách hàng</th>
                          <th>Số CMND khách hàng</th>
                          <th>Thời gian nhận phòng</th>
                          <th>Thời gian trả phòng</th>
                      <th>Mã nhân viên phụ trách</th>
                      <th>Tình trạng trả phòng</th>
                      <th>Mã hóa đơn</th>
          <th>Thao tác</th>
                        </tr>
                      </thead>


                      <tbody>
                      @if(isset($listData))
                        @foreach($listData as $record )
          
                        <tr>


                

        
 
                <td>{{ $record->maPhong  }}</td>
                             <td>{{ $record->soPhong  }}</td>
        
                             <td>{{ $record->tenGoiKH  }}</td>
                             <td>{{ $record->soCMND }}</td>
     <td>{{ $record->ngayNhanPhong }}</td>
      <td>{{ $record->ngayTraPhong }}</td>
                           <td>{{ $record->tenNv }}</td>
        
                          @if($record->tinhTrangTraPhong==0)
                          <td>Chưa</td>
                @else
                          <td>Rồi</td>
                     @endif 
                          
                     <td>{{ $record->maHoaDon }}</td>
              

                       
                        
                     <td>
@if((strtotime($record->ngayNhanPhong)-strtotime(date('Y-m-d')))<0)
                      @if($record->tinhTrangTraPhong==0)

<form action="{{ url('checkOut') }}" method="post">
  {{ csrf_field() }}
<input type="hidden" name="maKH" value="{{ $record->maKH  }}">
<input type="hidden" name="maPhong" value="{{ $record->maPhong  }}" >
<input type="hidden" name="ngayNhanPhong" value="{{ $record->ngayNhanPhong }}">
<input type="hidden" name="ngayTraPhong" value="{{ $record->ngayTraPhong }}">
<button type="submit" class="w3-btn w3-green">Trả phòng</button>
</form>
@else
<p style="font-size: 15px;color: green;"><strong>Đã trả phòng</strong></p>
<form action="{{ url('rollBackCheckOut') }}" method="post">
  {{ csrf_field() }}
<input type="hidden" name="maKH" value="{{ $record->maKH  }}">
<input type="hidden" name="maPhong" value="{{ $record->maPhong  }}" >
<input type="hidden" name="ngayNhanPhong" value="{{ $record->ngayNhanPhong }}">
<input type="hidden" name="ngayTraPhong" value="{{ $record->ngayTraPhong }}">
<button type="submit" class="w3-btn w3-yellow">Hoàn tác</button>
</form>
@endif
@else
<form action="{{ url('huyDatPhong') }}" method="post">
  {{ csrf_field() }}
  <input type="hidden" name="maKH" value="{{ $record->maKH  }}">
<input type="hidden" name="maPhong" value="{{ $record->maPhong  }}" >
<input type="hidden" name="ngayNhanPhong" value="{{ $record->ngayNhanPhong }}">
<input type="hidden" name="ngayTraPhong" value="{{ $record->ngayTraPhong }}">
<button type="submit" class="w3-btn w3-red">Hủy đặt phòng</button>
</form>
@endif
                      </td>

                        </tr>
    
                 @endforeach
                      @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              

              

          
            </div>
          </div>
        </div>
        <!-- /page content -->

       @endsection