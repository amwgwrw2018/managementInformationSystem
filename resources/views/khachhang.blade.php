@extends('adminMasterLayout')
@section('pageContent')
<script type="text/javascript">
  function loadInfoByAjax(){


$.ajax({
    url:"{{ url('loadInfoByAjaxForCustomer') }}",
   
    type: "POST",
   
     data: { maKH:$('#getCustomerInfoByAjax').val(),
  "_token": "{{ csrf_token() }}"

     },
    success:function(response_data) {

      var data=JSON.parse(response_data);
      $('#changeCustomerInfoMaKH').val(data.maKH);
      $('#changeCustomerInfoTenGoiKH').val(data.tenGoiKH);
$('#changeCustomerInfoSoCMND').val(data.soCMND);
      $('#changeCustomerInfoSDT').val(data.SDT);
      $('#changeCustomerInfoLoaiKH').val(data.loaiKH);
   
      $('#changeCustomerInfoBenTrungGian').val(data.benTrungGian);
  

    }
 });
  }
</script>
<div id="addCustomer" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm khách hàng mới</h4>
      </div>
      <div class="modal-body" style="padding: 20px 60px 20px 60px;">
      <form action="{{ url('addCustomer') }}" method="post">
        {{  csrf_field() }}

      <div class="form-group">
    <label for="tenGoiKH">Tên khách hàng:</label>
    <input  type="text" class="form-control" placeholder="Nhập tên khách hàng" name="tenGoiKH" required>
  </div>
  <div class="form-group">
    <label for="soCMND">Số CMND:</label>
    <input type="text" name="soCMND" class="form-control" required>
 
  </div>
    <div class="form-group">
    <label for="sdt">Số điện thoại:</label>
<input type="text" name="sdt" class="form-control" required>

  </div>

    <div class="form-group">
    <label for="loaiKH">Loại khách hàng:</label>
     <select name="loaiKH" class="form-control" >
      @if(isset($listLoaiKhachHang))
    @foreach($listLoaiKhachHang as $loaiKH)
       <option value="{{ $loaiKH->maLoaiKhachHang }}">
        {{ $loaiKH->tenLoaiKhachHang }}
      </option>
    @endforeach
    @endif
    </select>
  </div>
  <div class="form-group">
    <label for="sdt">Bên trung gian (nếu có):</label>
    @if(isset($benTrungGian))
    <select name="benTrungGian" class="form-control" >
      @foreach($benTrungGian as $btg)
      <option value="{{ $btg->maBenTrungGian }}">{{ $btg->benTrungGian }}</option>
      @endforeach
    </select>
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
<div id="changeCustomerInfo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thay đổi thông tin khách hàng:</h4>
      </div>
      <div class="modal-body" style="padding: 20px 60px 20px 60px;">
        
           @if(isset($listData))
             <div class="form-group">
<select name="maKH" class="form-control" onchange="loadInfoByAjax()" id="getCustomerInfoByAjax" >
                       @foreach($listData as $khachhang )
                       <option value="{{ $khachhang->maKH }}">{{ $khachhang->tenGoiKH }}</option>
                       @endforeach
                       </select>
                       @endif
                    </div>
     


        <h2>Sửa đổi</h2>
      <form action="{{ url('changeCustomer') }}" method="post">
        {{  csrf_field() }}
       
        <input id="changeCustomerInfoMaKH" type="hidden" name="maKH">
      <div class="form-group">
    <label for="tenGoiKH">Tên khách hàng:</label>
    <input  type="text" class="form-control" placeholder="Nhập tên khách hàng" name="tenGoiKH" required id="changeCustomerInfoTenGoiKH">
  </div>
  <div class="form-group">
    <label for="soCMND">Số CMND:</label>
    <input type="text" name="soCMND" class="form-control" required id="changeCustomerInfoSoCMND">
 
  </div>
    <div class="form-group">
    <label for="sdt">Số điện thoại:</label>
<input type="text" name="sdt" class="form-control" required id="changeCustomerInfoSDT">

  </div>

    <div class="form-group">
    <label for="loaiKH">Loại khách hàng:</label>
     <select name="loaiKH" class="form-control" id="changeCustomerInfoLoaiKH">
      @if(isset($listLoaiKhachHang))
    @foreach($listLoaiKhachHang as $loaiKH)
       <option value="{{ $loaiKH->maLoaiKhachHang }}">
        {{ $loaiKH->tenLoaiKhachHang }}
      </option>
    @endforeach
    @endif
    </select>
  </div>
  <div class="form-group">
    <label for="sdt">Bên trung gian (nếu có):</label>
    
<input type="text" name="benTrungGian" class="form-control" id="changeCustomerInfoBenTrungGian">

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
                <h3>Khách hàng</h3>
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
                        @if(Session::has('khachhangtontaiError'))
                 
                    <h3 style="color: red;">{{ Session::get('khachhangtontaiError') }}</h3>
                    @endif
                    <h2>Khách hàng</h2>
                
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
                   
                    <table id="dataKhachHang" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Mã khách hàng</th>
                          <th>tên khách hàng</th>
                          <th>Số CMND</th>
                          <th>Số điện thoại</th>
                          <th>Loại khách hàng</th>
                          <th>Bên trung gian</th>
                  <th>Thao tác</th>
                        </tr>
                      </thead>


                      <tbody>
                      @if(isset($listData))
                        @foreach($listData as $khachhang )
                        <tr>

                           @foreach($clList as $columm )
                                   @if($columm=="loaiKH")
                        <td>{{ $khachhang->tenLoaiKhachHang  }}</td>
                       @else
                        <td>{{ $khachhang->$columm  }}</td>
                        @endif
                       
                           @endforeach
                               <td>
                             
<input type="image" src="{{ asset('icon/removeCustomer.png') }}" width="30" height="30" data-toggle="modal" data-target="#deleteCustomerForm{{ $khachhang->maKH }}">

                           </td>
                        </tr>
                                           <div id="deleteCustomerForm{{ $khachhang->maKH }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Xóa khách hàng</h4>
      </div>
      <div class="modal-body">
        <p>Xác định xóa khách hàng {{ $khachhang->tenGoiKH }} ?</p>
        <form action="{{ url('deleteCustomer') }}" method="post">
          {{  csrf_field() }}
          <input type="hidden" name="maKH" value="{{ $khachhang->maKH }}">
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