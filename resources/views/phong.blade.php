@extends('adminMasterLayout')
@section('pageContent')
<script type="text/javascript">
  function loadInfoByAjax(){


$.ajax({
    url:"{{ url('loadInfoByAjaxForRoom') }}",
   
    type: "POST",
   
     data: { maPhong:$('#getRoomInfoByAjax').val(),
  "_token": "{{ csrf_token() }}"

     },
    success:function(response_data) {

      var data=JSON.parse(response_data);
      $('#changeUserInfoMaPhong').val(data.maPhong);
$('#changeRoomInfoSoPhong').val(data.soPhong);
      $('#changeRoomInfoLoaiPhong').val(data.loaiPhong);
      $('#changeRoomInfoKichThuoc').val(data.kichThuoc);
   
      $('#changeRoomInfoTang').val(data.tang);
         $('#changeRoomInfoTinhTrang').val(data.tinhTrangThuePhong);

    }
 });
  }
</script>
<div id="addRoom" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm phòng mới</h4>
      </div>
      <div class="modal-body" style="padding: 20px 60px 20px 60px;">
      <form action="{{ url('addRoom') }}" method="post">
        {{  csrf_field() }}

      <div class="form-group">
    <label for="soPhong">Số phòng:</label>
    <input  type="text" class="form-control" placeholder="Nhập số phòng mới" name="soPhong" required>
  </div>
  <div class="form-group">
    <label for="loaiPhong">Loại phòng:</label>
   <select name="loaiPhong" class="form-control" >
      @if(isset($listLoaiPhong))
    @foreach($listLoaiPhong as $loaiPhong)
       <option value="{{ $loaiPhong->maLoaiPhong }}">
        {{ $loaiPhong->tenLoaiPhong }}
      </option>
    @endforeach
    @endif
    </select>
  </div>
    <div class="form-group">
    <label for="kichThuoc">Kích thước:</label>
<input type="number" name="kichThuoc" class="form-control" required>

  </div>
    <div class="form-group">
    <label for="tang">Tầng:</label>
   <select name="tang" class="form-control" >
     @for($i=1;$i<=4;$i++)
     <option value="{{ $i }}">
       {{ $i }}
     </option>
     @endfor
   </select>
  </div>
    <div class="form-group">
    <label for="Sdt">Tình trạng thuê phòng:</label>
    <select name="tinhTrang" class="form-control" >
      <option value="Trống">
        Trống
      </option>
        <option value="Đã thuê">
        Đã thuê
      </option>
        <option value="Đang sửa chữa">
        Đang sửa chữa
      </option>
    </select>
  </div>
  
<div class="form-group">
   
    <input type="submit" class="form-control w3-btn" style="background-color:#4cffd9;" value="Thêm" >
  </div>

      </form>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>


  </div>
</div>
<div id="changeRoomInfo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thay đổi thông tin phòng</h4>
      </div>
      <div class="modal-body" style="padding: 20px 60px 20px 60px;">
        
           @if(isset($listData))
             <div class="form-group">
<select name="maNv" class="form-control" onchange="loadInfoByAjax()" id="getRoomInfoByAjax" >
                       @foreach($listData as $phong )
                       <option value="{{ $phong->maPhong }}">{{ $phong->soPhong }}</option>
                       @endforeach
                       </select>
                       @endif
                    </div>
     


        <h2>Sửa đổi</h2>
      <form action="{{ url('changeRoom') }}" method="post">
        {{  csrf_field() }}
       
        <input id="changeUserInfoMaPhong" type="hidden" name="maPhong">
      <div class="form-group">
    <label for="soPhong">Số phòng:</label>
    <input id="changeRoomInfoSoPhong" type="text" class="form-control" placeholder="Nhập tên nhân viên" name="soPhong" required>
  </div>
  <div class="form-group">
    <label for="loaiPhong">Loại phòng:</label>
   <select name="loaiPhong" class="form-control" id="changeRoomInfoLoaiPhong">
    @if(isset($listLoaiPhong))
    @foreach($listLoaiPhong as $loaiPhong)
       <option value="{{ $loaiPhong->maLoaiPhong }}">
        {{ $loaiPhong->tenLoaiPhong }}
      </option>
    @endforeach
    @endif
   
    </select>
  </div>
    <div class="form-group">
    <label for="kichThuoc">Kích thước:</label>
<input type="number" name="kichThuoc" class="form-control" id="changeRoomInfoKichThuoc">

  </div>
    <div class="form-group">
    <label for="tang">Tầng:</label>
   <select name="tang" class="form-control" id="changeRoomInfoTang">
     @for($i=1;$i<=4;$i++)
     <option value="{{ $i }}">
       {{ $i }}
     </option>
     @endfor
   </select>
  </div>
    <div class="form-group">
    <label for="Sdt">Tình trạng thuê phòng:</label>
    <select name="tinhTrang" class="form-control" id="changeRoomInfoTinhTrang">
      <option value="Trống">
        Trống
      </option>
        <option value="Đã thuê">
        Đã thuê
      </option>
        <option value="Đang sửa chữa">
        Đang sửa chữa
      </option>
    </select>
  </div>
  
<div class="form-group">
   
    <input type="submit" class="form-control w3-btn" style="background-color:#4cffd9;" value="Sửa" >
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
                   
                    <table id="dataPhong" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Mã Phòng</th>
                          <th>Số Phòng</th>
                          <th>Kích Thước</th>
                          <th>Loại phòng</th>
                          <th>Tầng</th>
                          <th>Tình trạng thuê phòng</th>
                  <th>Thao tác</th>
                        </tr>
                      </thead>


                      <tbody>
                      @if(isset($listData))
                        @foreach($listData as $phong )
                        <tr>
                           @foreach($clList as $columm )
                                @if($columm=="loaiPhong")
                        <td>{{ $phong->tenLoaiPhong  }}</td>
                       @else
                        <td>{{ $phong->$columm  }}</td>
                        @endif
             
                       
                           @endforeach
                           <td>
                             
<input type="image" src="{{ asset('icon/removeHouse.png') }}" width="30" height="30" data-toggle="modal" data-target="#deleteRoomForm{{ $phong->maPhong }}">

                           </td>
                        </tr>
                        {{-- xoa phong --}}
                        <div id="deleteRoomForm{{ $phong->maPhong }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Xóa phòng</h4>
      </div>
      <div class="modal-body">
        <p>Xác định xóa phòng số {{ $phong->soPhong }} ?</p>
        <form action="{{ url('deleteRoom') }}" method="post">
          {{  csrf_field() }}
          <input type="hidden" name="maPhong" value="{{ $phong->maPhong }}">
            <input type="submit" value="Xóa" class="w3-btn w3-red">
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
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