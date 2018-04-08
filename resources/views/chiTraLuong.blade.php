@extends('adminMasterLayout')
@section('pageContent')
<script type="text/javascript">
  function loadInfoByAjax(){


$.ajax({
    url:"{{ url('loadInfoByAjaxForLuongCoBan') }}",
   
    type: "POST",
   
     data: { maNv:$('#maNvHienTai').val(),
  "_token": "{{ csrf_token() }}"

     },
    success:function(response_data) {

$('#luongThangInput').val(response_data);

    }
 });
  }
</script>
<div id="themLuong" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm lương nhân sự</h4>
      </div>
      <div class="modal-body" style="padding: 20px 60px 20px 60px;">
      <form action="{{ url('add') }}" method="post">
        {{  csrf_field() }}
      <div class="form-group">
    @if(Session::has('listNhanVien'))
      <div class="form-group">
    <label for="maNv">Tên nhân sự:</label>


    <select name="maNv" class="form-control" onchange="loadInfoByAjax()" id="maNvHienTai">
    @foreach(Session::get('listNhanVien') as $nhanVien)
<option value="{{ $nhanVien->maNv }}">{{ $nhanVien->tenNv }}</option>
    @endforeach
  </select>
  </div>

<div class="form-group">
  <label for="luongThang">Lương tháng cơ bản( VND ):</label>
  <input type="text" name="luongThang" class="form-control" value="" readonly id="luongThangInput">
</div>


<div class="form-group">
  <label for="luongThang">Lương thưởng thêm:</label>
  <input type="text" name="luongThuongThem" class="form-control">
</div>


<div class="form-group">
  <label for="luongThang">Lương trừ vi phạm( VND ):</label>
  <input type="text" name="luongTru" class="form-control">
</div>



  @endif
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
{{-- sdasdasasasfasfasfasfasfasfasfasfafaf --}}
<div id="changeUserInfo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thay đổi thông tin nhân viên</h4>
      </div>
      <div class="modal-body" style="padding: 20px 60px 20px 60px;">
        
           @if(isset($listData))
<select name="maNv" class="form-control" onchange="loadInfoByAjax()" id="getUserInfoByAjax" >
                       @foreach($listData as $nhanvien )
                       <option value="{{ $nhanvien->maNv }}">{{ $nhanvien->tenNv }}</option>
                       @endforeach
                       </select>
                       @endif
                    
     


        <h2>Sửa đổi</h2>
      <form action="{{ url('changeUser') }}" method="post">
        {{  csrf_field() }}
       
        <input id="changeUserInfoMaNv" type="hidden" name="maNhanVien">
      <div class="form-group">
    <label for="email">Tên nhân viên:</label>
    <input id="changeUserInfoTenNv" type="text" class="form-control" placeholder="Nhập tên nhân viên" name="tenNv" required>
  </div>
  <div class="form-group">
    <label for="email">Giới tính:</label>
    <input id="changeUserInfoGioiTinh" type="text" class="form-control" id="email" name="gioiTinh" required>
  </div>
    <div class="form-group">
    <label for="email">Ngày sinh:</label>
   <select name="ngay" class="form-control" id="changeUserInfoNgay">
    @for($i=1;$i<=31;$i++)
    <option value="{{ $i }}">{{ $i }}</option>
    @endfor
   </select>
     <label for="email">Tháng sinh:</label>
    <select name="thang" class="form-control" id="changeUserInfoThang">
    @for($i=1;$i<=12;$i++)
    <option value="{{ $i }}">{{ $i }}</option>
    @endfor
   </select>
     <label for="email">Năm sinh:</label>
    <select name="nam" class="form-control" id="changeUserInfoNam">
    @for($i=1950;$i<=Carbon\Carbon::now()->format('Y');$i++)
    <option value="{{ $i }}">{{ $i }}</option>
    @endfor
   </select>

  </div>
    <div class="form-group">
    <label for="diaChi">Địa chỉ:</label>
    <textarea rows="12" class="form-control" name="diaChi" required id="changeUserInfoDiaChi"></textarea>
  </div>
    <div class="form-group">
    <label for="Sdt">Số điện thoại:</label>
    <input type="text" class="form-control" name="Sdt" required id="changeUserInfoSdt">
  </div>
      <div class="form-group">
    <label for="chucVu">Chức vụ:</label>
    <select name="chucVu" class="form-control" id="changeUserInfoChucVu">
    @if(isset($listChucVu))
        @foreach($listChucVu as $chucvu)
<option value="{{ $chucvu->id }}">{{ $chucvu->tenGoiChucVu }}</option>
    @endforeach
 @endif
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
                <h3>Lương tháng nhân sự</h3>
              
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
                    <h2>Lương tháng nhân sự</h2>
                      <div id="tests"></div>
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
                   
                    <table id="dataLuong" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Mã NV</th>
                          <th>Lương Tháng</th>
                          <th>Lương thưởng thêm</th>
                          <th>Lương trừ</th>
                          <th>Tổng lương</th>
                          <th>Tình trạng chi trả</th>
                          <th>Hình thức chi trả</th>
                        <th>Thời gian chi trả</th>
                        <th>Thao tác</th>
                        </tr>
                      </thead>


                      <tbody>
                      @if(isset($listData))

                       @foreach($listData as $nhanvien )

                        <tr>
                           @foreach($clList as $columm )
                         
                        <td>{{ $nhanvien->$columm  }}</td>
                  
                           @endforeach

                      <td>
               
                  
                     
                       
                        <input type="image" src="{{ asset('icon/deleteUser.png') }}" width="30" height="30" data-toggle="modal" data-target="#deleteUserForm{{ $nhanvien->maNv }}">

                 </td>
                   </tr>
        
<div id="deleteUserForm{{ $nhanvien->maNv }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Xóa sinh viên</h4>
      </div>
      <div class="modal-body">
        <p>Xác định xóa nhân viên {{ $nhanvien->tenNv }} ?</p>
        <form action="{{ url('deleteUser') }}" method="post">
          {{  csrf_field() }}
          <input type="hidden" name="maNv" value="{{ $nhanvien->maNv }}">
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