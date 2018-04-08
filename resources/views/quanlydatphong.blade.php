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
      string+="<select class='form-control' name='maPhong'>";
for(var i =0;i<data.length;i++){
  string+="<option value='"+data[i].maPhong+"'>";
  string+=data[i].soPhong+"--"+data[i].tinhTrangThuePhong;
    string+="</option>";
}
string+="</select>";
 $("#RoomSelect").html(
string

  );

    }
 });
  }
</script>
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
  <input type="hidden" name="ngayNhanPhong" value="{{ date("Y-m-d") }}">
 <div class="form-group">
  <label>Chọn ngày trả phòng:</label>
  <input type="date" name="ngayTraPhong"  class="form-control">
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
                <h3>Phòng</h3>
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
                  <th>Thao tác</th>
                        </tr>
                      </thead>


                      <tbody>
                      @if(isset($listData))
                        @foreach($listData as $record )
          
                        <tr>


                           @foreach($clList as $columm )

            @if($columm=="created_at" or $columm=="updated_at")
            @elseif($columm=="maPhong")
                <td>{{ $record->maPhong  }}</td>
                             <td>{{ $record->soPhong  }}</td>
                          @elseif($columm=="maKH")

                             <td>{{ $record->tenGoiKH  }}</td>
                             <td>{{ $record->soCMND }}</td>
                          @elseif($columm=="maNvPhuTrachDatPhong")
                           <td>{{ $record->tenNv }}</td>
                          @else
                          
                        <td>{{ $record->$columm  }}</td>
              
            @endif
                       
                           @endforeach
                           <td>
                             
<input type="image" src="{{ asset('icon/removeHouse.png') }}" width="30" height="30" data-toggle="modal" data-target="">

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