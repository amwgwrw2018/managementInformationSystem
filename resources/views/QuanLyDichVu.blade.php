@extends('adminMasterLayout')
@section('pageContent')
<script type="text/javascript">
  function loadInfoByAjax(){


$.ajax({
    url:"{{ url('loadInfoByAjaxForService') }}",
   
    type: "POST",
   
     data: { maDV:$('#getServiceInfoByAjax').val(),
  "_token": "{{ csrf_token() }}"

     },
    success:function(response_data) {
    var data=JSON.parse(response_data);
$('#tenDV').val(data[0]['tenDichVu']);
   $('#chiPhiDV').val(data[0]['chiPhi']);
    }
 });
  }
  function checkEmpty(){
      if($('#maKHtheoPhong').val()!=null){
  $('#addSDDVButton').prop('disabled', true);

  }
  }
  function loadKHtheoPhong(){

  $.ajax({
    url:"{{ url('loadKHtheoPhong') }}",
   
    type: "POST",
   
     data: { maPhong:$('#maPhongDV').val(),
  "_token": "{{ csrf_token() }}"

     },
    success:function(response_data) {
 $('#addSDDVButton').prop('disabled', true);
      $('#maKHtheoPhong').val(null);
      var data=JSON.parse(response_data);
      if(data.length!=0){
         $('#maKHtheoPhong').val(data[0]['maKH']);
         $('#addSDDVButton').prop('disabled', false);
      }else{
         $('#maKHtheoPhong').val();
      }
     


  }
 });
checkEmpty();
  }
</script>

<div id="themDV" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm dịch vụ</h4>
      </div>
      <div class="modal-body" style="padding: 20px 60px 20px 60px;">
      <form action="{{ url('addDV') }}" method="post">
        {{  csrf_field() }}
    
 <div class="form-group">
  <label>Nhập tên dịch vụ:</label>
  <input type="text" class="form-control" name="tenDV" placeholder="Tên dịch vụ">
 </div>

 <div class="form-group">
  <label>Chi phí dịch vụ:</label>
  <input type="text" class="form-control" name="chiPhiDV" placeholder="Chi phí">
 </div>
 <div class="form-group">
<button type="submit"  class="btn w3-yellow form-control">Thêm</button>
 </div>

      </form>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>


  </div>
</div>


<div id="suaDV" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sửa thông tin dịch vụ</h4>
      </div>
      <div class="modal-body" style="padding: 20px 60px 20px 60px;">
       
                    
     



      <form action="{{ url('suaDV') }}" method="post">
        {{  csrf_field() }}
  

      @if(isset($listDichVu))
 <div class="form-group">
    <label>Chọn dịch vụ:</label>
         <select class="form-control" name="maLoaiDichVu" id="getServiceInfoByAjax" onchange="loadInfoByAjax()">
         @foreach($listDichVu as $dv)

<option value="{{ $dv->maLoaiDichVu }}">{{ $dv->tenDichVu }}</option>

         @endforeach

       </select>
 </div>
       @endif

 <div class="form-group">
  <h2>Sửa đổi</h2>
  <label>Nhập tên dịch vụ:</label>
  <input type="text" class="form-control" name="tenDV" id="tenDV">
 </div>

 <div class="form-group">
  <label>Chi phí dịch vụ:</label>
  <input type="text" class="form-control" name="chiPhiDV" id="chiPhiDV">
 </div>
 <div class="form-group">
<button type="submit"  class="btn w3-yellow form-control">Sửa đổi</button>
 </div>
      </form>


       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>


  </div>
</div>

{{-- ADD SDDV--}}
<div id="themSDDV" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Khách hàng sử dụng dịch vụ</h4>
      </div>
      <div class="modal-body" style="padding: 20px 60px 20px 60px;">
       
                    
     


       @if(isset($listPhong))
 <div class="form-group">
  <label>Chọn khách hàng theo phòng:</label>
         <select class="form-control"  id="maPhongDV" onchange="loadKHtheoPhong()">
         @foreach($listPhong as $phong)

<option value="{{ $phong->maPhong }}">{{ $phong->soPhong }}</option>

         @endforeach

       </select>
 </div>
       @endif
      <form action="{{ url('addSDDV') }}" method="post">
        {{  csrf_field() }}

      <div class="form-group">
         <input type="text" class="form-control" name="maKH" id="maKHtheoPhong" readonly>
      </div>

      @if(isset($listDichVu))
 <div class="form-group">
    <label>Chọn dịch vụ:</label>
         <select class="form-control" name="maLoaiDichVu">
         @foreach($listDichVu as $dv)

<option value="{{ $dv->maLoaiDichVu }}">{{ $dv->tenDichVu }} ( {{ $dv->chiPhi }}VND )</option>

         @endforeach

       </select>
 </div>
       @endif
<button type="submit" class="btn" id="addSDDVButton">Thêm</button>
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
                <h3>Quản lý dịch vụ</h3>
              
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
                    <h2>Các dịch vụ</h2>
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
                   
                    <table id="dataDichVu" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Mã dịch vụ</th>
                          <th>Tên dịch vụ</th>
                    <th>Chi phí</th>
                        <th>Thao tác</th>
                        </tr>
                      </thead>


                      <tbody>
                      @if(isset($listDichVu))

                       @foreach($listDichVu as $data )

                        <tr>
                         
                  
        
                        <td>{{ $data->maLoaiDichVu  }}</td>
                         <td>{{ $data->tenDichVu  }}</td>
                       <td>{{ $data->chiPhi }}</td>
                      <td>
               
                  
                     
                       
                        <input type="image" src="{{ asset('icon/deleteIcon.png') }}" width="30" height="30" data-toggle="modal" data-target="#deleteServiceForm{{ $data->maLoaiDichVu  }}">
                        <div id="deleteServiceForm{{ $data->maLoaiDichVu  }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Xóa dịch vụ</h4>
      </div>
      <div class="modal-body">
        <p>Xác định xóa dịch vụ {{ $data->tenDichVu  }} ?</p>
        <form action="{{ url('deleteDV') }}" method="post">
          {{  csrf_field() }}
          <input type="hidden" name="maLoaiDichVu" value="{{ $data->maLoaiDichVu  }}">
            <input type="submit" value="Xóa" class="w3-btn w3-red">
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

                 </td>
                   </tr>

                 @endforeach
                 
                      @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Quản lý sử dụng dịch vụ</h2>
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
                   
                    <table id="dataQLDichVu" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Tên khách hàng</th>
                          <th>Tên dịch vụ</th>
               
                          <th>Thời gian</th>
                         <th>Tên nhân viên xác nhận</th>
                         <th>Tình trạng chi trả</th>
                         <th>Mã hóa đơn</th>
                        <th>Thao tác</th>
                        </tr>
                      </thead>


                      <tbody>
                      @if(isset($listData))

                       @foreach($listData as $data )

                        <tr>
                         
                  
        
                        <td>{{ $data->tenGoiKH  }}</td>
                         <td>{{ $data->tenDichVu  }}</td>
    
                           <td>{{ $data->thoiGian  }}</td>
           <td>{{ $data->tenNv  }}</td>
 <td>{{ $data->tinhTrangChiTra  }}</td>
 <td>{{ $data->maHoaDon  }}</td>
                      <td>
               
                  
                     <form action="{{ url('xoaSDDV') }}" method="post">
                       {{ csrf_field() }}
<input type="hidden" name="maKH" value="{{ $data->maKH  }}">
<input type="hidden" name="maLoaiDichVu" value="{{ $data->maLoaiDichVu  }}">
<input type="hidden" name="ThoiGianDV" value="{{ $data->thoiGian  }}">
      
    
                        

                         <input type="image" src="{{ asset('icon/deleteIcon.png') }}" width="30" height="30" data-toggle="modal" data-target="#deleteUserForm">

                     </form>
                       
                      
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